<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Cierres confirmados
                </h5>
                <div class="col-md-12">
                    <div class="no-more-tables">
                    </div>
                    <div class="table-responsive table-responsive-sm table-responsive-md " id="tablaAfiliados">
                        <table id="data_seguimiento" class="data-table nowrap table table-bordered  table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        No.
                                    </th>
                                    <th scope="col">
                                        Comercios
                                    </th>
                                    <th scope="col">
                                        Estatus
                                    </th>
                                    <th scope="col">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <input type='hidden' value='<?= json_encode(
                                                                $comercios
                                                            ) ?>' id='info'>
                                <?php if (isset($comercios)) {
                                    $i = 0;
                                    foreach ($comercios as $com) {

                                        $divmagic = 'magic' . $i;
                                        $i++;
                                ?>
                                        <tr>
                                            <td scope="col">#<?= $com->negocio_id ?></td>
                                            <td scope="col" class="w-25">
                                                <div id='<?= $divmagic ?>'><?= $com->negocio_nombre ?>
                                                </div>

                                            </td>
                                            <td scope="col">Estatus</td>
                                            <td scope="col">Acciones</td>
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