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
            <small>GALLERY</small>
            <h3>App Screenshots</h3>
        </div>

        <div class="img-gallery owl-carousel owl-theme">
            <?php 
                echo $this->Html->image('screen1.jpg', ['alt' => 'image']);
                echo $this->Html->image('screen2.jpg', ['alt' => 'image']);
                echo $this->Html->image('screen3.jpg', ['alt' => 'image']);
                echo $this->Html->image('screen1.jpg', ['alt' => 'image']);

             ?>
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
            <h2>Download Anywhere</h2>
            <p class="tagline">Available for all major mobile and desktop platforms. Rapidiously visualize optimal ROI rather than enterprise-wide methods of empowerment. </p>
            <div class="my-4">

                <a href="#" class="btn btn-light">
                    <?= $this->Html->image('appleicon.png', ['alt' => 'icon']); ?>
                     App Store</a>
                <a href="#" class="btn btn-light">
                    <?= $this->Html->image('playicon.png', ['alt' => 'icon']); ?>
                     Google play</a>
            </div>
            <p class="text-primary"><small><i>*Works on iOS 10.0.5+, Android Kitkat and above. </i></small></p>
        </div>
    </div>

</div>
<!-- // end .section -->

<div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> 1485 Pacific St, Brooklyn, NY 11216 USA</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:support@mobileapp.com">support@mobileapp.com</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">518-3636-2800</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
