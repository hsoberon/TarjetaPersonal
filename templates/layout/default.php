<!DOCTYPE html>
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">


    <?= $this->Html->css([
        'bootstrap.min', 
        'themify-icons', 
        'owl.carousel.min',
        'style',
        ]) 
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script([
        'jquery-3.7.1.min',
        'bootstrap.bundle.min',
        'owl.carousel.min',
        'script',
    ], ['block' => 'scriptBottom']) ?>
    
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-smooth-scroll="true"  data-offset="30">
    
    <?= $this->element('menu'); ?>

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <footer class="my-5">
        <div class="container mb-2">
            <div class="d-flex justify-content-evenly align-items-center">
                <p>COPYRIGHT © <?= date('Y'); ?>. </p>    
                <p><?= $this->Html->link('hsoberon.com', 'https://hsoberon.com', [
                        'target' => '_blank',
                        'rel' => 'nofolow'
                   ]);?></p>
            </div>
        </div>
    </footer>

    
    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
