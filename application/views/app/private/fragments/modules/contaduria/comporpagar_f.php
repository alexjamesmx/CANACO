<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Comisiones por pagar 
                </h5>
                <div class="col-md-12">
                    <div class="no-more-tables">
                    </div>
                    <div class ="table-responsive" id="tablaAfiliados">
                        <table id="data_seguimiento" class="table_custom_1 data-table  nowrap table " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        No.
                                    </th>
                                    <th scope="col">
                                        Afiliador
                                    </th>
                                    <th scope="col">
                                        Detalle comisión
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody><input type='hidden' value='<?=json_encode($comercios)?>' id='info'>
                                <?php if (isset($comercios)) {   
                                    foreach ($comercios as $com) {
                                        ?>
                                        <tr>
                                            <td>#<?= $com->afiliados_id ?></td>
                                            <td>
                                                <div class="container">

                                                    <b>Nombre de afiliador: </b><?= $com->nombre?><br>
                                                    <b>Email: </b><?= $com->email_auth ?><br>
                                                    <b>Afiliador desde: </b><?=fancy_date($com->fecha_creacion,'d-m-y')?>  
                                                </div>
                                            </td>
                                            <td>
                                                <div class='container'>
                                                    <b>Tipo: </b>afiliación<br>
                                                    <b>Fecha: </b><?= $com->inicio_afiliacion?><br>
                                                    <b>Tipo de afiliación: </b><?= $com->descripcion?><br>
                                                    <b>Porcentaje: </b><?= $com->percent?>%<br>
                                                    <b>Importe: </b>$<?= number_format((($com->percent*$com->importe)/100), 2) ?><br>
                                                </div>
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
