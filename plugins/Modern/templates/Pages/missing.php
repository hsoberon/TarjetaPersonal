<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card|null $contactCard
 */
$this->assign('title', 'Card not available');
$this->assign('description', 'This card is not available. Please contact me.');
$this->assign('profile', $contactCard && $contactCard->image ? $this->Url->image($contactCard->image) : '');
?>
<div class="card missing-card">
    <div class="missing-illustration">
        <?= $this->Html->image('card-cut-scissors.png', [
            'alt' => 'A cartoon card cut by scissors',
            'class' => 'img-fluid',
        ]) ?>
    </div>
    <h1>This card is not available</h1>
    <p class="description">Please contact me.</p>

    <?php if (!empty($contactCard)): ?>
        <div class="profile">
            <?= $this->Html->image($contactCard->image, [
                'alt' => 'Portrait ' . $contactCard->name,
            ]) ?>
        </div>
        <p class="contact-name">
            <?= $this->Html->link(
                $contactCard->name,
                ['controller' => 'Pages', 'action' => 'card', $contactCard->url]
            ) ?>
        </p>
        <?= $this->Html->link(
            'Administrator',
            ['controller' => 'Pages', 'action' => 'card', $contactCard->url],
            ['class' => 'contact-link missing-card-link']
        ) ?>
    <?php endif; ?>
</div>
