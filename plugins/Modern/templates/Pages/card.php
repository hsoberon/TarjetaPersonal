<?php $this->assign('title', $card->name); ?>

<div class="card">
    <div class="profile">
        <?= $this->Html->image($card->image, ['alt' => 'Portrait '.$card->name]) ?>
    </div>
    <div class="qrcode my-4">
        <?= $this->Html->image(
            // 'https://quickchart.io/qr?text='.'http://tarjetapersonal.co/'.$card->url,
            'https://quickchart.io/qr?text=https%3A%2F%2Ftarjetapersonal.co%2Fhernan-soberon&ecLevel=H&margin=2&size=300&format=svg',
            ['class' => 'img-fluid', 'alt' => 'QR code']); ?>
    </div>
    <h1><?= $card->name; ?></h1>
    <?php if($card->description): ?><p class="description"><?= $card->description; ?></p><?php endif; ?>

    <!-- LINKS -->
    <?= $this->element('card_links', ['links' => $card->card_links]); ?> 
</div>