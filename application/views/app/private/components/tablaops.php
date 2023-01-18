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
    if (isset($mis_requerimientos)) { ?>
        <tbody>
            <?php foreach ($mis_requerimientos as $requerimiento) {
                // print_r($requerimiento);


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
                extract($requerimiento);

            ?>
                <tr>
                    <!-- NO -->
                    <td data-title="No.">
                        #<?= $oportunidades_negocio_opneg_id ?>
                    </td>
                    <!-- INFO DE COMERCIO -->
                    <td data-title="Comercio">
                        <div id='<?= $divmagic ?>'>
                        </div>
                        <script>
                            divmagico(<?= $divmagic ?>, <?= $usuario_id ?>)
                        </script>
                    </td>
                    <!-- SOLICITUD Y DETALLES -->
                    <td data-title="Solicitud">
                        <h5 class="p-0 m-0 mb-6"><strong>Comercio que solicita: </strong><?= $negocio_nombre ?></h5>
                        <h5 class="p-0 m-0 mb-6"><strong>Lo que esta buscando: </strong><?= $requerimientos_busq_nec ?></h5>
                        <h5 class="p-0 m-0 mb-6"><strong>Especificaciones tecnicas: </strong><?= $requerimientos_especificaciones ?></h5>
                        <h5 class="p-0 m-0 mb-6"><strong>Cantidad: </strong><?= $requerimientos_qty ?></h5>
                    </td>
                    <!-- ESTATUS ACTUAL DE TABLA ESTATUS_REQ -->
                    <td data-title="Estatus actual">

                        <?php if ($requerimientos_estatus === '17') { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-clock"></i>
                                    <br>
                                    En espera de aplicante
                                    <br>
                                    <?php if (
                                        isset($oportunidades_negocio_cotizacion_opng)
                                    ) {
                                        echo '<hr><h5> Cotizacion subida</h5>';
                                    } ?>
                                </h5>
                            </div>
                        <?php } elseif (
                            $requerimientos_estatus === '18' &&
                            $mi_id ==
                            $requerimientos_usuario_elegido
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    Has sido seleccionado para cumplir con el requerimiento
                                    <?php if (isset($oportunidades_negocio_cotizacion_opng)) {
                                        echo '<hr><h5 align="center"> Cotización subida</h5>';
                                    } ?>
                                </h5>
                            </div>
                        <?php } else if ($requerimientos_estatus == '18' &&  isset($oportunidades_negocio_cotizacion_opng)) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-clock"></i>
                                    <br>
                                    En espera
                                    <?= '<hr> Cotizacion subida' ?>
                                </h5>
                            </div>
                        <?php } elseif ($requerimientos_estatus == '18') { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-clock"></i>
                                    <br>
                                    Aplicado, pendiente de respuesta
                                </h5>
                            </div>
                        <?php } elseif ($requerimientos_estatus == '19') { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-times"></i>
                                    <br>
                                    Requerimiento rechazado
                                </h5>
                            </div>
                        <?php } elseif (
                            $requerimientos_estatus == '20'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    Se ha seleccionado a un candidato
                                </h5>
                            </div>

                        <?php } else if (
                            $requerimientos_estatus == '21' ||
                            $requerimientos_estatus == '22' &&
                            $mi_id == $requerimientos_usuario_elegido

                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    El requerimiento ya ha sido resuelto por ti
                                    <hr>
                                    <?php if (!isset($requerimientos_promedio_calif)) {
                                    ?>
                                        <button class="btn btn-primary default btn-default" onclick="modal_abrir()">
                                            <i class="fas fa-clipboard-list"></i>
                                            Evaluar transacción
                                        </button>
                                    <?php  } else { ?>
                                        <h5 class="text-center"><i class="fas fa-clipboard-list"></i><br>Oportunidad Evaluada, calificacion: <?= $requerimientos_promedio_calif ?> </h5>
                                    <?php } ?>
                                </h5>
                            </div>
                        <?php } elseif (
                            $requerimientos_estatus == '21' ||
                            $requerimientos_estatus == '22'
                        ) { ?>
                            <div id='<?= $estatus_actual ?>'>
                                <h5 class="text-center">
                                    <i class="fas fa-check"></i>
                                    <br>
                                    El requerimiento ya ha sido resuelto
                                </h5>
                            </div>
                        <?php } elseif (
                            $requerimientos_estatus == '23'
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
                                $requerimientos_estatus == '17'
                            ) { ?>
                                <div class="btn-group">
                                    <!-- <?php if (!isset($oportunidades_negocio_cotizacion_opng)) { ?>
                                        <button class="btn btn-dark default btn-default" data-dismiss="modal" onclick='showcoti(<?= $coti ?>)'>
                                            <i class="fas fa-upload"></i>
                                            <br>
                                            Anexar cotizacion
                                        </button>
                                    <?php } ?> -->
                                    <button class="btn btn-dark default btn-default" data-dismiss="modal" onclick='aplicar(<?= $requerimientos_usuario_id ?>,<?= $oportunidades_negocio_opneg_id ?>,<?= $controls ?>,<?= $estatus_actual ?>,"<?= $modal ?>","<?= $modalcancelar ?>",<?= $requerimientos_req_id ?>,"<?= $oportunidades_negocio_cotizacion_opng ?>",<?= $coti ?>, <?= $requerimientos_req_id ?>)'>
                                        <i class="fas fa-check"></i>
                                        <br>
                                        Aplicar
                                    </button>
                                    <button class="btn btn-danger default btn-default" onclick="modalrechazar(<?= $modalr ?>)">
                                        <i class="fas fa-ban"></i>
                                        <br>
                                        No me interesa
                                    </button>
                                    <!-- <button class="btn btn-primary default btn-default" onclick="contactmodal(<?= $modal ?>)">
                                        <i class="fas fa-comment"></i>
                                        <br>
                                        Contactar
                                    </button> -->
                                <?php } else if (
                                $requerimientos_estatus == '18'
                            ) { ?>
                                    <div class="btn-group">
                                        <?php if (!isset($oportunidades_negocio_cotizacion_opng)) { ?>
                                            <button class="btn btn-dark default btn-default" data-dismiss="modal" onclick='showcoti(<?= $coti ?>)'>
                                                <i class="fas fa-upload"></i>
                                                <br>
                                                Anexar cotizacion
                                            </button>
                                        <?php }
                                        // print_r($mis_requerimientos) 
                                        ?>

                                        <button class="btn btn-primary default btn-default" onclick="contactmodal(`<?= $mis_requerimientos[0]['negocio_nombre'] ?>`)">
                                            <i class="fas fa-comment"></i>
                                            <br>
                                            Contactar
                                        </button>
                                        <button onclick="modalcancelar()" class="btn btn-danger default btn-default">
                                            <i class="fas fa-times"></i>
                                            <br>
                                            Rechazar solicitud
                                        </button>
                                    </div>
                                <?php } else if (
                                $requerimientos_estatus == '19' ||
                                $requerimientos_estatus == '20' ||
                                $requerimientos_estatus == '21' ||
                                $requerimientos_estatus == '22' ||
                                $requerimientos_estatus == '23'
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
                            <!-- <form id="form-edit-docs-negocio" action="<?= base_url('app/files/subirCotizacion/' . $oportunidades_negocio_opneg_id) ?>" class="validate-ptp" method="post" enctype="multipart/form-data"> -->


                            <div class="form-row group-cotizacion" style="display: block;">
                                <h6 class="counter-head text-muted">En un documento PDF</h6>
                                <hr>
                                <div class="form-group col-sm-12">
                                    <label for="cotizacion">
                                        <input type="file" name="cotizacion" id="cotizacion" class="form-control required btn btn-info" accept="application/pdf" required>
                                        <input type='hidden' name='id_cliente' id='id_cliente' value='<?= $requerimientos_usuario_id ?>'>
                                        <input type='hidden' name='opneg_id' id='opneg_id' value='<?= $oportunidades_negocio_opneg_id ?>'>
                                        <hr>
                                        <div class="form-group col-sm-12 group-cotizacion" style="display: block;">
                                            <button id="btn-subir-cotizacion" class="btn btn-primary" onclick="handleSubirCotizacion(<?= $oportunidades_negocio_opneg_id ?>)">
                                                <i class="fas fa-save"></i> Guardar
                                            </button>
                                        </div>
                                </div>
                            </div>
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
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick='rechazar(<?= $requerimientos_usuario_id ?>,<?= $oportunidades_negocio_opneg_id ?>,<?= $controls ?>,<?= $estatus_actual ?>,<?= $rechaza ?>)'>Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal -->
                <!-- modal -->
                <div class="modal fade" id="oportunidad_modal_cancelar" tabindex="-1" aria-labelledby="modal_search" aria-hidden="true" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #dc3545;">
                                <h5 class="modal-title text-white font-weight-bold m-0" id="exampleModalLabel">
                                    Rechazar oportunidad de negocio
                                </h5>
                                <button type="button" class="close align-self-center text-white" data-dismiss="modal" aria-label="Close">
                                    <i class='fas fa-times'></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <script>

                                </script>
                                <!-- <div class="card m-12" id="div_modal"> -->
                                <div id="modal-contact" class="col-sm-12 text-center">
                                    <h5>Hola, <?= $mi_comercio[0]->negocio_nombre ?>. <strong>Para poder brindarte una mejor experiencia</strong>, coméntanos el motivo por el cual rechazas esta oportunidad.</h5>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="card m-12" style="margin-bottom:1.75rem">
                                    <textarea id="oportunidad_modal_cancelar_textarea" name="rechaza" class="form-control ps-5" autofocus placeholder="Más información..."></textarea>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-dark mr-3 border-btn" data-dismiss="modal">Volver atrás</button>
                                    <button id="confirmar_rechazar" type="button" class="btn btn-danger border-btn" data-dismiss="modal" onclick='cancelar(<?= $requerimientos_usuario_id ?>,<?= $oportunidades_negocio_opneg_id ?>,<?= $controls ?>,<?= $estatus_actual ?>)'>Confirmar</button>
                                </div>

                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <div class="modal fade" id="oportunidad_modal_contactar" tabindex="-1" aria-labelledby="modal_search" aria-hidden="true" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #343a40;place-items: center;">
                                <h5 class="text-white modal-title font-weight-bold m-0">
                                    Contactar negocio
                                </h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i> </button>
                            </div>
                            <div class="modal-body">
                                <!-- <div id="modal-contact" class="col-sm-12 text-center">
                                        <h5 class="p-0 m-0 mb-6"><strong>Detalles del requerimiento: </strong></h5>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp; -->
                                <!-- <div id="detalles" class="col-sm-12">
                                        <h5 class="p-0 m-0 mb-6"><strong>Comercio que solicita: </strong><?= $negocio_nombre ?></h5>
                                        <h5 class="p-0 m-0 mb-6"><strong>Lo que esta buscando: </strong><?= $requerimientos_busq_nec ?></h5>
                                        <h5 class="p-0 m-0 mb-6"><strong>Especificaciones técnicas: </strong><?= $requerimientos_especificaciones ?></h5>
                                        <h5 class="p-0 m-0 mb-6"><strong>Cantidad: </strong><?= $requerimientos_qty ?></h5>
                                        <?php if (
                                            $requerimientos_entrega == '1'
                                        ) {
                                            $urge = 'Urgente';
                                        } elseif (
                                            $requerimientos_entrega == '2'
                                        ) {
                                            $urge =
                                                'Prioritario';
                                        } elseif (
                                            $requerimientos_entrega == '3'
                                        ) {
                                            $urge =
                                                'Estandares de mercado';
                                        } ?>
                                        <h5 class="p-0 m-0 mb-6"><b>Entrega: </b> <?= $urge ?></h5>
                                    </div> -->
                                <div id="div_modal" style="padding-bottom:1.75rem">
                                    <h5 id="modal_contactar_titulo"> </h5>
                                </div>
                                <div id="div_modal">
                                    <!-- <textarea id="<?= $mensaje ?>" class="form-control ps-5"></textarea> -->
                                    <textarea id="oportunidad_modal_contactar_textarea" name="msm" class="form-control ps-5" autofocus placeholder="Más información..."></textarea>
                                </div>
                                &nbsp;
                                <div id="modal-contact" class="col-sm-12 text-center">
                                    <!-- <button class='btn btn-primary default btn-default'> <i class="fas fa-phone fa-fw"></i>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        Contactar via Whatsapp</button> -->
                                    <button type="button" class="btn btn-info whatsapp" onclick='send_whats("<?= $negocio_vent_whatsp ?>","<?= $oportunidades_negocio_opneg_id ?>","<?= $requerimientos_busq_nec ?>","<?= $negocio_vent_nombre ?>")'>Enviar mensaje
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24px" height="24px" fill-rule="evenodd" clip-rule="evenodd">
                                            <path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z" />
                                            <path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z" />
                                            <path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z" />
                                            <path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z" />
                                            <path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div>

                                </div>
                                &nbsp;
                                <!-- <div id="modal-contact" class="col-sm-12 text-center">
                                        <button class='btn btn-warning default btn-default' onclick='send_email("<?= $negocio_vent_correo ?>","<?= $mensaje ?>", "<?= $opneg_id ?>")'> <i class="fas fa-envelope-open fa-fw"></i>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            Contactar via Email</button>
                                    </div>
                                    &nbsp; -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL EXAMEN -->
                <div class="modal fade" id="modal_examen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="height: 100%;margin: auto;display: flex;">
                        <div class="modal-content modal_examen_content">
                            <div class="modal-header modal_examen_header" style="background-color: #343a40;">
                                <h1 class="modal-title text-white m-0 p-0 font-weight-bold" id="exampleModalLabel" style="margin-left:1.75rem !important">¿Cómo fue tu experiencia? Cuéntanos</h1>
                                <button type="button" class="close text-light align-self-center" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mt-0 mb-0 scrollbar" style="overflow: auto; margin:0 1.75rem !important">
                                <div id="afiliacionWizard">
                                    <div id="step-0" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                        <form id="form-step-0" class="tooltip-label-right" novalidate>
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col" style="margin-top:1.75rem">
                                                        <div>
                                                            <label class="form-label d-block">
                                                                <h2 class="pregunta_examen">1 - ¿El pago se realizó en los términos acordados en la cotización y con los montos completos?
                                                                </h2>
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <div class="form-check mb-0">
                                                                <label class="form-check-label respuestas_examen">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaAa()" type="radio" name="aa" id="a1" value="5">
                                                                    Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mb-0">
                                                                <label class="form-check-label respuestas_examen">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaAa()" type="radio" value="2.5" name="aa" id="a2">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div id="step-1" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                        <form id="form-step-1" class="tooltip-label-right" novalidate>
                                            <div class="content">
                                                <div class="row" style="margin-top:1.75rem">
                                                    <div class="col">
                                                        <div>
                                                            <label class="form-label d-block">
                                                                <h2 class="pregunta_examen">
                                                                    2 - El pago fue...
                                                                </h2>
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <form>
                                                                <div class="mb-0">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input canaco_input" onclick="validarencuestaBb()" type="radio" value="5" name="bb" id="b1">
                                                                        <label class="form-check-label respuestas_examen" for="q2">
                                                                            Contado
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check mb-0">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaBb()" type="radio" value="4" name="bb" id="b2">
                                                                    <label class="form-check-label respuestas_examen" for="q2">
                                                                        Diferido/Crédito
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-0">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaBb()" type="radio" value="3" name="bb" id="b3">
                                                                    <label class="form-check-label" for="q2">
                                                                        Atrasado
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-0">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaBb()" type="radio" value="2" name="bb" id="b4">
                                                                    <label class="form-check-label respuestas_examen" for="q2">
                                                                        No pagó
                                                                    </label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="step-2" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                        <form id="form-step-2" class="tooltip-label-right" novalidate>
                                            <div class="content">
                                                <div class="row" style="margin-top:1.75rem">
                                                    <div class="col">
                                                        <div>
                                                            <label class="form-label d-block">
                                                                <h2 class="pregunta_examen">
                                                                    3 - Al momento del cierre de la transacción comercial (cierre de venta) esta fue...
                                                                </h2>
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <form>
                                                                <div class="form-check">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaCc()" type="radio" value="5" name="cc" id="c1">
                                                                    <label class="form-check-label respuestas_examen" for="q3">
                                                                        Inmediato
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaCc()" type="radio" value="4" name="cc" id="c2">
                                                                    <label class="form-check-label respuestas_examen" for="q3">
                                                                        En menos de 45 dias
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaCc()" type="radio" value="3" name="cc" id="c3">
                                                                    <label class="form-check-label respuestas_examen" for="q3">
                                                                        Entre 46 y 90 dias
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-0">
                                                                    <input class="form-check-input canaco_input" onclick="validarencuestaCc()" type="radio" value="2" name="cc" id="c4">
                                                                    <label class="form-check-label respuestas_examen" for="q3">
                                                                        Mayor a 3 meses
                                                                    </label>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    <div id="step-3" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                        <form id="form-step-3" class="tooltip-label-right" novalidate>
                                            <div class="content">
                                                <div class="row" style="padding:1.75rem 0">
                                                    <div class="col">
                                                        <div>
                                                            <label class="form-label d-block">
                                                                <h2 class="pregunta_examen">
                                                                    4 - ¿Recomendarías a la empresa compradora?
                                                                </h2>
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <form>
                                                                    <div class="form-check mb-0">
                                                                        <input class="form-check-input canaco_input" onclick="validarencuestaDd()" type="radio" value="5" name="dd" id="d4">
                                                                        <label class="form-check-label" for="q4">
                                                                            Una empresa confiable y 100% recomendable.
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mb-0">
                                                                        <input class="form-check-input canaco_input" onclick="validarencuestaDd()" type="radio" value="4" name="dd" id="d3">
                                                                        <label class="form-check-label respuestas_examen" for="q4">
                                                                            Si mejorará sus productos y servicios
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check mb-0">
                                                                        <input class="form-check-input canaco_input" onclick="validarencuestaDd()" type="radio" value="3" name="dd" id="d2">
                                                                        <label class="form-check-label respuestas_examen" for="q4">
                                                                            Si modificará sus políticas de pago
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mb-0">
                                                                        <input class="form-check-input canaco_input" onclick="validarencuestaDd()" type="radio" value="2" name="dd" id="d1">
                                                                        <label class="form-check-label respuestas_examen" for="q4">
                                                                            No
                                                                        </label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    <div id="step-4" class="tab-pane" role="tabpanel" style="height: auto !important;">
                                        <form id="form-step-4" class="tooltip-label-right" novalidate>
                                            <div class="content">
                                                <div class="row" style="padding-bottom:1.75rem">
                                                    <div class="col">
                                                        <div>
                                                            <label class="form-label d-block">
                                                                <h2 class="pregunta_examen">
                                                                    5 - Deja un comentario
                                                                </h2>
                                                            </label>
                                                        </div>
                                                        <div style="display: flex;justify-content: space-between;">
                                                            <textarea id="ff1" name="ff1" TextMode="MultiLine" rows="3" cols="50" class="canaco_input"></textarea>
                                                            <div class="align-self-center">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="validarencuesta2('<?= $requerimientos_req_id ?>','<?= $oportunidades_negocio_opneg_id ?>')">Aceptar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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