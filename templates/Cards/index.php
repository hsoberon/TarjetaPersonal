<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Card> $cards
 */
?>
<div class="cards index content">
    <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cards') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th><?= $this->Paginator->sort('theme_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cards as $card): ?>
                <tr>
                    <td><?= $this->Number->format($card->id) ?></td>
                    <td><?= $this->Number->format($card->active) ?></td>
                    <td><?= h($card->name) ?></td>
                    <td><?= h($card->image) ?></td>
                    <td><?= h($card->url) ?></td>
                    <td><?= h($card->description) ?></td>
                    <td><?= h($card->position) ?></td>
                    <td><?= $card->hasValue('theme') ? $this->Html->link($card->theme->title, ['controller' => 'Themes', 'action' => 'view', $card->theme->id]) : '' ?></td>
                    <td><?= $card->hasValue('user') ? $this->Html->link($card->user->name, ['controller' => 'Users', 'action' => 'view', $card->user->id]) : '' ?></td>
                    <td><?= h($card->created) ?></td>
                    <td><?= h($card->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $card->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $card->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
