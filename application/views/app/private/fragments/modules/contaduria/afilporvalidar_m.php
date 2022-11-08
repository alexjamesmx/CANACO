<style>
.modal-open .select2-container {
    z-index: 9999 !important;
}

.select2-container--bootstrap .select2-results__group {
    z-index: 9999 !important;
    color: #000 !important;
    display: block;
    padding: 6px 12px;
    font-size: 13px;
    line-height: 1.42857143;
    white-space: nowrap;
}

</style>
<div id="modal-afilporvalidar" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">

                    Afiliaciones por validar
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">

                    <div id="tablaAfiliados">
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
                                        Membresia
                                    </th>
                                    <th scope="col">
                                        Comprobante de pago
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                    <th scope="col">
                                        Usuario desde
                                    </th>
                                    <th scope="col">
                                        Transacciones realizadas
                                    </th>
                                    <th scope="col">
                                        No. publicadas
                                    </th>
                                    <th scope="col">
                                        No. vacantes realizadas
                                    </th>
                                    <th scope="col">
                                        Notas
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <p>823</p>
                                    </td>
                                    <td>
                                        Nombre comercio
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4>Membresia elegida</h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4>Comprobante de pago</h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4>Fecha</h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4>Fecha desde que el ususrio se registro</h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4>Número de transacciones realizadas</h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4></h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4></h4> 
                                        </div>
                                    </td>
                                    <td>
                                        <div class= "container">
                                            <h4>Notas</h4> 
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>