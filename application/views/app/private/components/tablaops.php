<table id="controls-data-tables-pagination" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
    <thead class="thead-dark">
        <tr>
            <th scope="col">
                No.
            </th>
            <th scope="col">
                Comercio
            </th>
            <th scope="col">
                Solicitud
            </th>
            <th scope="col">
                Estatus actual
            </th>
            <th scope="col">
                Acciones
            </th>
        </tr>
    </thead>
    <input type='hidden' value='<?= json_encode($mis_requerimientos) ?>' id='info'>
    <?php
    $i = 0;
    if (isset($mis_requerimientos)) {
    ?>
        <tbody>
            <?php foreach ($mis_requerimientos as $requerimiento) {
                $estatus_actual = 'estatus_actual' . $i;
                $controls = 'controls' . $i;
                $modal = 'mc' . $i;
                $modalcancelar = 'mcc' . $i;
                $modalr = 'mcr' . $i;
                $whats = 'whats' . $i;
                $cancela = 'cancelar' . $i;
                $mensaje = 'mensaje' . $i;
                $rechaza = 'rechaza' . $i;
                $modalacepta = 'acepta' . $i;
                $modalCotizacion = 'coti' . $i;
                $modalbi = 'modibi' . $i;
                $coti = 'cotizat' . $i;
                $divmagic = 'magic' . $i;
                $detalles = 'detalles' . $i;
                $examen = 'examen' . $i;
                $requerimiento = (array) $requerimiento;
                extract($requerimiento);

                if (isset($estatus)) {
                    $status = $estatus;
                } else {
                    $status = '17';
                } ?>
                <?php $oportunidad =
                    $opnegocio_id; ?>
                <tr>
                    <td data-title="No.">
                        #<?= $opnegocio_id ?>
                    </td>
                    <td data-title="Comercio">
                        <div id='<?= $divmagic ?>'>
                        </div>
                        <img src onerror='divmagico(<?= $divmagic ?>,<?= $usuario_id ?>)'>
                    </td>
                    <td data-title="Solicitud">
                        <h5 class="p-0 m-0 mb-6"><strong>Comercio que solicita: </strong><?= $negocio_nombre ?></h5>
                        <h5 class="p-0 m-0 mb-6"><strong>Lo que esta buscando: </strong><?= $busq_nec ?></h5>
                        <h5 class="p-0 m-0 mb-6"><strong>Especificaciones tecnicas: </strong><?= $especificaciones ?></h5>
                        <h5 class="p-0 m-0 mb-6"><strong>Cantidad: </strong><?= $qty ?></h5>
                    </td>
                    <td data-title="Estatus actual">
                        <?php if (
                            $status == '17'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-clock"></i>
                                    <br>
                                    En espera de aplicante
                                    <br>
                                    <?php if (
                                        isset(
                                            $cotizacion_opng
                                        )
                                    ) {
                                        echo '<hr><h5> Cotizacion subida</h5>';
                                    } ?>


                                </h5>
                            </div>
                        <?php } elseif (
                            $status == '18' &&
                            $mi_id ==
                            $usuario_elegido
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    Haz sido seleccionado para cumplir con el requerimiento
                                    <?php if (
                                        isset(
                                            $cotizacion_opng
                                        )
                                    ) {
                                        echo '<hr><h5 align="center"> Cotizacion subida</h5>';
                                    } ?>
                                </h5>
                            </div>
                        <?php } else if (
                            $status == '18' &&  isset(
                                $cotizacion_opng
                            )
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-clock"></i>
                                    <br>
                                    Aplicado, pendiente de respuesta

                                    <?= '<hr> Cotizacion subida' ?>
                                </h5>
                            </div>
                        <?php } elseif (
                            $status == '18'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-clock"></i>
                                    <br>
                                    Aplicado, pendiente de respuesta
                                </h5>
                            </div>
                        <?php } elseif (
                            $status == '19'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-times"></i>
                                    <br>
                                    Requerimiento rechazado
                                </h5>
                            </div>
                        <?php } elseif (
                            $status == '20'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    Se ha seleccionado a un candidato
                                </h5>
                            </div>

                        <?php } else if (
                            $status == '21' ||
                            $status == '22' &&
                            $mi_id == $usuario_elegido

                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    El requerimiento ya ha sido resuelto por ti
                                    <hr>
                                    <?php if (!isset($promedio_calif)) {
                                    ?>
                                        <button class="btn btn-primary default btn-default" onclick="modalbi(<?= $examen ?>)">
                                            <i class="fas fa-clipboard-list"></i>
                                            Califica
                                        </button>
                                    <?php  } else { ?>
                                        <h5 class="text-center"><i class="fas fa-clipboard-list"></i><br>Oportunidad Evaluada, calificacion: <?= $promedio_calif ?> </h5>
                                    <?php } ?>
                                </h5>
                            </div>
                        <?php } elseif (
                            $status == '21' ||
                            $status == '22'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    El requerimiento ya ha sido resuelto
                                </h5>
                            </div>
                        <?php } elseif (
                            $status == '23'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-exclamation"></i>
                                    <br>
                                    El requerimiento ya no está disponible
                                </h5>
                            </div>
                        <?php } ?>
                    </td>
                    <td data-title="Acciones">
                        <div id="<?= $controls ?>">
                            <?php if (
                                $status == '17'
                            ) { ?>
                                <div class="btn-group">
                                    <?php if (!isset($cotizacion_opng)) { ?>
                                        <button class="btn btn-dark default btn-default" data-dismiss="modal" onclick='showcoti(<?= $coti ?>)'>
                                            <i class="fas fa-upload"></i>
                                            <br>
                                            Anexar cotizacion
                                        </button>
                                    <?php } ?>
                                    <button class="btn btn-dark default btn-default" data-dismiss="modal" onclick='aplicar(<?= $usuario_id ?>,<?= $opnegocio_id ?>,<?= $controls ?>,<?= $estatus_actual ?>,<?= $modal ?>,<?= $modalcancelar ?>,<?= $req_id ?>,"<?= $cotizacion_opng ?>",<?= $coti ?>)'>
                                        <i class="fas fa-check"></i>
                                        <br>
                                        Aplicar
                                    </button>
                                    <button class="btn btn-danger default btn-default" onclick="modalrechazar(<?= $modalr ?>)">
                                        <i class="fas fa-ban"></i>
                                        <br>
                                        No me interesa
                                    </button>
                                    <button class="btn btn-primary default btn-default" onclick="contactmodal(<?= $modal ?>)">
                                        <i class="fas fa-comment"></i>
                                        <br>
                                        Contactar
                                    </button>
                                <?php } else if (
                                $status == '18'
                            ) { ?>
                                    <div class="btn-group">
                                        <?php if (!isset($cotizacion_opng)) { ?>
                                            <button class="btn btn-dark default btn-default" data-dismiss="modal" onclick='showcoti(<?= $coti ?>)'>
                                                <i class="fas fa-upload"></i>
                                                <br>
                                                Anexar cotizacion
                                            </button>
                                        <?php } ?>
                                        <button class="btn btn-primary default btn-default" onclick="contactmodal(<?= $modal ?>)">
                                            <i class="fas fa-comment"></i>
                                            <br>
                                            Contactar
                                        </button>
                                        <button onclick="modalcancelar(<?= $modalcancelar ?>)" class="btn btn-danger default btn-default">
                                            <i class="fas fa-times"></i>
                                            <br>
                                            Cancelar solicitud
                                        </button>
                                    </div>
                                <?php } else if (
                                $status == '19' ||
                                $status == '20' ||
                                $status == '21' ||
                                $status == '22' ||
                                $status == '23'
                            ) { ?>
                                    <div class="btn-group">
                                        <h5 class="text-center">
                                            <i class="fas fa-exclamation"></i>
                                            <br>
                                            El requerimiento ya no está disponible
                                        </h5>
                                    </div>
                                <?php } ?>
                                </div>
                                <hr>
                        </div> <!-- Controles-->
                        <div id='<?= $coti ?>' style='display: none'>
                            <form id="form-edit-docs-negocio" action="<?= base_url('app/files/subirCotizacion/' . $oportunidad) ?>" class="validate-ptp" method="post" enctype="multipart/form-data">
                                <br>
                                <br>
                                <div class="form-row group-cotizacion" style="display: block;">
                                    <h6 class="counter-head text-muted">En un documento PDF</h6>
                                    <hr>
                                    <div class="form-group col-sm-12">
                                        <label for="cotizacion">
                                            <input type="file" name="cotizacion" id="cotizacion" class="form-control required btn btn-info" accept="application/pdf" required>
                                            <input type='hidden' name='id_cliente' id='id_cliente' value='<?= $usuario_id ?>'>
                                            <input type='hidden' name='opnegocio_id' id='opnegocio_id' value='<?= $opnegocio_id ?>'>
                                            <hr>
                                            <div class="form-group col-sm-12 group-cotizacion" style="display: block;">
                                                <button id="btn-sbmt-create-docs" type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Guardar
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td> <!-- acciones-->
                </tr>
                <!-- modal -->
                <div class="modal fade" id="<?= $modalr ?>" tabindex="-1" aria-labelledby="modal_search" aria-hidden="true" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #dc3545;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Rechazar requerimiento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card m-12" id="div_modal">
                                    <div id="modal-contact" class="col-sm-12 text-center">
                                        <h5>Por favor, dinos por que motivo rechazaste el requerimiento</h5>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="card m-12">
                                        <textarea id="<?= $rechaza ?>" name="rechaza" class="form-control ps-5"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick='rechazar(<?= $usuario_id ?>,<?= $opnegocio_id ?>,<?= $controls ?>,<?= $estatus_actual ?>,<?= $rechaza ?>)'>Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal -->
                <!-- modal -->
                <div class="modal fade" id="<?= $modalcancelar ?>" tabindex="-1" aria-labelledby="modal_search" aria-hidden="true" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #dc3545;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Cancelar Requerimiento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card m-12" id="div_modal">
                                    <div id="modal-contact" class="col-sm-12 text-center">
                                        <h5>Por favor, dinos por que motivo cancelaste el requerimiento</h5>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="card m-12">
                                        <textarea id="<?= $cancela ?>" name="rechaza" class="form-control ps-5"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick='cancelar(<?= $usuario_id ?>,<?= $opnegocio_id ?>,<?= $controls ?>,<?= $estatus_actual ?>, <?= $cancela ?>)'>Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal -->
                <!-- modal -->
                <div class="modal fade" id="<?= $modal ?>" tabindex="-1" aria-labelledby="modal_search" aria-hidden="true" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #343a40;">
                                <h5 class="modal-title" id="exampleModalLabel"><span id="titulo1" class="text-white">Contacta con el negocio</span></h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <p class="text-white"> X</p>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card m-12" id="div_modal">
                                    <div id="modal-contact" class="col-sm-12 text-center">
                                        <h5 class="p-0 m-0 mb-6"><strong>Detalles del requerimiento: </strong></h5>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div id="detalles" class="col-sm-12">
                                        <h5 class="p-0 m-0 mb-6"><strong>Comercio que solicita: </strong><?= $negocio_nombre ?></h5>
                                        <h5 class="p-0 m-0 mb-6"><strong>Lo que esta buscando: </strong><?= $busq_nec ?></h5>
                                        <h5 class="p-0 m-0 mb-6"><strong>Especificaciones técnicas: </strong><?= $especificaciones ?></h5>
                                        <h5 class="p-0 m-0 mb-6"><strong>Cantidad: </strong><?= $qty ?></h5>
                                        <?php if (
                                            $entrega == '1'
                                        ) {
                                            $urge = 'Urgente';
                                        } elseif (
                                            $entrega == '2'
                                        ) {
                                            $urge =
                                                'Prioritario';
                                        } elseif (
                                            $entrega == '3'
                                        ) {
                                            $urge =
                                                'Estandares de mercado';
                                        } ?>
                                        <h5 class="p-0 m-0 mb-6"><b>Entrega: </b> <?= $urge ?></h5>
                                    </div>
                                    &nbsp;
                                    <div class="card m-12" id="div_modal">
                                        <h5>Escribe un mensaje para el comercio</h5>
                                    </div>
                                    <div class="card m-12" id="div_modal">
                                        <textarea id="<?= $mensaje ?>" name="msm" class="form-control ps-5"></textarea>
                                    </div>
                                    &nbsp;
                                    <div id="modal-contact" class="col-sm-12 text-center">
                                        <button class='btn btn-primary default btn-default' onclick='send_whats("<?= $negocio_vent_whatsp ?>","<?= $mensaje ?>", "<?= $opnegocio_id ?>","<?= $busq_nec ?>","<?= $negocio_vent_nombre ?>")'> <i class="fas fa-phone fa-fw"></i>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            Contactar via Whatsapp</button>

                                    </div>
                                    &nbsp;
                                    <div id="modal-contact" class="col-sm-12 text-center">
                                        <button class='btn btn-warning default btn-default' onclick='send_email("<?= $negocio_vent_correo ?>","<?= $mensaje ?>", "<?= $opnegocio_id ?>")'> <i class="fas fa-envelope-open fa-fw"></i>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            Contactar via Email</button>
                                    </div>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal -->
                <!-- Modal -->
                <div class="modal fade" id="<?= $examen ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #343a40;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Por favor evalua tu experiencia en la plataforma</h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="afiliacionWizard">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="step-0" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                                <form id="form-step-0" class="tooltip-label-right my-5" novalidate>
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div>
                                                                    <label class="form-label d-block">
                                                                        <b>¿El pago se realizó en los términos acordados en la cotización y con los montos completos?</b>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <div class="mb-0">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input" onclick="validarencuestaAa()" type="radio" name="aa" id="a1" value="5">
                                                                                Si
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-0">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input" onclick="validarencuestaAa()" type="radio" value="2.5" name="aa" id="a2">
                                                                                No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-1" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                                <form id="form-step-1" class="tooltip-label-right my-5" novalidate>
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div>
                                                                    <label class="form-label d-block">
                                                                        <b>El pago fue...</b>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <form>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaBb()" type="radio" value="5" name="bb" id="b1">
                                                                                <label class="form-check-label" for="q2">
                                                                                    Contado
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaBb()" type="radio" value="4" name="bb" id="b2">
                                                                                <label class="form-check-label" for="q2">
                                                                                    Diferido/Crédito
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaBb()" type="radio" value="3" name="bb" id="b3">
                                                                                <label class="form-check-label" for="q2">
                                                                                    Atrasado
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaBb()" type="radio" value="2" name="bb" id="b4">
                                                                                <label class="form-check-label" for="q2">
                                                                                    No pagó
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-2" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                                <form id="form-step-2" class="tooltip-label-right my-5" novalidate>
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div>
                                                                    <label class="form-label d-block">
                                                                        <b> Del momento del primero contacto a la transacción comercial (cierre de venta) fue:</b>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <form>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaCc()" type="radio" value="5" name="cc" id="c1">
                                                                                <label class="form-check-label" for="q3">
                                                                                    Inmediato
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaCc()" type="radio" value="4" name="cc" id="c2">
                                                                                <label class="form-check-label" for="q3">
                                                                                    En menos de 45 dias
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaCc()" type="radio" value="3" name="cc" id="c3">
                                                                                <label class="form-check-label" for="q3">
                                                                                    Entre 46 y 90 dias
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" onclick="validarencuestaCc()" type="radio" value="2" name="cc" id="c4">
                                                                                <label class="form-check-label" for="q3">
                                                                                    Mayor a 3 meses
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-0">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="step-3" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                                <form id="form-step-3" class="tooltip-label-right my-5" novalidate>
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div>
                                                                    <label class="form-label d-block">
                                                                        <b> Recomendarías a la empresa compradora:</b>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <form>
                                                                            <div class="mb-0">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" onclick="validarencuestaDd()" type="radio" value="5" name="dd" id="d4">
                                                                                    <label class="form-check-label" for="q4">
                                                                                        Una empresa confiable y 100% recomendable.
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-0">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" onclick="validarencuestaDd()" type="radio" value="4" name="dd" id="d3">
                                                                                    <label class="form-check-label" for="q4">
                                                                                        Si mejorará sus productos y servicios
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-0">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" onclick="validarencuestaDd()" type="radio" value="3" name="dd" id="d2">
                                                                                    <label class="form-check-label" for="q4">
                                                                                        Si modificará sus políticas de pago
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-0">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" onclick="validarencuestaDd()" type="radio" value="2" name="dd" id="d1">
                                                                                    <label class="form-check-label" for="q4">
                                                                                        No
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                            <div id="step-4" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                                <form id="form-step-4" class="tooltip-label-right my-5" novalidate>
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div>
                                                                    <label class="form-label d-block">
                                                                        <b>Deja un comentario</b>
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <textarea name="ff1" id="ff1" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validarencuesta2('<?= $req_id ?>','<?= $opnegocio_id ?>')">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- fin modal -->
        <?php $i++;
            }
        }
        ?>
        </tbody>
</table>