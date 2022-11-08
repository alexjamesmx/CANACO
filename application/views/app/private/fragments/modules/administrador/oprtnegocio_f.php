<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Oportunidades de negocio
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th>
                                        Nombre comercio
                                    </th>
                                    <th th scope="col">
                                        Requerimiento
                                    </th>
                                    <th scope="col">
                                        Estado
                                    </th>
                                    <th th scope="col">
                                        Fecha
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                                <?php if(isset($reqs)){ 
                                        foreach($reqs as $r){   
                                            $estado='';
                                            if($r->estatus==17){
                                                $estado='Esperando respuesta';
                                            }else if($r->estatus==18){
                                                $estado='Requerimiento aceptado';
                                            }else if($r->estatus==19){
                                                $estado='Oportunidad rechazada';
                                            }else if($r->estatus==20){
                                                $estado='Hay un comercio seleccionado para este requerimiento';
                                            }else if($r->estatus==21){
                                                $estado='Requerimiento solventado dentro de la plataforma';
                                            }else if($r->estatus==22){
                                                 $estado='Requerimiento solventado fuera de la plataforma';
                                            }else if($r->estatus==23){
                                                $estado='Requerimiento no solventado y/o republicado';

                                            }
                                ?>

                                <tr>
                                    <td>
                                        <div align='center'>  
                                            <?php
                                            if($r->negocio_logo != null){
                                                ?>
                                                <img src="<?=base_url().'static/uploads/perfil/'.$r->negocio_logo?>" alt="<?php  echo($r->negocio_nombre); ?> "  class="img-fluid d-block mx-auto" style="max-height: 60px !important;">
                                                <?php
                                            }else{
                                                ?>
                                                <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> alt="<?php  echo($r->negocio_nombre); ?>" class="img-fluid d-block mx-auto" style="max-height: 60px !important;">
                                                <?php
                                            } ?> 
                                                <?= $r->negocio_nombre ?>   
                                        </div>
                                    </td>
                                         
                                    
                                    <td>
                                        <div>
                                            <h5 class="p-0 m-0 mb-6"><strong>Comercio que solicita: </strong><?= $r->negocio_nombre ?></h5>
                                            <h5 class="p-0 m-0 mb-6"><strong>Lo que esta buscando: </strong><?= $r->busq_nec ?></h5>
                                            <h5 class="p-0 m-0 mb-6"><strong>Especificaciones técnicas: </strong><?= $r->especificaciones ?></h5>
                                            <h5 class="p-0 m-0 mb-6"><strong>Cantidad: </strong><?= $r->qty ?></h5>
                                        </div>  
                                    </td>
                                    <td>
                                        <?= $estado ?>
                                    </td>
                                    
                                    <td>
                                    <?=   fancy_date($r->fecha_req,'d-m-y')  ?>
                                    </td>
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