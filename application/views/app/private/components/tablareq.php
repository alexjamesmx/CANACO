<style>
    .animacion {
        animation-name: parpadeo;
        animation-duration: 2.5;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        -webkit-animation-name: parpadeo;
        -webkit-animation-duration: 2.5s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
    }

    @-moz-keyframes parpadeo {
        0% {
            opacity: 1.0;
        }

        50% {
            opacity: 0.3;
        }

        100% {
            opacity: 1.0;
        }
    }

    @-webkit-keyframes parpadeo {
        0% {
            opacity: 1.0;
        }

        50% {
            opacity: 0.3;
        }

        100% {
            opacity: 1.0;
        }
    }

    @keyframes parpadeo {
        0% {
            opacity: 1.0;
        }

        50% {
            opacity: 0.3;
        }

        100% {
            opacity: 1.0;
        }
    }
</style>
<table id="misrequerimientos" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class='text-center align-content-center'>
                No.
            </th>
            <th scope="col" class='text-center align-content-center'>
                Solicitud
            </th>
            <th scope="col" class='text-center align-content-center'>
                Estatus actual
            </th>
            <th scope="col" class='text-center align-content-center'>
                Acciones
            </th>
            <th scope="col" class='text-center align-content-center'>
                Seleccionar comercio
            </th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 0;
        $false_id =  count($requerimientos);

        foreach ($requerimientos as $requerimiento) :
            $modalinteres = 'interes' . $i;
            $listainteres = 'lista' . $i;
            $inout = 'inout' . $i;
            $controles = 'controles' . $i;
            $modalseguimiento = 'segmod' . $i;
            $detalles = 'detalles' . $i;
            $modalcalif = 'calif' . $i;
            extract((array)($requerimiento));
            if ($estatus != 8) { ?>
                <tr style='height:1px;'>
                    <td data-title="No.">
                        <small> #<?= $false_id  ?></small><br>
                        <small> #<?= $req_id  ?></small>
                    </td>
                    <td data-title="Solicitud" class='justify-content-between' style="width:300px;">
                        <strong>¿Qué buscas?</strong></br>
                        <?= $busq_nec ?>
                        <hr>
                        <strong>Cantidad </strong><?= $qty ?>
                        <hr>
                        <strong>Descripción </strong></br><?= $especificaciones  ?>
                        <hr>
                        <strong>Disponible desde:</strong><br> <?= $fecha_req ?>
                        <?php if ($republicado) { ?>
                            <hr>
                            <strong>Requerimiento Republicado</strong>
                        <?php } ?>
                    </td>
                    <?php
                    if ($interesados >= 1) {
                        $estado =
                            'Hay comercios interesados en tu requerimiento';
                    } elseif ($interesados == 0) {
                        $estado =
                            'En espera';
                    }
                    if (
                        $usuario_elegido !== '0' &&
                        isset($usuario_elegido)
                    ) {
                        $estado =
                            'Se ha elegido a un comercio para resolver este requerimiento';
                    }
                    if (isset($estatus)) {
                        $estado = 'Requerimiento concluido';
                    }
                    ?>
                    <td data-title="Estatus actual" style="vertical-align:middle;">
                        <h5 class="text-center">
                            <i class="fas fa-clock"></i>
                            <br>
                            <?= $estado ?>
                        </h5>
                    </td>
                    <?php if (
                        $estatus == '21' ||
                        $estatus == '22' ||
                        $estatus == '23'
                    ) { ?>
                        <td data-title="Acciones" style="height:100%;">
                            <div style='height:100%;margin:0'>
                                <?php if ($req_calf_status == 1) {  ?>
                                    <!-- 50% -->
                                    <div id="<?= $controles ?>" style="justify-content:center; display:flex; height: 100%;" class='padre'>

                                    <?php } else { ?>
                                        <!--100% -->
                                        <div id="<?= $controles ?>" style="justify-content: center; display:flex; height: 100%;" class='padre'>
                                            <h5 class="text-center" style='align-self: center;'><i class="fas fa-times"></i><br>Sin evaluar</h5>
                                        <?php } ?>
                                        <?php if ($estatus == '21' && $req_calf_status == 0) { ?>
                                            <button class="btn btn-primary default btn-default" onclick="opencalif( )">
                                                <i class="fas fa-clipboard-list"></i>
                                                Califica
                                            </button>
                                        <?php } else  if ($req_calf_status == 1) { ?>
                                            <h5 class="text-center" style="align-self:center;"><i class="fas fa-check"></i><br>Evaluado, calificación: <?= $promedio ?> </h5>
                                        </div>
                                    <?php } ?>
                                    </div>
                            </div>
                        </td>
                    <?php } else { ?>
                        <td data-title="Acciones" style="height:100%;text-align:center;">
                            <div class="btn-group" id="<?= $controles ?>" style="height:100%;align-items:center;">
                                <button style='height:fit-content;border-radius:12px;' class="btn btn-dark default btn-default" onclick="openseguimiento(<?= $modalseguimiento ?>,<?= $req_id ?>,<?= $detalles ?>)">
                                    <i class="fas fa-arrow-circle-right"></i>
                                    <br>
                                    Seguimiento
                                </button>
                                <button style='height:fit-content' class="btn btn-danger default btn-default" onclick="openmodal()">
                                    <i class="fas fa-times"></i>
                                    <br>
                                    Finalizar
                                </button>
                                <button style='height:fit-content;border-radius:12px;' role="link" onclick="republicar(<?= $req_id ?>)" class="btn btn-primary default btn-default">
                                    <i class="fas fa-comment"></i>
                                    <br>
                                    Republicar
                                </button>
                            </div>
                        </td>
                    <?php } ?>
                    <td data-title="Acciones" style="height:100%;">
                        <?php if (!isset($fecha_fin_req)) { ?>
                            <div class="" style="  height: 100%;width: 100%;display: flex;justify-content:center">
                                <div style="height: 33%;align-self: center;" class="btn-group">
                                    <button <?php if ($interesados > 0) { ?> class="btn btn-dark default btn-default animacion" <?php } else { ?> class="btn btn-dark default btn-default" <?php } ?> onclick='modalinteres(<?= $modalinteres ?>,<?= $listainteres ?>,<?= $req_id ?>)'>
                                        <i class="fas fa-user-friends"></i>
                                        <br>
                                        Comercios interesados: <?= $interesados ?>
                                    </button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div style="justify-content:center; display:flex;height:100%">
                                <h5 class="text-center" style="align-self:center;"><i class=" fas fa-clipboard-list"></i><br>Finalizado el </br><?= fancy_date($fecha_fin_req, 'd-m-y') ?></h5>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <div class="modal fade" style='padding:0 !important; ' id="<?= $modalseguimiento ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style='width:100%; max-width:none; height:100%; margin:0;'>
                        <div class="modal-content" style='height:100%; border:0; border-radius:0;'>
                            <div class="modal-header" style=" background-color: #000000;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Detalles del requerimiento</h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style='overflow-y:auto'>
                                <div id='<?= $detalles ?>' class='row'>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary default btn-default" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal_encuesta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #343a40;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">¿Por qué quieres desactivar el requerimiento</h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="m-12" id="div_modal">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label d-block">
                                                Pude resolver mi requerimiento:
                                            </label>
                                            <div class="form-check form-check-inline">
                                                <div class="mb-0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sipude" value="0" id="sipude" onclick="encuesta('0',<?= $inout ?>)">
                                                        <label class="form-check-label" for="p-fisica">
                                                            Si
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <div class="mb-0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="1" name="sipude" id="nopude" onclick="encuesta('1',<? $inout ?>)">
                                                        <label class="form-check-label" for="p-moral">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 alex">
                                        <div id="encuesta">
                                        </div> <!-- fin divsino -->
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="<?= $inout ?>" name="<?= $inout ?>" value="" />
                            <div class="modal-footer">
                                <button onclick="handleCancelar()" type="button" class="btn btn-danger default btn-default" data-dismiss="modal">Cancelar</button>
                                <button data-clave='null' type="button" id="btn_aceptar" onclick="subirdetalle(<?= $req_id ?> , <?= $controles ?>, <?= $modalinteres ?>,<?= $listainteres ?>)" class="btn-subir-detalle btn btn-primary default btn-default" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal_calificaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #343a40;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Por favor evalua tu experiencia en la plataforma</h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card" id="wizard">
                                    <div class="card-body">
                                        <div class="content">
                                            <div class="row">
                                                <div class="col">
                                                    <div>
                                                        <label class="form-label d-block">
                                                            <b>Respecto a la rapidez para enviar la cotización y entrega total del producto o servicio ¿qué valoración le das al proveedor de nuestra plataforma?</b>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <form>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaA()" type="radio" name="a" id="a1" value="1">
                                                                        Los tiempos de entrega excedieron los prometidos
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaA()" type="radio" value="2" name="a" id="a2">
                                                                        Los tiempos de entrega se pasaron por un par de días
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaA()" type="radio" value="3" name="a" id="a3">
                                                                        Los tiempos de entrega no fueron los acordados pero el servicio y atención fueron excelentes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaA()" type="radio" value="4" name="a" id="a4">
                                                                        Se cumplieron los tiempos de entrega
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaA()" type="radio" value="5" name="a" id="a5">
                                                                        Extraordinarios tiempos de cotización y entrega
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col">
                                                    <div>
                                                        <label class="form-label d-block">
                                                            <b>El trato y atención:</b>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <form>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaB()" type="radio" value="1" name="b" id="b1">
                                                                        Dejaron mucho que desear
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaB()" type="radio" value="2" name="b" id="b2">
                                                                        Pueden mejorar su trato y atención a clientes
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaB()" type="radio" value="3" name="b" id="b3">
                                                                        Aunque su trato y atención no son los mejores, los tiempos de entrega fueron acorde a lo plasmado en la cotización
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaB()" type="radio" value="4" name="b" id="b4">
                                                                        Buen trato y atención, solamente les falta mejorar en la entrega del producto o servicio contratado
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaB()" type="radio" value="5" name="b" id="b5">
                                                                        Extraordinaria atención y servicio antes, durante y en la entrega final del producto y servicio
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col">
                                                    <div>
                                                        <label class="form-label d-block">
                                                            <b>En relación al precio y calidad del producto o servicio contratado:</b>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <form>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaC()" type="radio" value="1" name="c" id="c1">
                                                                        La calidad y precio del producto o servicio final, no va en relación a la cotización y requerimientos solicitados
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaC()" type="radio" value="2" name="c" id="c2">
                                                                        El precio del producto cumplió con los rangos estipulados pero la calidad no es acorde al requerimiento de nuestra organización
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaC()" type="radio" value="3" name="c" id="c3">
                                                                        La calidad puede mejorar y el precio pactado se respetó
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaC()" type="radio" value="4" name="c" id="c4">
                                                                        La calidad es aceptable y el precio está acorde a los estándares del mercado
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaC()" type="radio" value="5" name="c" id="c5">
                                                                        Gran calidad y precio justo
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col">
                                                    <div>
                                                        <label class="form-label d-block">
                                                            <b>¿Recomendarías a la empresa proveedora?</b>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <form>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaD()" type="radio" value="1" name="d" id="d1">
                                                                        No lo recomendaría
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaD()" type="radio" value="2" name="d" id="d2">
                                                                        Le daría una segunda oportunidad
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaD()" type="radio" value="3" name="d" id="d3">
                                                                        Si mejora su trato (o precio o calidad o tiempos de entrega) podría considerar recomendarle
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaD()" type="radio" value="4" name="d" id="d4">
                                                                        Lo recomendaría
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-0">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" onclick="validarencuestaD()" type="radio" value="5" name="d" id="d5">
                                                                        Super recomendado! Gran proveedor
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col">
                                                    <form action="">
                                                        <div>
                                                            <label class="form-check-label">Dejar un comentario</label>
                                                        </div>
                                                        <div>
                                                            <textarea name="f1" id="f1" class="form-control" rows="5"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger default btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary default btn-default" data-dismiss="modal" onclick="validarencuesta(<?= $req_id ?>)">Aceptar</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                </div>

                <div class="modal fade" id="<?= $modalinteres ?>" tabindex="-1" aria-labelledby="modal_afiliacion" aria-hidden="true" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style=" background-color: #000000;">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Comercios interesados en tu requerimiento</h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body  mx-auto">

                                <div class="m-12" align='center' id="div_modal">
                                    <div id="<?= $listainteres ?>">

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary default btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


        <?php $i++;
                $false_id--;
            } //end if eestatus
        endforeach;

        //end if isset
        ?>
    </tbody>
</table>