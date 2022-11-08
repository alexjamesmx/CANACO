<div class = "row">
    <div class="col-12 mb-2 mb-4">
        <div class = "card">
            <div class = "card-body" >
                <h5 class = "card-title mb-4">
                <i class="simple-icon-list"></i>
                    Top 20 empresas mejor valoradas
                </h5>
                <div class ="col-md-12">
                    <div>
                       <table class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                           <thead class="thead-dark">
                               <tr>
                                   <th>Clave del comercio</th>
                                   <th>Nombre comercio</th>
                                   <th>Numero de valoraciones</th>
                                   <th>Promedio de valoraciones</th>
                                   <th>Numero de transacciones</th>
                                   <th>Usuario desde</th>
                                   <th>Notas</th>
                               </tr>
                           </thead>
                           <tbody>
                                    <?php 
                                        if(isset($top20)){ 
                                            foreach($top20 as $element){
                                                if($element->negocio_calif>0){
                                                    ?>    
                                                        <tr>
                                                            <td>
                                                            <?= $element->negocio_id ?>
                                                            </td>

                                                            <td>
                                                            <div align='center'>  
                                                            <?php
                                                            if($element->negocio_logo != null){
                                                                ?>
                                                                <img src="<?=base_url().'static/uploads/perfil/'.$element->negocio_logo?>" alt="<?php  echo($element->negocio_nombre); ?> "  class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> alt="<?php  echo($element->negocio_nombre); ?>" class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
                                                                <?php
                                                            } ?> 
                                                                <?= $element->negocio_nombre ?>   
                                                            </div>
                                                            </td>
                                                            <td>
                                                                
                                                            <?= $element->num_evas ?>   
                                                            </td>
                                                            <td>
                                                                
                                                            <?= $element->negocio_calif ?>
                                                            </td>
                                                            <td>
                                                            <?= $element->num_trans ?>
                                                            </td>
                                                            
                                                            <td>
                                                            <div align='center'>
                                                                <?= fancy_date($element->fecha_creacion,'d-m-y') ?>
                                                            </div>
                                                            </td>

                                                            <td>
                                                            <a class="btn btn-primary default btn-default" onclick='' href="<?= base_url() .
                                                                'app/administrador/detalleseguimiento/' .
                                                                $element->usuario_id ?>">
                                                                Seguimiento
                                                            </a>
                                                            </td>
                                                            
                                                        
                                                        </tr>
                                                    <?php
                                                }
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



<div class = "row">
    <div class="col-12 mb-2 mb-4">
        <div class = "card">
            <div class = "card-body" >
                <h5 class = "card-title mb-4">
                <i class="simple-icon-list"></i>
                    Top 50 empresas peor valoradas
                </h5>
                <div class ="col-md-12">
                    <div>
                       <table class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                           <thead class="thead-dark">
                               <tr>
                                   <th>Clave del comercio</th>
                                   <th>Nombre comercio</th>
                                   <th>Numero de valoraciones</th>
                                   <th>Promedio de valoraciones</th>
                                   <th>Numero de transacciones</th>
                                   <th>Usuario desde</th>
                                   <th>Notas/reset</th>
                               </tr>
                           </thead>
                           <tbody>
                                    <?php 
                                        if(isset($top50)&&count($top50)>=50){ 
                                            foreach($top50 as $element){
                                                if($element->negocio_calif>0){
                                                    ?>    
                                                        <tr>
                                                            <td>
                                                            <?= $element->negocio_id ?>
                                                            </td>

                                                            <td>
                                                            <div align='center'>  
                                                            <?php
                                                            if($element->negocio_logo != null){
                                                                ?>
                                                                <img src="<?=base_url().'static/uploads/perfil/'.$element->negocio_logo?>" alt="<?php  echo($element->negocio_nombre); ?> "  class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> alt="<?php  echo($element->negocio_nombre); ?>" class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
                                                                <?php
                                                            } ?> 
                                                                <?= $element->negocio_nombre ?>   
                                                            </div>
                                                            </td>
                                                            <td>
                                                                
                                                            <?= $element->num_evas ?>   
                                                            </td>
                                                            <td>
                                                                
                                                            <?= $element->negocio_calif ?>
                                                            </td>
                                                            <td>
                                                            <?= $element->num_trans ?>
                                                            </td>
                                                            
                                                            <td>
                                                            <div align='center'>
                                                                <?= fancy_date($element->fecha_creacion,'d-m-y') ?>
                                                            </div>
                                                            </td>

                                                            <td>
                                                            <a class="btn btn-primary default btn-default" onclick='' href="<?= base_url() .
                                                                'app/administrador/detalleseguimiento/' .
                                                                $element->usuario_id ?>">
                                                                Seguimiento
                                                            </a>
                                                            </td>
                                                            
                                                        
                                                        </tr>
                                                    <?php
                                                }
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

