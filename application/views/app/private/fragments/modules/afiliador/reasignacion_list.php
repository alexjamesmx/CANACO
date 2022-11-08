
<div class="row">
    <!-- <?php var_dump($conversiones); ?> -->
        <div class="col-12 mb-2 mb-4">
            <div class="card">
                <div class="card-body">
                <h5 class=" card-title mb-4">
                        <i class="simple-icon-list"></i>
                        Conversiones
                    </h5>
                <div class="col-md-12 table-responsive">
                        <div class="no-more-tables ">
                        </div>
                    <div id="tablaAfiliados" style = "display: block;overflow-x: auto;" >
                        <table id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            Nombre
                                        </th>
                                    <th scope="col">
                                            información
                                        </th>
                                
                                    <th scope="col">
                                            Nombre de afiliador
                                    </th>
                                  
                                 
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >

                                <?php if(isset($conversiones)){ foreach($conversiones as $convercion) {?>
                                            <tr>
                                                <td>
                                                <strong> # <?= $convercion->afiliados_id ?> </strong>
                                                <br>
                                                </td>
                                                <td>
                                                    Nombre:
                                                    <strong>  
                                                    <?= $convercion->negocio_nombre ?>
                                                    </strong>
                                                    <br>
                                                    Razón Regimen:
                                                    <strong>
                                                    <?= $convercion->negocio_persona ?>
                                                    <br>
                                                    </strong>
                                                    Razón Social:
                                                    <strong>
                                                    <?= $convercion->negocio_razon ?>
                                                    </strong>
                                                    <br>
                                                    Rfc:
                                                    <strong>
                                                    <?= $convercion->negocio_rfc ?>
                                                    </strong>   
                                                </td>
                                                <td>
                                                <?php foreach($afiliadores as $afiliador) {?>

                                                        <?php if($convercion->afiliador_alta == $afiliador->usuario_id ){  ?>

                                                        <?= $afiliador->nombre ?> 
                                                        <br>
                                                        <?= $afiliador->apellido1 ?>
                                                        <br>
                                                        <?= $afiliador->apellido2 ?>
                                                        <br>
                                                           <?php } ?>
                                                        <?php } ?>
                                                </td>
                                                
                                            </tr>                  
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>