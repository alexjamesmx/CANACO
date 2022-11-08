<div class="row">
<?php var_dump($documentos); ?>
    <div class="col-12 mb-2 mb-4">

        <div class="card">
            <div class="card-body">

                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Afiliaciones
                </h5>

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
                                        Validar <br> curriculum vitae
                                    </th>
                                    <th scope="col">
                                    Validar <br>Documentación
                                    </th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(isset($validaciones)){?>
                                    <input type='hidden' value='<?=json_encode($validaciones)?>' id='info'>
                                    <?php $i=0; foreach( $validaciones as $validacion ) {  ?>
                                        <?php $divespecial ='magic'.$i; ?>
                                        <?php   ?>  
                                        <?php  ?>  
                                        <tr>
                                            <td>
                                                <!-- <p> <?=$validacion->afiliados_id?> </p> -->
                                            </td>
                                            <td>
                                                <div id="" class="container">

                                                </div>
                                            </td>
                                           
                                            <td>
                                            <div class="container">
                                                    <button  class="btn btn-primary" onclick="" class="btn btn-warning default"  >
                                                        Validar <br> curriculum vitae
                                                    </button>                                    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="container">
                                                    <button onclick=""  class="btn btn-primary   "  >
                                                        Validar <br>Documentación
                                                    </button>    
                                                    <br>
                                                </div>
                                                
                                        <!-- inicio modal -->
                                        <div id="<?=$inout?>" class="modal fade" role="dialog" aria-hidden="true">    
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            <i class="fas fa-eye"></i>
                                                            Vista del documento 
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">
                                                                <i class="fas fa-times"></i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <iframe src="<?=base_url().'static/uploads/recibos/'.$pago?>" width="100%"
                                                            height="1000"></iframe>
                                                        </div> 
                                                        <div class="form-group col-sm-12">
                                                            <label for="nombre_ventas">
                                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                                Por favor confirma escribiendo: "validado"
                                                            </label>
                                                            <input type="text" name="validado" id="validado<?= $validacion->afiliados_id?>"  autocomplete="off" class="form-control required" >
                                                        </div>
                                                        <div class="col-sm-12 form-group mt-3 d-flex justify-content-end">
                                                            
                                                            <button class="btn btn-primary default btn-lg"  onclick="cambiar_estatus(<?=$inout?>, <?= $validacion->afiliados_id?>)">
                                                                <i class="fas fa-check"></i>
                                                                Aceptar
                                                            </button>
                                                            <div class="col-1"></div>
                                                            <button class="btn btn-danger default btn-lg btn-sbmt-addkeyword" onclick="cambiar_estatus_negativos(<?=$inout?>,<?= $validacion->afiliados_id ?>)">
                                                                <i class="fas fa-times"></i>
                                                                Rechazar
                                                            </button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fin modal -->
                                        
                                            </td>
                                        </tr>
                                        <?php $i++;} } else {?>
                                            <!--fin de for  -->
                                            <!--fin de if   -->
                                            <tr>    
                                                <td>
                                                  <div class= "container">
                                                        <h4>Aun no existen peticiones</h4> 
                                                    </div>
                                                </td>
                                            </tr>   
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



