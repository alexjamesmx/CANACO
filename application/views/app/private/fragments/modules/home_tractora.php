<!--<?= var_dump_format($this->session->userdata()) ?>-->

<?php if ($this->session->userdata('rol_id') == 19) : ?>
    <div class="row">
        <div class="col-12 mb-2 mb-4">
            <a href="<?= base_url() ?>app/requirements/new" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0" style="font-size: 20px;"> Nuevo</p>
                    <p class="card-text mb-0" style="font-size: 20px;"> Requerimiento</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mb-2 mb-4">
            <a href="<?= base_url(
                            'app/home'
                        ) ?>" class="card" href='#'>
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-handshake" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Transacciones </p>
                    <p class="card-text mb-0"> Completadas </p>
                    <br>
                    <p id="completados" class="lead text-center text-secondary"> 0 </p>
                </div>
            </a>
        </div>
        <div class="col-6 mb-2 mb-4">
            <a href="<?= base_url(
                            'app/home'
                        ) ?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Perfil </p>
                    <p class="card-text mb-0"> Verificado </p>
                    <br>
                    <div id='porcentaje'>
                        <p class="lead text-center text-danger"> 0% </p>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <div class="row">
    </div>
<?php endif; ?>

<?php if ($this->session->userdata('rol_id') == 19) : ?>
    <div class="col-12 col-lg-6 mb-4 mt-4" id='misreqsgrande' style="display: none;">
        <div class="alert alert-danger alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">
            <div id='misreqs'>
                <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em><span id='misreqs'>0</span> requerimientos
                            pendientes</em></strong> </h4>
            </div>
            <h5> <i class="fas fa-edit"></i> Finaliza tus requerimientos para seguir generando
                oportunidades de negocio </h5>
            <br>
            <a href="<?= base_url() ?>app/requirements/mis_requerimientos" class="btn btn-danger">
                <i class="iconsminds-repeat-3"></i>
                Terminar ahora
            </a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php endif; ?>