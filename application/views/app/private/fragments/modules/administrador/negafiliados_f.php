
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                        Negocios Afiliados
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                    Origen alta
                                    </th>
                                    <th th scope="col">
                                        Fecha afiliación
                                    </th>
                                    <th scope="col">
                                        Nombre comercio
                                    </th>
                                    <th scope="col">
                                        Membresia elegida
                                    </th>
                                    <th th scope="col">
                                        Usuario desde
                                    </th>
                                    <th scope="col">
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                                <?php 
                                    if(isset($comercios)){ 
                                        foreach($comercios as $c){
                                            if($c->estatus==26){
                                                $proc='Proceso completado';
                                            }else if($c->estatus==25){
                                                $proc='En espera de validacion';
                                            }else if($c->estatus==24){
                                                $proc='Afiliacion solicitada';
                                            } 
                                ?>
                                <tr>   
                                    <th>
                                        <?php if(isset($c->afiliador)){ echo $c->afiliador;  }else{ echo 'Autofiliacion'; } ?>
                                        
                                    </th>
                                    
                                    <th>
                                        
                                        <?php if(isset($c->inicio_afiliacion)){ echo fancy_date($c->inicio_afiliacion,'d-m-y');  }else{ echo 'Afiliacion aun en proceso'; } ?>
                                    </th> 

                                    <th>
                                    <div align='center'>  
                                            <?php
                                            if($c->negocio_logo != null){
                                                ?>
                                                <img src="<?=base_url().'static/uploads/perfil/'.$c->negocio_logo?>" alt="<?php  echo($c->negocio_nombre); ?> "  class="img-fluid d-block mx-auto" style="max-height: 60px !important;">
                                                <?php
                                            }else{
                                                ?>
                                                <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> alt="<?php  echo($c->negocio_nombre); ?>" class="img-fluid d-block mx-auto" style="max-height: 60px !important;">
                                                <?php
                                            } ?> 
                                                <?= $c->negocio_nombre ?>   
                                        </div>
                                    </th> 

                                    <th>
                                        
                                    <?= $c->tipo ?>  
                                    </th> 

                                    <th>
                                    <?= fancy_date($c->fecha_creacion,'d-m-y'); ?>
                                    </th> 
                                    
                                    <th>
                                            <?= $proc ?>
                                    </th>      
                                </tr> 
                                <?php 
                            
                                        } 
                                    }    
                            ?>     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>