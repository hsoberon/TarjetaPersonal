<!-- Nav Menu -->
<div class="nav-menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <?= $this->Html->link(
                            '<span>T</span>arjeta <span>P</span>ersonal',
                            ['action' => 'home'],
                            ['class' => 'logo', 'escape' => false]
                    ) ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"> <a class="nav-link active" href="#home">Descripción <span class="visually-hidden">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#features">Características</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#gallery">Ejemplos</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#pricing">PRECIOS</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#contact">CONTACTO</a> </li>
                            <li class="nav-item"><a href="#" class="btn btn-outline-light my-3 my-sm-0 ms-lg-3">Prueba</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>