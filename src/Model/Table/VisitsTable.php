<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Http\ServerRequest;
use Cake\I18n\DateTime;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Visits Model
 *
 * @property \App\Model\Table\CardsTable&\Cake\ORM\Association\BelongsTo $Cards
 */
class VisitsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('visits');
        $this->setDisplayField('path');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('page_type')
            ->maxLength('page_type', 50)
            ->notEmptyString('page_type');

        $validator
            ->integer('card_id')
            ->allowEmptyString('card_id');

        $validator
            ->scalar('path')
            ->maxLength('path', 250)
            ->notEmptyString('path');

        return $validator;
    }

    /**
     * Store a public page view. Logged-in users are skipped so admin traffic
     * does not inflate the dashboard.
     */
    public function record(ServerRequest $request, string $pageType = 'home', ?int $cardId = null): void
    {
        if ($request->getAttribute('identity')) {
            return;
        }

        if (strtoupper($request->getMethod()) === 'HEAD') {
            return;
        }

        $agent = (string)$request->getHeaderLine('User-Agent');
        if ($agent !== '' && preg_match('/bot|crawl|spider|slurp|facebookexternalhit|preview/i', $agent)) {
            return;
        }

        $visit = $this->newEntity([
            'page_type' => $pageType,
            'card_id' => $cardId,
            'path' => $request->getPath() ?: '/',
            'ip' => $request->clientIp(),
            'user_agent' => $agent !== '' ? mb_substr($agent, 0, 500) : null,
            'referer' => mb_substr((string)$request->referer(), 0, 500) ?: null,
            'created' => DateTime::now(),
        ]);

        $this->save($visit);
    }
}
