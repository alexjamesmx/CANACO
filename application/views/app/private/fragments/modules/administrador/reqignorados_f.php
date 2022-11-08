<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Requerimineto ignorado 
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                    Requerimineto ignorado 
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                    <th scope="col">
                                        Comercio que publica 
                                    </th>
                                   
                                   
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                                <?php foreach($reqigno as $req){?>
                                    <tr>
                                                <td>
                                                <strong> </strong>
                                                <?= $req->req_id ?> 
                                                        <br>
                                                        <?= $req->busq_nec ?>
                                                        <br>
                                                        Especificaciones:
                                                        <strong>
                                                        <?= $req->especificaciones ?>
                                                        <br>
                                                        </strong>
                                                        <?= $req->qty ?>
                                                        <br>
                                                </td>
                                                <td>
                                                <strong> 
                                                      <?= $req->fecha_req ?>  
                                                </strong>   
                                                </td>
                                                <td>
                                                    <strong> 
                                                        <?= $req->negocio_nombre ?>  
                                                        <br>
                                                        <?= $req->negocio_razon ?>  
                                                        <br>
                                                    </strong>   
                                                       
                                     </td>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>