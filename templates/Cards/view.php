<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Card'), ['action' => 'edit', $card->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Card'), ['action' => 'delete', $card->id], ['confirm' => __('Are you sure you want to delete # {0}?', $card->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cards'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Card'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cards view content">
            <h3><?= h($card->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($card->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($card->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($card->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($card->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= h($card->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Theme') ?></th>
                    <td><?= $card->hasValue('theme') ? $this->Html->link($card->theme->title, ['controller' => 'Themes', 'action' => 'view', $card->theme->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $card->hasValue('user') ? $this->Html->link($card->user->name, ['controller' => 'Users', 'action' => 'view', $card->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($card->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $this->Number->format($card->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($card->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($card->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
