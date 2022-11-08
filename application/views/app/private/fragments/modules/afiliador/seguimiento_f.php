<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="no-more-tables">
                    </div>
                    <div id="tablaAfiliados">
                        <table id="data_seguimientos" class="data-table  nowrap table " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        No.
                                    </th>
                                    <th scope="col">
                                        Comercio
                                    </th>
                                    <th scope="col">
                                        Información
                                    </th>
                                    <th scope="col">
                                        Valoraciones
                                    </th>
                                    <th scope="col">
                                        Seguimiento
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
                                        if (isset($com->negocio_nombre)) { ?>
                                            <tr>
                                                <td><?= $com->negocio_id ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div id='<?= $divmagic ?>'>
                                                        </div>                               
                                                    </div>
                                                </td>
                                                <td>
                                                    Telefono  <?= $com->telefono_auth ?>
                                                    <hr>
                                                    Email:   <?= $com->email_auth ?>
                                                    <hr>
                                                    RFC: <p style="text-transform:uppercase;"> <?= $com->negocio_rfc ?></p>
                                                </td>
                                                <td>Valoración (Número)</td>
                                                <td>
                                                    <a class="btn btn-primary default btn-default" onclick='' href="<?= base_url() .
                                                        'app/afilcomercios/detalleseguimiento/' .
                                                        $com->usuario_id ?>">
                                                    Seguimiento (Número)
                                                </a>
                                                </td>
                                            </tr>
                                <?php } //fin isset chiquito
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