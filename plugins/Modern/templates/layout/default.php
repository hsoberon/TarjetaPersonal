<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Tarjeta personal - Tarjetas digitales personales">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->Url->image('favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->Url->image('favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->Url->image('favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= $this->Url->image('favicon/site.webmanifest') ?> ">
    <link rel="mask-icon" 
        href="<?= $this->Url->image('favicon/safari-pinned-tab.svg') ?> " 
        color="#560c40">
    <?= $this->Html->meta(
        'msapplication-TileColor',
        '#560c40'
    ); ?>
    <?= $this->Html->meta(
        'theme-color',
        '#560C40'
    ); ?>


    <!-- for Meta OG Tags -->
    <meta property="og:image" content="<?= $this->fetch('profile') ?>"/>
    <meta property="og:title" content="<?= $this->fetch('title') ?>"/>
    <meta property="og:description" content="<?= $this->fetch('description') ?>"/>
    <meta property="og:image:width" content="144"/>
    <meta property="og:image:height" content="144"/>
    

    <?= $this->Html->css('bootstrap.min', ['plugin' => false]); ?>
    <?= $this->Html->css([
    	'../font/fontawesome/css/all.min', 
    	'style',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script([
        'jquery-3.7.1.min',
        'bootstrap.bundle.min',
        '../font/fontawesome/js/all.min',
    ], ['block' => 'scriptBottom', 'plugin' => false]) ?>

    <?= $this->Html->script([
        '../font/fontawesome/js/all.min',
    ], ['block' => 'scriptBottom']) ?>

    <title><?= $this->fetch('title') ?> | Tarjeta Personal</title>

    <style type="text/css">
        :root {
          --body_bg: #1f253d;
          --body_grad: linear-gradient(121deg,rgba(5, 171, 224, 1),rgba(218, 123, 255, 1));
          --card-color: rgba(0, 0, 0, 0.28);
          --card-p: #6bf8ff;
          --card-h1: white;
          --card-a: white;
          --card-a-hover: #6bf8ff;
        }
    </style>
    
</head>
<body>

    <?= $this->Flash->render() ?>
    
    <?= $this->fetch('content') ?>

    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
