<?php
/**
 * @var \App\View\AppView $this
 * @var \Authentication\IdentityInterface|null $identity
 */
$identity = $identity ?? null;
$isLoginPage = $isLoginPage ?? false;
$isAdmin = $isAdmin ?? false;
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');
$this->assign('title', $this->fetch('title') ?: 'Admin');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= h($this->fetch('title')) ?> | Tarjeta Personal</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->Url->image('favicon/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->Url->image('favicon/favicon-32x32.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <?= $this->Html->css(['bootstrap.min', 'admin']) ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="admin-body<?= $isLoginPage ? ' admin-login-page' : '' ?>">
<?php if ($isLoginPage): ?>
    <main class="admin-login-wrap">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
<?php else: ?>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="<?= $this->Url->build('/admin') ?>">
                <span>T</span>arjeta <span>P</span>ersonal
            </a>
            <p class="admin-user">
                <?= h($identity ? $identity->get('name') : '') ?>
                <small><?= $isAdmin ? 'Administrador' : 'Cliente' ?></small>
            </p>
            <nav class="admin-nav">
                <a class="<?= $controller === 'Admin' && $action === 'index' ? 'active' : '' ?>" href="<?= $this->Url->build('/admin') ?>">Dashboard</a>
                <a class="<?= $controller === 'Admin' && in_array($action, ['cards', 'addCard', 'editCard'], true) ? 'active' : '' ?>" href="<?= $this->Url->build('/admin/cards') ?>">Tarjetas</a>
                <a href="<?= $this->Url->build('/') ?>" target="_blank" rel="noopener">Ver sitio</a>
                <a href="<?= $this->Url->build('/admin/logout') ?>">Salir</a>
            </nav>
        </aside>
        <div class="admin-main">
            <header class="admin-topbar">
                <h1><?= h($this->fetch('title')) ?></h1>
            </header>
            <div class="admin-content">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
<?php endif; ?>
    <?= $this->fetch('postLink') ?>
    <?= $this->Html->script(['jquery-3.7.1.min', 'bootstrap.bundle.min']) ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/i18n/es.js"></script>
    <?= $this->Html->script('admin') ?>
    <?= $this->fetch('script') ?>
</body>
</html>
