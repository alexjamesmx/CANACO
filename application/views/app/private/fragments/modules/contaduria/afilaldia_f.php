<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Afiliaciones al dia de hoy
                </h5>
                <div class="col-md-12">
                    <div class="no-more-tables">
                    </div>
                    <div class ="table-responsive" id="tablaAfiliados">
                        <table id="controls-data-tables-pagination" class="data-table  nowrap table " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        No.
                                    </th>
                                    <th scope="col">
                                        Comercio
                                    </th>
                                    <th scope="col">
                                        Información afiliación
                                    </th>
                                    <th scope="col">
                                        Seguimiento
                                    </th>
                                </tr>
                            </thead>
                            <tbody><input type='hidden' value='<?=json_encode($comercios)?>' id='info'>
                                <?php if (isset($comercios)) {
                                    $i = 0;
                                    foreach ($comercios as $com) {
                                        $divmagic = 'magic' . $i;
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>#<?= $com->negocio_id ?></td>
                                            <td>
                                                <div class="row">
                                                    <div id='<?= $divmagic ?>'>
                                                    </div>                            
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class='container'>
                                                    <b>Tipo de afiliación solicitada: </b><?= $com->tipo?><br>
                                                    <b>Inicio de afiliación: </b><?=fancy_date($com->inicio_afiliacion,'d-m-y') ?><br>
                                                    <b>Fin de afiliación: </b><?=fancy_date($com->fin_afiliacion,'d-m-y')?>
                                                </div>


                                            </td>
                                            <td>
                                                <a class="btn btn-primary default btn-default" onclick='' href="<?= base_url() .
                                                'app/contaduria/detalleseguimiento/' .
                                                $com->usuario_id ?>">
                                                Seguimiento (Número)
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    } //end foreach
                                }
                                    // end if isset
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
