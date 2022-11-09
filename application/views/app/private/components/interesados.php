<?php
if (isset($interesados)) { ?>
    <?php
    $i = 0;
    foreach ($interesados as $row) {
        $contacto = 'contacto' . $i;
        $mensaje = 'mensaje' . $i;
    ?>
        <div>
            <div class="card m-3" align='center'>
                <a class="" href="#">
                    <?php if ($row->negocio_logo != null) { ?>
                        <img src="<?= base_url() . 'static/uploads/perfil/' . $row->negocio_logo ?>" alt="<?php echo ($row->negocio_nombre); ?>" class="img-thumbnail responsive border-0" align='center' style="max-height: 100px !important;" />
                    <?php } else { ?>
                        <img src="<?= base_url() . 'static/uploads/perfil/logo_default.png' ?>" alt=<?php echo ($row->negocio_nombre); ?> class="img-thumbnail responsive border-0" align='center' style="max-height: 100px !important;" />
                    <? } ?>
                </a>
                <div>
                    <div class="">
                        <div align='center'>
                            <?php echo ($row->negocio_nombre); ?><br>
                            <small class="text-muted">
                                <?php echo ($row->negocio_razon); ?>
                                <br>
                                <strong>Calificacion promedio: <?= $row->negocio_calif ?></strong>
                                <br>
                                <?php
                                $e = intdiv($row->negocio_calif, 1);
                                $r = fmod($row->negocio_calif, 1);
                                for ($i = 1; $i <= $e; $i++) {

                                ?>
                                    <i class="fas fa-star"></i>
                                <?php
                                }
                                if (($r) > 0) {
                                    echo '<i class="fas fa-star-half"></i>';
                                }
                                ?>
                                <br>

                            </small>
                            <hr>
                            <div>
                                <?php if (isset($row->mensaje_whats)) {
                                    echo ('<strong>Ultimo mensaje de whatsapp:</strong> ' . $row->mensaje_whats);
                                }  ?>
                                <hr>
                                <?php if (isset($row->mensaje_correo)) {
                                    echo ('<strong>Ultimo mensaje por correo: </strong>' . $row->mensaje_correo);
                                }  ?>
                            </div>
                            <hr>
                            <button role="link" onclick="window.open('<?= base_url() ?>/app/perfil/perfil_publico/<?= $row->miid ?>')" class="btn btn-link m-0 p-0">
                                <strong>
                                    <i class="fas fa-plus"></i>
                                    Ver perfil
                                </strong>
                            </button>
                            &nbsp;
                            &nbsp;
                            <button onclick="contacto(<?= $contacto ?>)" class="btn btn-link m-0 p-0">
                                <strong>
                                    <i class="fas fa-phone"></i>
                                    Contactar
                                </strong>
                            </button>
                            &nbsp;
                            &nbsp;
                            <? if ($row->cotizacion_opng) { ?>
                                <a href="<?= base_url() ?>static/uploads/cotizaciones/<?= $row->cotizacion_opng ?>" target="_blank">
                                    <button class="btn btn-link m-0 p-0">
                                        <strong>
                                            <i class="fas fa-file-upload"></i>
                                            Ver cotización
                                        </strong>
                                    </button>
                                </a>
                            <?php } ?>
                            <div style="display:grid; place-items:center;">
                                <?php if ($row->seleccionado >= 1) { ?>
                                    <div id='seleccionar' style='display: none' align='center'>
                                        <button onclick="seleccionar(<?= $row->miid ?>,<?= $req_id ?>,<?= $row->opneg_id ?>)" class="btn btn-link m-0 p-0">
                                            <strong>
                                                <i class="fas fa-check"></i>
                                                Seleccionar comercio
                                            </strong>
                                        </button>
                                    </div>
                                    <!-- &nbsp; -->
                                    <div id='deseleccionar' style='display: block' align='center'>
                                        <button onclick="deseleccionar(<?= $row->miid ?>,<?= $req_id ?>,<?= $row->opneg_id ?>)" class="btn btn-link m-0 p-0">
                                            <strong>
                                                <i class="fas fa-check"></i>
                                                Deseleccionar comercio
                                            </strong>
                                        </button>
                                    </div>
                                <?php } else if ($row->seleccionado == 0) { ?>
                                    <div id='seleccionar' style='display: block' align='center'>
                                        <button onclick="seleccionar(<?= $row->miid ?>,<?= $req_id ?>,<?= $row->opneg_id ?>)" class="btn btn-link m-0 p-0">
                                            <strong>
                                                <i class="fas fa-check"></i>
                                                Seleccionar comercio
                                            </strong>
                                        </button>
                                    </div>
                                    <!-- &nbsp; -->
                                    <div id='deseleccionar' style='display: none' align='center'>
                                        <button onclick="deseleccionar(<?= $row->miid ?>,<?= $req_id ?>,<?= $row->opneg_id ?>)" class="btn btn-link m-0 p-0">
                                            <strong>
                                                <i class="fas fa-check"></i>
                                                Deseleccionar comercio
                                            </strong>
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id='<?= $contacto ?>' style="display:none">
                                <hr>
                                <h5>Escribe un mensaje</h5>
                                <hr><textarea id="<?= $mensaje ?>" name="msm" class="form-control ps-5"></textarea>
                                <hr>
                                <button role="link" onclick="tm('<?= $row->email_auth ?>',<?= $mensaje ?>,'<?= $row->opnegocio_id ?>')" class="btn btn-link m-0 p-0">
                                    <strong><i class="fas fa-envelope"></i> Email</strong></button>&nbsp;&nbsp;
                                <button role="link" onclick="contactwhats(<?= $row->negocio_vent_whatsp ?>,<?= $mensaje ?>,<?= $row->opnegocio_id ?>,'<?= $row->especificaciones ?>')" class="btn btn-link m-0 p-0">
                                    <strong><i class="fas fa-phone"></i> Whatsapp </strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++;
    } ?>
<?php   } else { ?>
    <div class="container" align='center'>
        <div class="card m-3" align='center'>

            <img src="<?= base_url('static/admin/img/no_encontrado.png') ?>" class="img-fluid" style="height:500px; widht: 400px  ">
        </div>
    </div>
<?php } ?>