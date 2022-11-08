<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <h1 class="text-left m-0 p-0">
                    <i class="simple-icon-user mr-4"></i>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <script async="false" defer>
                            window.addEventListener('load', (e) => {
                                toastr['<?= $this->session->flashdata('message_type') ?>']('<?= $this->session->flashdata('message') ?>')
                            })
                        </script>
                    <?php endif; ?>
                    <?php foreach ($account_data_n as $account) { ?>

                        <?php echo ucwords($this->session->nombre . ' ' .  $this->session->apellido1 . ' ' . $this->session->apellido2); ?>
                </h1>
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
                        <form id="form-subir-img" action="" class="validate-ptp">
                            <?php if (is_null($account->negocio_logo)) { ?>
                                <img id="negocio_logo" src="<?= base_url('static/uploads/archivos/logo_default.png') ?>" alt="Impactos Digitales" class="img-fluid d-block mx-auto" style="max-height: 254px; ">
                            <?php } else { ?>
                                <img id="negocio_logo" src="<?= base_url('static/uploads/perfil/' . $account->negocio_logo) ?>" alt="Impactos Digitales" class="img-fluid d-block mx-auto" style="max-height: 254px; opacity: .6;">
                            <?php } ?>
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="alert alert-warning">
                                        <h9>
                                            <i class="fas fa-exclamation-triangle"></i>
                                            El logo de la empresa d ser un archivo en formato
                                            <h9 class="text-success"> .gif .jpeg .png o .jpg</h9>.
                                            <br>
                                            Con un peso máximo de <h9 class="text-success"> 512 kb.</h9>
                                        </h9>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="fileImagen" id="fileImagen" class="form-control btn btn-primary required btn-block mt-3">
                            <button class="btn btn-link btn-block mb-4 mt-2" style="font-size: 18px">
                                <i name="btnon" id="btnon" class="fas fa-camera"></i>
                                <u>
                                    Subir logo
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
                            <strong>0</strong>
                        </h1>
                        <br>
                        <h1 class="text-center">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </h1>
                        <br>
                        <button class="btn btn-link btn-block mb-4" data-target="#calificacion" data-toggle="modal">
                            <u>
                                <i class="fas fa-camera"></i>
                                Ver detalle
                            </u>
                        </button>
                        <hr>
                    </div>
                    <div class="col-6 mt-2 mb-4">
                        <h6>
                            <strong class="d-block mb-2 text-primary text-center">
                                Total de transacciones
                            </strong>
                        </h6>
                        <div>
                            <h2 id="counter" name="counter" class="d-block mb-2 text-primary text-center">
                                0
                            </h2>
                        </div>
                    </div>
                    <div class="col-6 mt-2 mb-4">
                        <h6>
                            <strong class="d-block mb-2 text-primary text-center">
                                Transacciones calificadas
                            </strong>
                        </h6>
                        <div>
                            <h2 id="transacciones" name="transacciones" class="d-block mb-2 text-primary text-center">
                                0
                            </h2>
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h6>
                            <strong class="d-block mb-2 text-primary text-center">
                                Índice de cierre
                            </strong>
                        </h6>
                        <div id="indicador-3" data-percent="<?= ($circulo_data) ?>" data-progressBarColor="#3F84E5">
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <h6>
                            <strong class="d-block mb-2 text-primary text-center">
                                Requerimientos urgentes

                            </strong>
                        </h6>
                        <div>
                            <h2 id="requerimientos" name="requerimientos" class="d-block mb-2 text-primary text-center">
                                0
                            </h2>
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
                <!-- **** INICIAR PERFIL **** -->
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="mb-3">
                            <strong>Perfil completado</strong>
                        </h3>
                    </div>
                    <div class="col-sm-12 mb-5">
                        <div class="progress" id="barra" style="height: 30px !important;">
                            <div id="progreso" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" data-value="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div id=" minimo" style="display: none;" name="minimo" class="col-sm-12 mb-5">
                        <div class="alert alert-warning mb-0" role="alert">
                            <p class="text-center mt-3">
                                <i class="fas fa-exclamation-triangle text-danger fa-3x"></i>
                            </p>
                            <h3 class="text-center text-dark">
                                Completa tu perfil a un <strong>70% como mínimo</strong>
                                para poder recibir oportunidades de negocio
                                manera gratuita así como publicar requerimientos y
                                encontrar a los mejores proveedores queretanos.
                            </h3>
                        </div>
                    </div>
                </div>

                <div id="accordion">
                    <!-- SECCION PRODUCTOS Y SERVICIOS -->
                    <div class="border">
                        <button id="title-prod-serv" class="btn btn-link click-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2>Productos y servicios</h2>
                        </button>
                        <div id="collapseOne" class="collapse show " data-parent="#accordion">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-sm-12 text-center mb-3">
                                        <button type="button" class="btn btn-primary default btn-lg addkeyword">
                                            <i class="fas fa-plus"></i>
                                            Agregar actividad económica
                                        </button>
                                    </div>
                                    <div class="col-sm-12">
                                        <h5 class="conuter-head text-muted">Valor para tu perfil 30%</h5>
                                        <br>
                                        <h3>
                                            <strong>
                                                Keywords asignados al comercio
                                            </strong>
                                        </h3>
                                        <small class="text-muted">
                                            Las palabras clave permitirán a otros negocios encontrar tus productos y servicios.
                                        </small>
                                        <br>
                                    </div>
                                    <div class="col-sm-12">
                                        <table class="table table-responsive table-hover table-bordered" id="tbl-show-act-kw">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Actividad
                                                        <br>
                                                        económica
                                                    </th>
                                                    <th colspan>
                                                        Palabras clave
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl-tbody-show-act-kw">
                                                <tr>
                                                    <td colspan="5">
                                                        <p class="pt-3 text-center pb-5" style="width: 400px">
                                                            <i class="fas fa-spinner fa-pulse fa-5x text-muted"></i>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA SECCION PRODUCTOS Y SERVICIOS -->

                    <!-- SECCION DATOS DEL COMERCIO -->
                    <div class="border">
                        <button id="titl-data-comercio" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h2>
                                Datos del comercio
                            </h2>
                        </button>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="p-4">
                                <h5 class="conuter-head text-muted">Valor para tu perfil 15%</h5>
                                <br>
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
                                <h5 class="conuter-head text-muted">Valor para tu perfil 15%</h5>
                                <div class="p-4">
                                    <?= $_APP_DATOS_CONTACTO ?>
                                </div>
                            </div>
                        </div>

                        <!-- TERMINA SECCION DATOS CONTACTO -->





                        <!-- SECCION CV -->

                        <div class="border">
                            <button id="title-cv-comercio" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <h2>
                                    Curriculum del comercio
                                </h2>
                            </button>


                            <div id="collapseSeven" class="collapse" data-parent="#accordion">
                                <div class="p-4">
                                    <?= $_APP_DATOS_DOCSNEGOCIO ?>
                                </div>
                            </div>
                        </div>

                        <!-- TERMINA SECCION CV -->



                        <!-- SECCION DOCS NEGOCIO -->

                        <section id="afildiv">
                            <div class="border">
                                <button id="title-docs-comercio" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <h2>
                                        Documentación del comercio
                                    </h2>
                                </button>
                                <div id="collapseSix" class="collapse" data-parent="#accordion">
                                    <div class="p-4">
                                        <?= $_APP_DATOS_CVNEGOCIO ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- TERMINA SECCION DOCS NEGOCIO -->



                        <!-- SECCION AFILIACION -->
                        <div class="border">
                            <button id="title-afil-comercio" class="btn btn-link collapsed click-title" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h2>
                                    Mi afiliación CANACO
                                </h2>
                            </button>
                            <div id="collapseFive" class="collapse" data-parent="#accordion">
                                <div class="p-4">
                                    <h5 class="conuter-head text-muted">Valor para tu perfil 10%</h5>
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

        <!-- modal medalla inicio -->
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

        <!-- modal medalla fin  -->



        <!-- modal inicio insignia  -->
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

        <!-- modal fin insignia -->

        <!-- modal inicio 70  -->
        <div id="porcieto70" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-bookmark"></i>
                            Felicidades
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- modal fin insignia -->
        <!-- modal inicio calf  -->
        <div id="calificacion" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-bookmark"></i>
                            Las calificaciones puden aumentar siempre que usted cumpla con lo siguiente
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fas fa-times"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- modal fin insignia calf-->