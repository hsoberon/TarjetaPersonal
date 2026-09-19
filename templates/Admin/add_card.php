<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 * @var iterable $themes
 * @var iterable $users
 */
$this->assign('title', 'Nueva tarjeta');
$isAdmin = $isAdmin ?? false;
?>
<div class="admin-card">
    <?= $this->Form->create($card, ['type' => 'file', 'class' => 'admin-form']) ?>
    <?php $this->Form->unlockField('image_file'); ?>
        <?= $this->Form->control('active', ['type' => 'checkbox', 'label' => 'Tarjeta activa']) ?>
        <?= $this->Form->control('name', ['label' => 'Nombre']) ?>
        <?= $this->Form->control('url', ['label' => 'URL pública', 'placeholder' => 'nombre-apellido']) ?>
        <?= $this->Form->control('position', ['label' => 'Cargo / posición']) ?>
        <?= $this->Form->control('description', ['type' => 'textarea', 'label' => 'Descripción']) ?>
        <?= $this->Form->control('theme_id', ['options' => $themes, 'label' => 'Tema']) ?>
        <?php if ($isAdmin && $users): ?>
            <?= $this->Form->control('user_id', ['options' => $users, 'label' => 'Dueño']) ?>
        <?php endif; ?>
        <label>Imagen de perfil</label>
        <?= $this->Form->file('image_file', ['accept' => 'image/jpeg,image/png,image/gif,image/webp']) ?>
        <?= $this->Form->button('Crear tarjeta', ['class' => 'btn-admin']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'cards'], ['class' => 'btn-admin btn-ghost']) ?>
    <?= $this->Form->end() ?>
</div>
