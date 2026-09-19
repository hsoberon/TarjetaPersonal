<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Card> $cards
 * @var string $search
 */
$this->assign('title', 'Tarjetas');
?>
<div class="toolbar">
    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'admin-form', 'style' => 'display:flex;gap:8px;margin:0;']) ?>
        <?= $this->Form->control('q', [
            'label' => false,
            'value' => $search,
            'placeholder' => 'Buscar por nombre o URL',
            'templates' => ['inputContainer' => '{{content}}'],
        ]) ?>
        <?= $this->Form->button('Buscar', ['class' => 'btn-admin']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link('Nueva tarjeta', ['action' => 'addCard'], ['class' => 'btn-admin']) ?>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th></th>
                    <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th><?= $this->Paginator->sort('url', 'URL') ?></th>
                    <th>Dueño</th>
                    <th>Visitas</th>
                    <th><?= $this->Paginator->sort('active', 'Estado') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cards as $card): ?>
                <tr>
                    <td>
                        <?php if ($card->image): ?>
                            <?= $this->Html->image($card->image, [
                                'class' => 'thumb',
                                'alt' => $card->name,
                                'plugin' => 'Modern',
                            ]) ?>
                        <?php endif; ?>
                    </td>
                    <td><?= h($card->name) ?></td>
                    <td>/<?= h($card->url) ?></td>
                    <td><?= $card->hasValue('user') ? h($card->user->name) : '' ?></td>
                    <td><?= $this->Number->format((int)($card->visit_count ?? 0)) ?></td>
                    <td>
                        <span class="badge <?= $card->active ? 'badge-on' : 'badge-off' ?>">
                            <?= $card->active ? 'Activa' : 'Inactiva' ?>
                        </span>
                    </td>
                    <td>
                        <?= $this->Html->link('Editar', ['action' => 'editCard', $card->id], ['class' => 'btn-admin']) ?>
                        <?= $this->Html->link('Ver', ['controller' => 'Pages', 'action' => 'card', $card->url], ['target' => '_blank', 'class' => 'btn-admin btn-ghost']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'deleteCard', $card->id], [
                            'confirm' => '¿Eliminar la tarjeta de ' . $card->name . '?',
                            'class' => 'btn-admin btn-danger',
                        ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('«') ?>
            <?= $this->Paginator->prev('‹') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('›') ?>
            <?= $this->Paginator->last('»') ?>
        </ul>
        <p><?= $this->Paginator->counter('Página {{page}} de {{pages}}, {{current}} de {{count}} tarjetas') ?></p>
    </div>
</div>
