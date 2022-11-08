<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Afiliaciones
                </h5>
                <div class="col-md-12">
                    <div class="table-responsive" id="tablaAfiliados">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($validaciones)){ ?>
                                    <input type='hidden' value='<?=json_encode($validaciones)?>' id='info'>
                                    <?php $i=0; foreach( $validaciones as $validacion ) {  ?>
                                        <?php $divespecial ='magic'.$i; ?>
                                        <?php $inout='clave'.$validacion->afiliados_id;  ?>
                                        <?php $formu='formulario'.$validacion->afiliados_id;  ?>  
                                        <?php $pdfs='pdf'.$validacion->afiliados_id;  ?>
                                        <?php $xmls='xml'.$validacion->afiliados_id;  ?>
                                        <?php $pago= $validacion->validacion_pago; ?>  
                                        <?php $bandera_factura= TRUE ;?>  
                                        <tr>
                                            <td>
                                                <p> <?=$validacion->afiliados_id?> </p>
                                            </td>
                                            <td>
                                                <div id="<?=$divespecial?>" class="container">
                                                </div>
                                            </td>
                                            <td>
                                                <div class= "container">
                                                    <h4><?=$validacion->tipo?></h4> 
                                                </div>
                                                <div class= "container col-sm-12 " >
                                                                <?php if(isset($validacion->calle)  ){ ?>
                                                            <strong> Calle:</strong>  <?= $validacion->calle ?> ,
                                                                <br>
                                                                #<?= $validacion->num_int ?> , Exterior:<?= $validacion->num_ext ?> ,
                                                                <br>
                                                            <strong>Colonia:</strong>  <?= $validacion->colonia ?>,
                                                                <br>
                                                            <strong>Estado:</strong> <?= $validacion->estado ?> 
                                                                <br>
                                                                <strong>Municipio:</strong> <?= $validacion->municipio ?> 
                                                            <br>
                                                                <strong>Cp :</strong> <?= $validacion->codigo_postal?>
                                                                <br>
                                                                <h4>Se requiere factura </h4> 
                                                                <hr>
                                                                
                                                                <?php }else{?>
                                                                    <h4>
                                                                    No factura
                                                                    </h4>
                                                                    <div id="titulo" name="titulo" class=" col-sm-12" style="display: block;">
                                                                            <label for="nombre_ventas">
                                                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                                                Por favor ingresa el numero de engomado de la afiliacion:
                                                                            </label>
                                                                            <input type="text" onpaste='toastr["warning"]("Por favor escribe manualmente en este campo"); return false' name="engomado<?= $validacion->afiliados_id?>" id="engomado<?= $validacion->afiliados_id?>"  
                                                                            autocomplete="off" class="form-control required" >
                                                                       
                                                                            <label for="nombre_ventas">
                                                                                <sup><i class="fas fa-asterisk text-danger"  style="font-size: 0.7em;"></i></sup> 
                                                                                Por favor confirma escribiendo: "validado" o "rechazado"
                                                                            </label>
                                                                            <input type="text" onpaste='toastr["warning"]("Por favor escribe manualmente en este campo"); return false' name="validados<?= $validacion->afiliados_id?>" id="validados<?= $validacion->afiliados_id?>"  
                                                                            autocomplete="off" class="form-control required" >
                                                                        
                                                                        <div class="col-sm-12 form-group mt-3 d-flex justify-content" id="botones_" name="botones"
                                                                            style="display: none;">
                                                                            <button class="btn btn-primary default btn-lg"  
                                                                                onclick="cambiar_estatus(<?=$inout?>, <?= $validacion->afiliados_id?>)">
                                                                                <i class="fas fa-check"></i>
                                                                                Aplicar
                                                                            </button>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                <?php $bandera_factura=false;} ?>
                                                        </div>
                                                <?php if($bandera_factura):?>
                                                        <div class="container col-sm-12" style="display: block;" id="subir_doc_<?=$validacion->afiliados_id?>" name="subir_doc_<?=$validacion->afiliados_id?>" >            
                                                                <iframe onload="respuestas(<?=$validacion->afiliados_id?>)" width="0" height="0" 
                                                                border="0" name="resframe_<?=$validacion->afiliados_id?>" id="resframe_<?=$validacion->afiliados_id?>"></iframe>
                                                                    <form  id="form-up-factura"  action="<?=base_url('app/files/subirfactura/'.$validacion->afiliados_id  )?>" 
                                                                        class="validate-ptp" method="post" 
                                                                        enctype="multipart/form-data" target='resframe_<?=$validacion->afiliados_id?>'>    
                                                                        <div class="row text-center">   
                                                                                <div class="container text-center">
                                                                                    <h2>Subir XML</h2>                                           
                                                                                    <input type="file" name="<?=$xmls?>" id="<?=$xmls?>" 
                                                                                    class="form-control required btn btn-info" 
                                                                                    accept="application/xml" required>
                                                                                    <hr>
                                                                                </div>
                                                                                <div class="container text-center">
                                                                                    <h2>Subir PDF</h2> pdfs
                                                                                    <input type="file" name="<?=$pdfs?>" id="<?=$pdfs?>" 
                                                                                    class="form-control required btn btn-info" 
                                                                                    accept="application/pdf"required>
                                                                                    <div class="col-sm-12 form-group mt-3 d-flex text-center">
                                                                                        <button class="btn btn-primary default btn-lg" type="submit" >
                                                                                            Subir Factura
                                                                                        </button>   
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </form>
                                                        </div>  
                                                        <div name="validadosf<?= $validacion->afiliados_id?>" 
                                                            id="validadosf<?= $validacion->afiliados_id?>"  
                                                             class=" col-sm-12" style="display: none;">

                                                                             <label for="nombre_ventas">
                                                                                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                                                Por favor ingresa el numero de engomado de la afiliacion:
                                                                            </label>
                                                                            <input type="text" onpaste='toastr["warning"]("Por favor escribe manualmente en este campo"); return false' name="engomado<?= $validacion->afiliados_id?>" id="engomado<?= $validacion->afiliados_id?>"  
                                                                            autocomplete="off" class="form-control required" >
                                                                            <label for="nombre_ventas">
                                                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                                                Por favor confirma escribiendo: "validado" o "rechazado"
                                                                            </label>
                                                                            <input type="text" onpaste='toastr["warning"]("Por favor escribe manualmente en este campo"); return false' name="validados<?= $validacion->afiliados_id?>" id="validados<?= $validacion->afiliados_id?>"  
                                                                            autocomplete="off" class="form-control required" >
                                                                        
                                                                        <div class="col-sm-12 form-group mt-3 d-flex justify-content"
                                                                        style="display: none;" id="botones_<?= $validacion->afiliados_id?>" name="botones_<?= $validacion->afiliados_id?>"
                                                                            style="display: none;">
                                                                            <button class="btn btn-primary default btn-lg"  
                                                                                onclick="cambiar_estatus(<?=$inout?>, <?= $validacion->afiliados_id?>)">
                                                                                <i class="fas fa-check"></i>
                                                                                Aplicar
                                                                            </button>
                                                                          
                                                                        </div>
                                                        </div>
                                                        <div class="container col-sm-12">
                                                                <div class="spinner-grow  text-center text-primary container col-sm-12 " 
                                                                id="spiner_<?=$validacion->afiliados_id ?>" name="spiner_<?=$validacion->afiliados_id ?>" 
                                                                style="display:none;">
                                                                </div>
                                                                <div class="text-center" id="carga_<?=$validacion->afiliados_id ?>" name="carga_<?=$validacion->afiliados_id ?>" style="display:none;">
                                                                        <strong class="text-primary" >
                                                                                Cargando....
                                                                        </strong>
                                                                </div>
                                                        </div>
                                                     
                                                       <?php endif?> 
                                            </td>
                                            <td>
                                                <div class="container">
                                                    <button onclick="abrixr(<?=$inout?>, '<?=$pago?>','<?=$validacion->afiliados_id?>')" class="btn btn-warning default"  >
                                                        Ver documento
                                                    </button>                                        
                                                </div>
                                        <!-- inicio modal -->
                                        <div id="<?=$inout?>" class="modal fade" role="dialog" aria-hidden="true">    
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                           
                                                            Vista del documento <?=$validacion->negocio_nombre ?>
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
                                                  
                                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
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



