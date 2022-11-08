<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="mb-4">
                    <?php foreach ($account_data_n as $account) { ?>
                        <i class="simple-icon-list"></i> <?= $section_data->nombre_sec ?>
                </h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center mb-4">
                            <strong>

                            </strong>
                        </h2>
                        <hr>

                        <form id="form-subir-img" action="<?= base_url('app/Prueba_d/subirImagen') ?>" class="validate-ptp" method="post" enctype="multipart/form-data">
                            <?php if (is_null($account->negocio_logo)) { ?>
                                <img id="negocio_logo" src="<?= base_url('static/uploads/archivos/logo_default.png') ?>" alt="Impactos Digitales" class="img-fluid d-block mx-auto" style="max-height: 254px; ">
                            <?php } else { ?>
                                <img id="negocio_logo" src="<?= base_url('static/uploads/perfil/' . $account->negocio_logo) ?>" alt="Impactos Digitales" class="img-fluid d-block mx-auto" style="max-height: 254px; opacity: .2;">
                            <?php } ?>

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="alert alert-warning">
                                        <h4>
                                            <i class="fas fa-exclamation-triangle"></i>
                                            El logo de la empresa debe ser un archivo en formato <code>.gif .jpeg .png o .jpg</code>
                                            <hr>
                                            Con un peso máximo de <code>512 kb.</code>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <input type="file" name="fileImagen" id="fileImagen" class="form-control btn btn-primary required btn-block mt-3">
                            <button class="btn btn-link btn-block mb-4 mt-2" style="font-size: 18px">
                                <i name="btnon" id="btnon" class="fas fa-camera"></i>
                                <u>
                                    Aplicar cambios
                                    </input>
                                </u>
                            </button>
                        </form>
                        <hr>
                    </div>
                    <div class="col-12 mt-2">
                        <h4>
                            <strong class="d-block mb-2 text-primary text-center">
                                Promedio de valoración
                            </strong>
                        </h4>
                    </div>
                    <div class="col-12 mt-2 mb-4 text-center">
                        <h1>
                            <strong>5</strong>
                        </h1>
                        <br>
                        <h1 class="text-center">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </h1>
                        <br>
                        <button class="btn btn-link btn-block mb-4">
                            <u>
                                <i class="fas fa-camera"></i>
                                Ver detalle
                            </u>
                        </button>
                        <hr>
                    </div>
                    <div class="col-6 mt-2 mb-4">
                        <h6>
                            <strong class="d-block mb-2 text-primary">
                                Total de transacciones
                            </strong>
                        </h6>
                        <div id="indicador-1" data-percent="40" data-progressBarColor="#01551f">
                        </div>
                    </div>
                    <div class="col-6 mt-2 mb-4">
                        <h6>
                            <strong class="d-block mb-2 text-primary">
                                Transacciones calificadas
                            </strong>
                        </h6>
                        <div id="indicador-2" data-percent="25" data-progressBarColor="#B20D30">
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h6>
                            <strong class="d-block mb-2 text-primary">
                                Índice de cierre
                            </strong>
                        </h6>
                        <div id="indicador-3" data-percent="17" data-progressBarColor="#3F84E5">
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h6>
                            <strong class="d-block mb-2 text-primary">
                                Requerimientos urgentes
                            </strong>
                        </h6>
                        <div class="mx-auto">
                            <div id="indicador-4" data-percent="88" data-progressBarColor="#00120B">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <h4 class="text-center mt-5 mb-2">
                            <strong>
                                Medallas
                            </strong>
                        </h4>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <?php if (!isset($medallaU)) { ?>
                            <strong>
                                Ups aún no consigues tu primera Medalla
                            </strong>
                            <hr>
                            <?php  } else {
                            foreach ($medallaU as $medalla) {  ?>

                                <button class="btn  p-2 m-2" style="display: inline-block">
                                    <img src="<?= base_url('static/recompensas/medallas/' . $medalla->medalla_img) ?>" class="img-fluid d-block mx-auto " style="max-height: 45px;  " disabled>
                                </button>
                        <?php }
                        } ?>

                        <?php foreach ($medallas as $meds) { ?>
                            <button class="btn  p-2 m-2" style="display: inline-block">
                                <img src="<?= base_url('static/recompensas/medallas/' . $meds->medalla_img) ?>" class="img-fluid d-block mx-auto " style="max-height: 45px; opacity:.2 " disabled>
                            </button>
                        <?php } ?>
                        <button data-target="#medallas" data-toggle="modal" class="btn btn-link btn-block mt-4">
                            <u>
                                <i class="fas fa-plus-circle"></i>
                                Ver todas las medallas
                            </u>
                        </button>
                    </div>
                    <div class="col-sm-12">
                        <h4 class="text-center mt-5 mb-2">
                            <strong>
                                Insignias
                            </strong>
                        </h4>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <?php if (!isset($insigniaU)) { ?>
                            <strong>
                                Ups aún no consigues tu primera insignia
                            </strong>
                            <hr>
                            <?php  } else {
                            foreach ($insigniaU as $insignia) {  ?>

                                <button class="btn  p-2 m-2" style="display: inline-block">
                                    <img src="<?= base_url('static/recompensas/insignias/' . $insignia->insignia_img) ?>" class="img-fluid d-block mx-auto " style="max-height: 45px; " disabled>
                                </button>
                        <?php  }
                        } ?>
                        <?php foreach ($insignias as $insig) { ?>
                            <button class="btn  p-2 m-2" style="display: inline-block">
                                <img src="<?= base_url('static/recompensas/insignias/' . $insig->insignia_img) ?>" class="img-fluid d-block mx-auto " style="max-height: 45px; opacity:.2 " disabled>
                            </button>
                        <?php } ?>
                        <button class="btn btn-link btn-block mt-4" data-target="#insignia" data-toggle="modal">
                            <u>
                                <i class="fas fa-plus-circle"></i>
                                Ver todas las insignias
                            </u>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <!-- ********** INICIAR PERFIL ********** -->
                <div class="row">
                    <div id="minimo" style="display: none;" name="minimo" class="col-sm-12 mb-5">
                        <div class="alert alert-warning mb-0" role="alert">
                            <p class="text-center mt-3">
                                <i class="fas fa-exclamation-triangle text-danger fa-3x"></i>
                            </p>

                            <h3 class="text-center text-dark">
                                Completa tu perfil a un <strong>70% como mínimo</strong>
                                para poder publicar tus requrimientos y encontrar proveedores
                                queretanos de manera gratuita
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3 class="mb-3">
                            <strong>Perfil completado</strong>
                        </h3>
                    </div>
                    <div class="col-sm-12 mb-5">
                        <div class="progress" id="barra" style="height: 30px !important;">
                            <div id="progreso" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="20" data-value="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>


                <div id="accordion">


                    <!-- SECCION DATOS DEL COMERCIO -->
                    <div class="border">
                        <button id="titl-data-comercio" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h2>
                                Datos del comercio
                            </h2>
                        </button>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="p-4">
                                <?= $_APP_DATOS_NEGOCIO ?>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA SECCION DATOS DEL COMERCIO -->

                    <!-- SECCION DATOS CONTACTO -->
                    <div class="border">
                        <button id="title-data-contacto" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h2>Datos de contacto</h2>
                        </button>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="p-4">
                                <?= $_APP_DATOS_CONTACTO ?>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA SECCION DATOS CONTACTO -->

                    <!-- SECCION AFILIACION -->
                    <div class="border">
                        <button id="title-afil-comercio" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <h2>
                                Mi afiliación CANACO
                            </h2>
                        </button>
                        <div id="collapseFive" class="collapse" data-parent="#accordion">
                            <div class="p-4">

                                <?= $_APP_DATOS_AFILIACION ?>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA SECCION AFILIACION -->

                    <!-- SECCION DATOS CONTACTO -->
                    <div class="border">
                        <button id="title-data-contacto" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseMil" aria-expanded="false" aria-controls="collapseMil">
                            <h3 class="text-danger"> <i class="fas fa-lock"></i> Modificar contraseña</h3>
                        </button>
                        <div id="collapseMil" class="collapse" data-parent="#accordion">
                            <div class="p-4">
                                <?= $_APP_DATOS_PASS ?>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA SECCION DATOS CONTACTO -->


                </div>


            </div>
        </div>

    <?php } ?>
    </div>
</div>


<div id="medallas" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-bookmark"></i>
                    Medallas
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <?= $_APP_MEDALLA ?>
            </div>
        </div>
    </div>
</div>

<div id="insignia" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-bookmark"></i>
                    Insigina
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <?= $_APP_INSIGNIA ?>
            </div>
        </div>
    </div>
</div>