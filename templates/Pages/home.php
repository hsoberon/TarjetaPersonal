<?php $this->assign('title', 'Tarjeta Personal'); ?>

<header class="bg-gradient-page" id="home">
    <div class="container mt-5">
        <h1>Tarjetas Personales Digitales</h1>
        <p class="tagline">Crea y personaliza tu tarjeta personal digital, con tu foto, códigos QR, y enlaces fáciles para tus contactos</p>
    </div>
    <div class="img-holder mt-3">
        <?= $this->Html->image('iphonex.png', [
            'alt' => 'phone',
            'class' => 'img-fluid'
        ]) ?>
    </div>
</header>

<div class="client-logos my-5">
    <div class="container text-center">
        <?= $this->Html->image('client-logos.png', [
                    'alt' => 'client logos',
                    'class' => 'img-fluid'
        ]) ?>
    </div>
</div>

<div class="section light-bg" id="features">


    <div class="container">

        <div class="section-title">
            <small>CARACTERÍSTICAS</small>
            <h3>Funciones útiles</h3>
        </div>


        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card features">
                    <div class="card-body">
                        <div class="media">
                            <span class="ti-face-smile gradient-fill ti-3x mr-3"></span>
                            <div class="media-body">
                                <h4 class="card-title">Simple</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card features">
                    <div class="card-body">
                        <div class="media">
                            <span class="ti-settings gradient-fill ti-3x mr-3"></span>
                            <div class="media-body">
                                <h4 class="card-title">Personalizables</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card features">
                    <div class="card-body">
                        <div class="media">
                            <span class="ti-lock gradient-fill ti-3x mr-3"></span>
                            <div class="media-body">
                                <h4 class="card-title">Seguro</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- // end .section -->
<div class="section">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                <h2>Discover our App</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati vel exercitationem eveniet vero maxime ratione </p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
        </div>
        <div class="perspective-phone">
            <?= $this->Html->image('perspective.png', [
                    'alt' => 'perspective phone',
                    'class' => 'img-fluid'
        ]) ?>
        </div>
    </div>

</div>
<!-- // end .section -->


<div class="section light-bg">
    <div class="container">
        <div class="section-title">
            <small>FEATURES</small>
            <h3>Do more with our app</h3>
        </div>

        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#communication" href="#">Communication</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#schedule" href="#">Scheduling</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#messages" href="#">Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#livechat" href="#">Live Chat</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="communication">
                <div class="d-flex flex-column flex-lg-row">
                    <?= $this->Html->image('graphic.png', [
                                'alt' => 'graphic',
                                'class' => 'img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0'
                    ]) ?>
                    <div>

                        <h2>Communicate with ease</h2>
                        <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                            congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                        </p>
                        <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                            sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="schedule">
                <div class="d-flex flex-column flex-lg-row">
                    <div>
                        <h2>Scheduling when you want</h2>
                        <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                            congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                        </p>
                        <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                            sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                        </p>
                    </div>
                    <?= $this->Html->image('graphic.png', [
                                'alt' => 'graphic',
                                'class' => 'img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0'
                    ]) ?>
                </div>
            </div>
            <div class="tab-pane fade" id="messages">
                <div class="d-flex flex-column flex-lg-row">
                    <?= $this->Html->image('graphic.png', [
                                'alt' => 'graphic',
                                'class' => 'img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0'
                    ]) ?>
                    <div>
                        <h2>Realtime Messaging service</h2>
                        <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                            congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                        </p>
                        <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                            sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="livechat">
                <div class="d-flex flex-column flex-lg-row">
                    <div>
                        <h2>Live chat when you needed</h2>
                        <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                            congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                        </p>
                        <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                            sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                        </p>
                    </div>
                    <?= $this->Html->image('graphic.png', [
                                'alt' => 'graphic',
                                'class' => 'img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0'
                    ]) ?>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- // end .section -->

<div class="section">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?= $this->Html->image('dualphone.png', [
                                'alt' => 'dual phone',
                                'class' => 'img-fluid'
                    ]) ?>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>
                    <h2>Launch your App</h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati vel exercitationem eveniet vero maxime ratione </p>
                    <a href="#" class="btn btn-primary">Read more</a></div>
            </div>
        </div>

    </div>

</div>
<!-- // end .section -->


<div class="section light-bg">

    <div class="container">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <ul class="list-unstyled ui-steps">
                    <li class="media">
                        <div class="circle-icon mr-4">1</div>
                        <div class="media-body">
                            <h5>Create an Account</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                        </div>
                    </li>
                    <li class="media my-4">
                        <div class="circle-icon mr-4">2</div>
                        <div class="media-body">
                            <h5>Share with friends</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem eveniet</p>
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-icon mr-4">3</div>
                        <div class="media-body">
                            <h5>Enjoy your life</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <?= $this->Html->image('iphonex.png', [
                                'alt' => 'iphone',
                                'class' => 'img-fluid'
                    ]) ?>
            </div>

        </div>

    </div>

</div>
<!-- // end .section -->


<div class="section">
    <div class="container">
        <div class="section-title">
            <small>TESTIMONIALS</small>
            <h3>What our Customers Says</h3>
        </div>

        <div class="testimonials owl-carousel">
            <div class="testimonials-single">
                <?= $this->Html->image('client.png', [
                                'alt' => 'client',
                                'class' => 'client-img'
                    ]) ?>
                <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                <p class="text-primary">United States</p>
            </div>
            <div class="testimonials-single">
                <?= $this->Html->image('client.png', [
                                'alt' => 'client',
                                'class' => 'client-img'
                    ]) ?>
                <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                <p class="text-primary">United States</p>
            </div>
            <div class="testimonials-single">
                <?= $this->Html->image('client.png', [
                                'alt' => 'client',
                                'class' => 'client-img'
                    ]) ?>
                <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                <p class="text-primary">United States</p>
            </div>
        </div>

    </div>

</div>
<!-- // end .section -->


<div class="section light-bg" id="gallery">
    <div class="container">
        <div class="section-title">
            <small>GALERÍA</small>
            <h3>Ejemplos de tarjetas</h3>
        </div>

        <div class="img-gallery owl-carousel owl-theme">
            <?php
            $examples = [
                [
                    'name' => 'Ana López',
                    'role' => 'Diseñadora gráfica',
                    'text' => 'Identidad visual y marcas',
                    'initials' => 'AL',
                    'from' => '#05abe0',
                    'to' => '#da7bff',
                    'links' => [
                        ['icon' => 'ti-mobile', 'label' => 'Llamar'],
                        ['icon' => 'ti-email', 'label' => 'Correo'],
                        ['icon' => 'ti-comment', 'label' => 'WhatsApp'],
                    ],
                ],
                [
                    'name' => 'Mateo Ruiz',
                    'role' => 'Arquitecto',
                    'text' => 'Espacios para habitar',
                    'initials' => 'MR',
                    'from' => '#f6d365',
                    'to' => '#fda085',
                    'links' => [
                        ['icon' => 'ti-mobile', 'label' => 'Llamar'],
                        ['icon' => 'ti-email', 'label' => 'Correo'],
                        ['icon' => 'ti-location-pin', 'label' => 'Ubicación'],
                    ],
                ],
                [
                    'name' => 'Lucía Fernández',
                    'role' => 'Fotógrafa',
                    'text' => 'Retratos y eventos',
                    'initials' => 'LF',
                    'from' => '#667eea',
                    'to' => '#764ba2',
                    'links' => [
                        ['icon' => 'ti-comment', 'label' => 'WhatsApp'],
                        ['icon' => 'ti-instagram', 'label' => 'Instagram'],
                        ['icon' => 'ti-email', 'label' => 'Correo'],
                    ],
                ],
                [
                    'name' => 'Andrés Vega',
                    'role' => 'Chef',
                    'text' => 'Cocina de autor',
                    'initials' => 'AV',
                    'from' => '#11998e',
                    'to' => '#38ef7d',
                    'links' => [
                        ['icon' => 'ti-mobile', 'label' => 'Llamar'],
                        ['icon' => 'ti-comment', 'label' => 'WhatsApp'],
                        ['icon' => 'ti-location-pin', 'label' => 'Ubicación'],
                    ],
                ],
            ];
            foreach ($examples as $example):
            ?>
            <article class="sample-card" style="background: linear-gradient(121deg, <?= h($example['from']) ?>, <?= h($example['to']) ?>);">
                <div class="sample-inner">
                    <div class="sample-avatar" aria-hidden="true"><?= h($example['initials']) ?></div>
                    <div class="sample-qr" aria-hidden="true"></div>
                    <h4><?= h($example['name']) ?></h4>
                    <p class="sample-role"><?= h($example['role']) ?></p>
                    <p class="sample-text"><?= h($example['text']) ?></p>
                    <div class="sample-links">
                        <?php foreach ($example['links'] as $link): ?>
                            <div>
                                <span class="<?= h($link['icon']) ?>"></span>
                                <?= h($link['label']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

    </div>

</div>
<!-- // end .section -->





<div class="section" id="pricing">
    <div class="container">
        <div class="section-title">
            <small>PRECIOS</small>
            <h3>Ajustados a tus necesidades</h3>
        </div>

        <div class="row row-cols-1 row-cols-lg-3">
            <div class="col">
                <div class="card pricing">
                    <div class="card-head">
                        <small class="text-primary">PERSONAL</small>
                        <span class="price">$180.000<sub>COP</sub></span>
                        <span class="text-primary">Precio anual</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">1 Tarjeta Personal</div>
                        <div class="list-group-item">Diferentes plantillas</div>
                        <div class="list-group-item">Personalización de color</div>
                        <div class="list-group-item">Enlaces a contactos</div>
                    </ul>
                    <div class="card-body">
                        <div class="d-grid">
                          <a href="#" class="btn btn-primary btn-lg">Escoger Plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card pricing popular">
                    <div class="card-head">
                        <small class="text-primary">EMPRESARIAL</small>
                        <span class="price">$130.000<sub>COP</sub></span>
                        <span class="text-primary">Por tarjeta / Precio anual</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">20 tarjétas personales Mínimo</div>
                        <div class="list-group-item">Logo empresarial</div>
                        <div class="list-group-item">Asesoría y soporte</div>
                        <div class="list-group-item">Reportes y analítica</div>
                        <div class="list-group-item">Carga masiva</div>
                    </ul>
                    <div class="card-body">
                        <div class="d-grid">
                          <a href="#" class="btn btn-primary btn-lg">Escoger Plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card pricing ">
                    <div class="card-head">
                        <small class="text-primary">Paquete</small>
                        <span class="price">$150.000<sub>COP</sub></span>
                        <span class="text-primary">Por tarjeta / Precio anual</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">10 Tarjetas Personales</div>
                        <div class="list-group-item">Plantillas personalizables</div>
                        <div class="list-group-item">Personalización de color</div>
                        <div class="list-group-item">Reportes y analíticas</div>
                    </ul>
                    <div class="card-body">
                        <div class="d-grid">
                          <a href="#" class="btn btn-primary btn-lg">Escoger Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // end .pricing -->


    </div>

</div>
<!-- // end .section -->


<div class="section pt-0">
    <div class="container">
        <div class="section-title">
            <small>FAQ</small>
            <h3>Preguntas Frecuentes</h3>
        </div>

        <div class="row pt-4">
            <div class="col-md-6">
                <h4 class="mb-3">Funciona con cualquier dispositivo?</h4>
                <p class="light-font mb-5">El QR funciona de forma estándar para los teléfono inteligente modernos con cámara. </p>
                <h4 class="mb-3">What payment methods do you accept?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>

            </div>
            <div class="col-md-6">
                <h4 class="mb-3">Can I change my plan later?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                <h4 class="mb-3">Do you have a contract?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>

            </div>
        </div>
    </div>

</div>
<!-- // end .section -->



<div class="section bg-gradient-page">
    <div class="container">
        <div class="call-to-action">

            <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
            <h2>Disponible cuando la necesites</h2>
            <p class="tagline">Añádela a tu pantalla de inicio muy fácilmente para tener tu tarjeta siempre a la mano.</p>
            <div class="my-4">

                <a href="#" class="btn btn-light">
                    <?= $this->Html->image('appleicon.png', ['alt' => 'icon']); ?>
                     App Store</a>
                <a href="#" class="btn btn-light">
                    <?= $this->Html->image('playicon.png', ['alt' => 'icon']); ?>
                     Google play</a>
            </div>
            <p class="text-primary"><small><i>Funciona en iOS y en Android.</i></small></p>
        </div>
    </div>

</div>
<!-- // end .section -->

<div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left flex flex-column">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> Medellín, Colombia</p>
                    <div class=" d-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:info@hsoberon.com">info@hsoberon.com</a>
                        </p>
                    </div>
                    <div class="d-block">
                        <p class="mb-0">
                            <span class="ti-comment-alt mr-2"></span>
                             <a href="https://wa.me/+573015834971" target="_blank" rel="noopener">WhatsApp: +573015834971</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="https://wa.me/+573015834971" target="_blank" rel="noopener" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" aria-hidden="true" focusable="false">
                                <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
