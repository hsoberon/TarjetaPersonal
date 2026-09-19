<?php
$this->assign('title', 'Iniciar sesión');
?>
<div class="login-card admin-form">
    <h2>Panel de administración</h2>
    <p class="lead">Ingresa para gestionar tus tarjetas y ver las visitas.</p>
    <?= $this->Form->create(null, ['class' => 'admin-form']) ?>
        <?= $this->Form->control('username', [
            'required' => true,
            'label' => 'Usuario',
            'placeholder' => 'usuario',
        ]) ?>
        <?= $this->Form->control('password', [
            'required' => true,
            'label' => 'Contraseña',
        ]) ?>
        <?= $this->Form->submit('Entrar', ['class' => 'btn-admin']) ?>
    <?= $this->Form->end() ?>
</div>
