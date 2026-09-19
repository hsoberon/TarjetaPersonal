<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Card;
use Cake\Http\Exception\ForbiddenException;
use Cake\I18n\DateTime;
use Cake\Utility\Text;
use Psr\Http\Message\UploadedFileInterface;

/**
 * Admin dashboard, visit analytics, and card management.
 *
 * @property \App\Model\Table\CardsTable $Cards
 */
class AdminController extends AppController
{
    public \App\Model\Table\CardsTable $Cards;

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
        $this->Cards = $this->fetchTable('Cards');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->FormProtection->setConfig('unlockedFields', ['image_file', 'card_links']);
        $this->set('isAdmin', $this->isAdmin());
        $this->set('currentUser', $this->identityEntity());
    }

    public function index()
    {
        $visitsTable = $this->fetchTable('Visits');
        $scope = $this->visitScope($visitsTable->find());

        $totalVisits = (clone $scope)->count();
        $homeVisits = $this->isAdmin()
            ? $visitsTable->find()->where(['page_type' => 'home'])->count()
            : 0;
        $cardVisits = (clone $scope)->where(['page_type' => 'card'])->count();
        $todayVisits = (clone $scope)->where(['created >=' => DateTime::today()])->count();
        $weekVisits = (clone $scope)->where(['created >=' => DateTime::now()->subDays(7)])->count();

        $from = DateTime::now()->subDays(13)->startOfDay();
        $dailyRows = $visitsTable->find();
        $dailyRows
            ->select([
                'day' => $dailyRows->newExpr('DATE(Visits.created)'),
                'total' => $dailyRows->func()->count('*'),
            ])
            ->where(['Visits.created >=' => $from])
            ->groupBy(['day'])
            ->orderBy(['day' => 'ASC'])
            ->enableHydration(false);
        $this->applyVisitScope($dailyRows);

        $byDay = [];
        foreach ($dailyRows as $row) {
            $byDay[(string)$row['day']] = (int)$row['total'];
        }

        $dailyVisits = [];
        $maxDaily = 1;
        for ($i = 13; $i >= 0; $i--) {
            $day = DateTime::now()->subDays($i)->format('Y-m-d');
            $total = $byDay[$day] ?? 0;
            $dailyVisits[] = [
                'day' => $day,
                'label' => DateTime::now()->subDays($i)->format('d M'),
                'total' => $total,
            ];
            $maxDaily = max($maxDaily, $total);
        }

        $cardsQuery = $this->visibleCards()
            ->select($this->Cards)
            ->select(['visit_count' => $this->Cards->Visits->find()->func()->count('Visits.id')])
            ->leftJoinWith('Visits')
            ->groupBy(['Cards.id'])
            ->orderBy(['visit_count' => 'DESC', 'Cards.name' => 'ASC']);

        $cardStats = $cardsQuery->all();

        $recentVisits = $this->visitScope(
            $visitsTable->find()
                ->contain(['Cards'])
                ->orderBy(['Visits.created' => 'DESC'])
                ->limit(15)
        )->all();

        $this->set(compact(
            'totalVisits',
            'homeVisits',
            'cardVisits',
            'todayVisits',
            'weekVisits',
            'dailyVisits',
            'maxDaily',
            'cardStats',
            'recentVisits'
        ));
    }

    public function cards()
    {
        $query = $this->visibleCards()
            ->contain(['Themes', 'Users'])
            ->select($this->Cards)
            ->select(['visit_count' => $this->Cards->Visits->find()->func()->count('Visits.id')])
            ->leftJoinWith('Visits')
            ->groupBy(['Cards.id']);
        $search = trim((string)$this->request->getQuery('q'));
        if ($search !== '') {
            $query->where([
                'OR' => [
                    'Cards.name LIKE' => '%' . $search . '%',
                    'Cards.url LIKE' => '%' . $search . '%',
                    'Cards.description LIKE' => '%' . $search . '%',
                ],
            ]);
        }

        $this->paginate = [
            'limit' => 20,
            'order' => ['Cards.modified' => 'DESC'],
        ];
        $cards = $this->paginate($query);
        $this->set(compact('cards', 'search'));
    }

    public function addCard()
    {
        $card = $this->Cards->newEmptyEntity();
        $card->active = 1;
        $card->theme_id = 1;
        $card->user_id = $this->currentUserId();
        foreach (Card::DEFAULT_STYLES as $field => $value) {
            $card->set($field, $value);
        }

        if ($this->request->is('post')) {
            $this->unlockCardForm();
            $data = $this->prepareCardData($this->request->getData());
            $card = $this->Cards->patchEntity($card, $data);
            $this->applyUploadedImage($card);

            if (!$this->isAdmin()) {
                $card->user_id = $this->currentUserId();
            }

            if ($this->Cards->save($card)) {
                $this->Flash->success('La tarjeta se creó correctamente.');

                return $this->redirect(['action' => 'editCard', $card->id]);
            }
            $this->Flash->error('No se pudo guardar la tarjeta. Revisa los campos.');
        }

        $this->setCardFormLists();
        $this->set(compact('card'));
    }

    public function editCard($id = null)
    {
        $card = $this->Cards->get($id, contain: ['CardLinks' => 'LinkTypes', 'Themes', 'Users']);
        $this->assertCanManage($card);
        $this->unlockCardForm();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->prepareCardData($this->request->getData(), (int)$card->id);
            $card = $this->Cards->patchEntity($card, $data, [
                'associated' => ['CardLinks'],
            ]);
            $this->applyUploadedImage($card);

            if (!$this->isAdmin()) {
                $card->user_id = $this->currentUserId();
            }

            if ($this->Cards->save($card, ['associated' => ['CardLinks']])) {
                $this->Flash->success('La tarjeta se actualizó correctamente.');

                return $this->redirect(['action' => 'editCard', $card->id]);
            }
            $this->Flash->error('No se pudo guardar la tarjeta. Revisa los campos marcados.');
        }

        $this->setCardFormLists();
        $linkTypes = $this->fetchTable('LinkTypes')->find('list')->orderBy(['title' => 'ASC'])->all();
        $this->set(compact('card', 'linkTypes'));
    }

    public function deleteCard($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        $this->assertCanManage($card);

        if ($this->Cards->delete($card)) {
            $this->Flash->success('La tarjeta se eliminó.');
        } else {
            $this->Flash->error('No se pudo eliminar la tarjeta.');
        }

        return $this->redirect(['action' => 'cards']);
    }

    public function deleteLink($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $links = $this->fetchTable('CardLinks');
        $link = $links->get($id, contain: ['Cards']);
        $this->assertCanManage($link->card);

        if ($links->delete($link)) {
            $this->Flash->success('El enlace se eliminó.');
        } else {
            $this->Flash->error('No se pudo eliminar el enlace.');
        }

        return $this->redirect(['action' => 'editCard', $link->card_id]);
    }

    private function visibleCards()
    {
        $query = $this->Cards->find();
        if (!$this->isAdmin()) {
            $query->where(['Cards.user_id' => $this->currentUserId()]);
        }

        return $query;
    }

    private function visitScope($query)
    {
        $this->applyVisitScope($query);

        return $query;
    }

    private function applyVisitScope($query): void
    {
        if ($this->isAdmin()) {
            return;
        }

        $cardIds = $this->Cards->find()
            ->select(['id'])
            ->where(['user_id' => $this->currentUserId()])
            ->all()
            ->extract('id')
            ->toList();

        if ($cardIds === []) {
            $query->where(['1 =' => 0]);

            return;
        }

        $query->where(['Visits.card_id IN' => $cardIds]);
    }

    private function setCardFormLists(): void
    {
        $themes = $this->Cards->Themes->find('list')->all();
        $users = $this->isAdmin()
            ? $this->Cards->Users->find('list')->orderBy(['name' => 'ASC'])->all()
            : [];
        $this->set(compact('themes', 'users'));
    }

    private function prepareCardData(array $data, ?int $cardId = null): array
    {
        if (empty($data['url']) && !empty($data['name'])) {
            $data['url'] = Text::slug(strtolower((string)$data['name']));
        } elseif (!empty($data['url'])) {
            $data['url'] = strtolower(trim((string)$data['url']));
        }

        $data['active'] = !empty($data['active']) ? 1 : 0;

        if (!empty($data['card_links']) && is_array($data['card_links'])) {
            foreach ($data['card_links'] as $index => $link) {
                if ($this->isBlankLink($link)) {
                    unset($data['card_links'][$index]);
                    continue;
                }
                $data['card_links'][$index]['active'] = !empty($link['active']) ? 1 : 0;
                $data['card_links'][$index]['priority'] = isset($link['priority']) && $link['priority'] !== '' && $link['priority'] !== null
                    ? (int)$link['priority']
                    : null;
                if ($cardId) {
                    $data['card_links'][$index]['card_id'] = $cardId;
                }
            }
        }

        return $data;
    }

    private function isBlankLink(array $link): bool
    {
        if (!empty($link['id'])) {
            return false;
        }

        return trim((string)($link['title'] ?? '')) === ''
            && trim((string)($link['url'] ?? '')) === ''
            && trim((string)($link['content'] ?? '')) === '';
    }

    private function applyUploadedImage(Card $card): void
    {
        $file = $this->request->getUploadedFile('image_file');
        if (!$file instanceof UploadedFileInterface || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return;
        }

        $filename = $this->storeUploadedImage($file);
        if ($filename) {
            $card->image = $filename;
        }
    }

    private function storeUploadedImage(UploadedFileInterface $file): ?string
    {
        if ($file->getError() !== UPLOAD_ERR_OK) {
            $this->Flash->error('No se pudo subir la imagen.');

            return null;
        }

        $client = $file->getClientFilename() ?? 'imagen';
        $ext = strtolower((string)pathinfo($client, PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
            $this->Flash->error('La imagen debe ser JPG, PNG, GIF o WEBP.');

            return null;
        }

        if ($file->getSize() > 5 * 1024 * 1024) {
            $this->Flash->error('La imagen no puede superar 5MB.');

            return null;
        }

        $name = Text::slug(pathinfo($client, PATHINFO_FILENAME)) . '-' . time() . '.' . $ext;
        $dest = WWW_ROOT . 'img' . DS . $name;
        $file->moveTo($dest);

        $themeDir = ROOT . DS . 'plugins' . DS . 'Modern' . DS . 'webroot' . DS . 'img';
        if (is_dir($themeDir)) {
            @copy($dest, $themeDir . DS . $name);
        }

        return $name;
    }

    private function unlockCardForm(): void
    {
        $this->FormProtection->setConfig('unlockedFields', ['image_file', 'card_links']);
    }

    private function assertCanManage(Card $card): void
    {
        if ($this->isAdmin()) {
            return;
        }
        if ((int)$card->user_id !== $this->currentUserId()) {
            throw new ForbiddenException('No tienes permiso para administrar esta tarjeta.');
        }
    }

    private function isAdmin(): bool
    {
        $identity = $this->identityEntity();

        return $identity !== null && (int)$identity->get('role_id') === 1;
    }

    private function currentUserId(): int
    {
        $identity = $this->identityEntity();

        return $identity ? (int)$identity->getIdentifier() : 0;
    }

    private function identityEntity()
    {
        return $this->request->getAttribute('identity');
    }
}
