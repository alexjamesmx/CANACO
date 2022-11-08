<?php
$arr_afiliados = array();
$arr_noafiliados = array();
$arr_tipo_actividad = array(
    '1' => 'Productos',
    '2' => 'Servicios',
    '3' => 'Productos y servicios'
);
if (isset($match_usuarios)) {
    foreach ($match_usuarios as $row) {
        if ($row['afiliado_canaco'] === "1") {
            array_push($arr_afiliados, $row);
        } else if ($row['afiliado_canaco'] === "0") {
            array_push($arr_noafiliados, $row);
        }
    }
    if ($arr_afiliados) {
        $i = 0;
        $tmp = 0; ?>
        <div class="d-flex " style="width:fit-content">
            <h1 class='m-0 p-0 mr-5'>Afiliados - CANACO</h1>
            <button type='button' class="btn btn-primary btn-sm btn-select-all-ckbx ">
                <strong>
                    <u>
                        <i class="fas fa-check-double"></i>
                        <span id="boton_seleccionar_todos">Seleccionar todos</span>

                    </u>
                </strong>
            </button>
        </div>
        <!-- <div class="collapse multi-collapse show"> -->
        <?php foreach ($arr_afiliados as $row) :
            if ($i % 4 == 0) {
                $tmp = $tmp + 4; ?>
                <!-- ROW -->
                <div class="row" style="width:inherit;min-height:fit-content">
                <?php }  ?>
                <!-- COLUMN -->
                <div class="col col-lg-3" style='padding: 0;margin: 0;'>
                    <!-- CARD BODY -->
                    <div id="requerimiento_<?= $row['comercio_id'] ?>" class="card m-3 requerimientos-card" style='background-color:#F7F7F7;height:inherit; box-shadow: 1px 1px 5px #aeaeae;position:relative;cursor:pointer' data-user="<?= $row['comercio_id'] ?>" data-afiliado="<?= $row['afiliado_canaco'] ?>" onclick="requerimientos_select(this)">
                        <!-- DIV DORADO -->
                        <div style="width: 50%;height: 30%;background: linear-gradient(90deg, rgba(255,170,37,1) 0%, rgba(255,195,19,1) 100%);position: absolute;z-index: 9"></div>
                        <!-- DIV BLANCO -->
                        <div style="width: 100%;height: 60%;background:#F7F7F7;position: absolute;z-index: 10;border-radius: 100%; left:0;" id="requerimiento_background_<?= $row['comercio_id'] ?>"></div>
                        <!-- CONTENIDO -->
                        <div id='requerimiento_contenido_<?= $row['comercio_id'] ?>' style="display: grid;grid-template-columns: repeat(2, 1fr);grid-template-rows: 0.3fr 1fr 0.1fr;position: relative;z-index: 12; gap: 2%;height: 50vh;">
                            <!-- ROW 1 COLUMNA 1 -->
                            <div class="d-flex">
                                <!-- INSIGNIA Y PALOMA -->
                                <div style="position:absolute;left:-1em;top: -0.5em;z-index:13">
                                    <span class="badge badge-pill badge-primary"> <img class='checkservice_tick' id='requerimiento_badge_<?= $row['comercio_id'] ?>' src="https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png" width="15px" height:"15px">
                                    </span>
                                    <div class="float-right">
                                        <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                            <input id="requerimiento_input_<?= $row['comercio_id'] ?>" type="checkbox" class="custom-control-input checkservice_afiliados" data-user="<?= $row['comercio_id'] ?>" data-afiliado="<?= $row['afiliado_canaco'] ?>">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </div>
                                </div>
                                <!-- FAVORITOS  -->
                                <div style="position: relative;left: 0;right: 0;top: 0;bottom: 0;margin: auto;text-align:center">
                                    <span style="font-size:1.5rem">
                                        <i class="fas fa-star"></i>
                                        <strong><?= $row['negocio_calif'] ?></strong>
                                    </span>
                                    <br>
                                    <?= $arr_tipo_actividad[$row['tipo_transaccion']] ?>
                                </div>
                            </div>
                            <!-- ROW 1 COLUMNA 2 -->
                            <div style="justify-self: center;position:relative">
                                <!-- ICONO OJO OCULTO -->
                                <span id="profile_eye_<?= $row['usuario_id'] ?>" style="opacity:0" class='profile-img-eye'></span>
                                <!-- IMAGEN PERFIL -->
                                <?php if ($row['negocio_logo'] != null) { ?>
                                    <img id='requerimiento_imagen_<?= $row['comercio_id'] ?>' data-user="<?= $row['usuario_id'] ?>" data-negocio="<?= $row['comercio_id'] ?>" src="<?= base_url() . 'static/uploads/perfil/' . $row['negocio_logo'] ?>" alt="<?php echo ($row['negocio_nombre']); ?>" class="perfil-img2" style="height: 200px;object-fit: FILL;max-width: 100%;padding:5%" onclick="requerimiento_imagen(this)" onmouseover="profileHover(<?= $row['usuario_id'] ?>,<?= $row['comercio_id'] ?>)" onmouseout="return profileHoverHide(<?= $row['usuario_id'] ?>)" />
                                <?php } else { ?>
                                    <img id='requerimiento_imagen_<?= $row['comercio_id'] ?>' data-user="<?= $row['usuario_id'] ?>" data-negocio="<?= $row['comercio_id'] ?>" src="<?= base_url() . 'static/uploads/perfil/logo_default.png' ?>" alt="<?php echo ($row['negocio_nombre']); ?>" class="img-thumbnail responsive border-0 card-img-left p-2" style="height: 200px;padding:5%" onclick="requerimiento_imagen(this)" onmouseover="profileHover(<?= $row['usuario_id'] ?>,<?= $row['comercio_id'] ?>)" onmouseout="return profileHoverHide(<?= $row['usuario_id'] ?>)" />
                                <? } ?>
                                <div>
                                    <!-- DESCRIPCION FOTO -->
                                    <small class="text-muted">
                                        En <?= $row['tipo_actividad'] ?>
                                    </small>
                                </div>
                            </div>
                            <!-- ROW 2 COLUMNA 1/3 -->
                            <div style="overflow:scroll;grid-column:1/3">
                                <div class="d-flex flex-wrap" style="padding:5%;">
                                    <?php if (isset($row['keyword']) && $row['keyword'] != NULL) { ?>
                                        <?php foreach ($row['keyword'] as $rk) : ?>
                                            <span class="badge badge-light m-1" style="font-size: 1.1em !important; display: inline-block;">
                                                <i class="fas fa-hashtag fa-xs"></i>
                                                <?= $rk['keyword'] ?>
                                                &nbsp;&nbsp;&nbsp;
                                            </span>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- ROW 3 COLUMNA 1/3 -->
                            <div style="grid-column: 1/3;padding: 0 5% 10px">
                                <hr style="width: 100%;">
                                <div class="d-flex align-items-center">
                                    <?= ($row['negocio_nombre']) ? '<span style="width: auto;font-size: 1.2rem;font-weight: 600;letter-spacing:1px">' . $row["negocio_nombre"] . '</span>' : '<span style="width: 70%;font-size: 1.2rem;font-weight: 600;letter-spacing:1px">Sin nombre de negocio</span>'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;
                if ($i % 4 == 0 && $i != 0) { ?>
                </div>
        <?php }
            endforeach; ?>
    <?php } ?>
    </div>

    <div class="d-flex" style="width:fit-content">
        <p class='m-0 p-0 mr-5' style="align-self:center">
            <a id="no_afiliados_collapse" class="btn btn-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Otros comercios (no afiliados)
            </a>
        </p>
        <button type='button' class="btn btn-primary btn-sm btn-select-all-ckbx_noafiliados" style="height:fit-content">
            <strong>
                <u>
                    <i class="fas fa-check-double"></i>
                    <span id="boton_seleccionar_todos_no_afiliados">Seleccionar todos</span>

                </u>
            </strong>
        </button>
    </div>

    <div class="collapse" id="collapseExample">

        <?php if ($arr_noafiliados) {
            $i = 0;
            $tmp = 0; ?>




            <?php foreach ($arr_noafiliados as $row) :
                if ($i % 4 == 0) {
                    $tmp = $tmp + 4; ?>
                    <!-- ROW -->
                    <div class="row" style="width:inherit;min-height:fit-content">
                    <?php }  ?>
                    <!-- COLUMN -->
                    <div class="col col-lg-3" style='padding: 0;margin: 0;cursor:pointer'>
                        <!-- CARD BODY -->
                        <div id="requerimiento_<?= $row['comercio_id'] ?>" class="card m-3 requerimientos-card" style='background-color:#F7F7F7;height:inherit; box-shadow: 1px 1px 5px #aeaeae;position:relative' data-user="<?= $row['comercio_id'] ?>" data-afiliado="<?= $row['afiliado_canaco'] ?>" onclick="requerimientos_select(this)">
                            <!-- DIV DORADO -->
                            <div style="width: 50%;height: 30%;background: linear-gradient(90deg, rgba(255,170,37,1) 0%, rgba(255,195,19,1) 100%);position: absolute;z-index: 9"></div>
                            <!-- DIV BLANCO -->
                            <div style="width: 100%;height: 60%;background:#F7F7F7;position: absolute;z-index: 10;border-radius: 100%; left:0;" id="requerimiento_background_<?= $row['comercio_id'] ?>"></div>
                            <!-- CONTENIDO -->
                            <div id='requerimiento_contenido_<?= $row['comercio_id'] ?>' style="display: grid;grid-template-columns: repeat(2, 1fr);grid-template-rows: 0.3fr 1fr 0.1fr;position: relative;z-index: 12; gap: 2%;height: 50vh;">
                                <!-- ROW 1 COLUMNA 1 -->
                                <div class="d-flex">
                                    <!-- INSIGNIA Y PALOMA -->
                                    <div style="position:absolute;left:-1em;top: -0.5em;z-index:13">
                                        <span class="badge badge-pill badge-primary"> <img class='checkservice_tick' id='requerimiento_badge_<?= $row['comercio_id'] ?>' src="https://enlacecanaco.org/static/recompensas/insignias/ins_canaco_premium.png" width="15px" height:"15px">
                                        </span>
                                        <div class="float-right">
                                            <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                                <input id="requerimiento_input_<?= $row['comercio_id'] ?>" type="checkbox" class="custom-control-input checkservice_no_afiliados" data-user="<?= $row['comercio_id'] ?>" data-afiliado="<?= $row['afiliado_canaco'] ?>">
                                                <span class="custom-control-label">&nbsp;</span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- FAVORITOS  -->
                                    <div style="position: relative;left: 0;right: 0;top: 0;bottom: 0;margin: auto;text-align:center">
                                        <span style="font-size:1.5rem">
                                            <i class="fas fa-star"></i>
                                            <strong><?= $row['negocio_calif'] ?></strong>
                                        </span>
                                        <br>
                                        <?= $arr_tipo_actividad[$row['tipo_transaccion']] ?>
                                    </div>
                                </div>
                                <!-- ROW 1 COLUMNA 2 -->
                                <div style="justify-self: center;position:relative">
                                    <!-- ICONO OJO OCULTO -->
                                    <span id="profile_eye_<?= $row['usuario_id'] ?>" style="opacity:0" class='profile-img-eye'></span>
                                    <!-- IMAGEN PERFIL -->
                                    <?php if ($row['negocio_logo'] != null) { ?>
                                        <img id='requerimiento_imagen_<?= $row['comercio_id'] ?>' data-user="<?= $row['usuario_id'] ?>" data-negocio="<?= $row['comercio_id'] ?>" src="<?= base_url() . 'static/uploads/perfil/' . $row['negocio_logo'] ?>" alt="<?php echo ($row['negocio_nombre']); ?>" class="perfil-img2" style="height: 200px;object-fit: FILL;max-width: 100%;padding:5%" onclick="requerimiento_imagen(this)" onmouseover="profileHover(<?= $row['usuario_id'] ?>,<?= $row['comercio_id'] ?>)" onmouseout="return profileHoverHide(<?= $row['usuario_id'] ?>)" />
                                    <?php } else { ?>
                                        <img id='requerimiento_imagen_<?= $row['comercio_id'] ?>' data-user="<?= $row['usuario_id'] ?>" data-negocio="<?= $row['comercio_id'] ?>" src="<?= base_url() . 'static/uploads/perfil/logo_default.png' ?>" alt="<?php echo ($row['negocio_nombre']); ?>" class="perfil-img2" style="height: 200px;object-fit: FILL;max-width: 100%;padding:5%" onclick="requerimiento_imagen(this)" onmouseover="profileHover(<?= $row['usuario_id'] ?>,<?= $row['comercio_id'] ?>)" onmouseout="return profileHoverHide(<?= $row['usuario_id'] ?>)" />
                                    <? } ?>
                                    <div>
                                        <!-- DESCRIPCION FOTO -->
                                        <small class="text-muted">
                                            En <?= $row['tipo_actividad'] ?>
                                        </small>
                                    </div>
                                </div>
                                <!-- ROW 2 COLUMNA 1/3 -->
                                <div style="overflow:scroll;grid-column:1/3">
                                    <div class="d-flex flex-wrap" style="padding:5%;">
                                        <?php if (isset($row['keyword']) && $row['keyword'] != NULL) { ?>
                                            <?php foreach ($row['keyword'] as $rk) : ?>
                                                <span class="badge badge-light m-1" style="font-size: 1.1em !important; display: inline-block;">
                                                    <i class="fas fa-hashtag fa-xs"></i>
                                                    <?= $rk['keyword'] ?>
                                                    &nbsp;&nbsp;&nbsp;
                                                </span>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- ROW 3 COLUMNA 1/3 -->
                                <div style="grid-column: 1/3;padding: 0 5% 10px">
                                    <hr style="width: 100%;">
                                    <div class="d-flex align-items-center">
                                        <?= ($row['negocio_nombre']) ? '<span style="width: auto;font-weight: 600;letter-spacing:1px">' . $row["negocio_nombre"] . '</span>' : '<span style="width: 70%;font-size: 1.2rem;font-weight: 600;letter-spacing:1px">Sin nombre de negocio</span>'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                    if ($i % 4 == 0 && $i != 0) { ?>
                    </div>
            <?php }
                endforeach; ?>
    </div>
<?php }
    } else { ?>
<div class="row">
    <div class="col-sm-12 mb-5">
        <div class="alert alert-warning mb-0" role="alert">
            <p class="text-center mt-3">
                <i class="fas fa-times text-text-dark fa-3x"></i>
            </p>
            <h3 class="text-center text-dark">
                <strong>No hemos encontrado <span id="resultados_prev" name="resultados_prev"></span> resultados</strong>
                con tus parámetros de búsqueda
            </h3>
        </div>
    </div>
</div>

<div class="col-12 text-center mt-3 text-muted">
    <div class="m-3 align-middle">
        <p class="mt-3">
        <h5> Lo sentimos, no encontramos coicidencias para tu búsqueda<h5>
                </p>
    </div>
</div>
<?php } ?>