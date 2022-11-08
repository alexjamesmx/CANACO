
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Requerimentos publicos 
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                    Que necesita 
                                    </th>
                                    <th scope="col">
                                    Para cuando lo necesita
                                    </th>
                                    <th th scope="col">
                                        Cantidad
                                    </th>
                                    <th scope="col">
                                        Especificaciones
                                    </th>
                                    <th scope="col">
                                        Fecha publicado
                                    </th>
                                    <th th scope="col">
                                        Notificados
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                                <?php if(isset($reqs)){ foreach($reqs as $r){?>
                            <tr>
                                    <th scope="col">
                                    <?= $r->busq_nec ?> 
                                    </th>
                                    <th scope="col">
                                         <?php if($r->entrega==1){ 
                                            echo'Urgente (1 a 3 dias)';
                                        }else if($r->entrega==2){ 
                                            
                                            echo'Prioritario (3 a 15 dias)';
                                        }else  if($r->entrega==3){  
                                            
                                            echo'Regular (Estandares de mercado)';
                                            
                                        }

                                            ?>
                                    </th>
                                    <th th scope="col">
                                    <?= $r->qty ?> 
                                    </th>
                                    <th scope="col">
                                    <?= $r->especificaciones ?> 
                                    </th>
                                    <th scope="col">
                                    <?= $r->fecha_req ?> 
                                    </th>
                                    <th th scope="col">
                                        Requerimiento publico
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