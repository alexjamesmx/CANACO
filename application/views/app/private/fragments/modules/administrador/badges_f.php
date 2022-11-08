
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    top 20 comercios con mas badges obtenidos
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                
                                <tr>
                                <th>Nombre de comercio</th>
                                    <th>Medallas</th>
                                   <th>Insignias</th>
                                    <th>Total</th>
                                    <th>Notas</th>
                                </tr>
                               
                            </thead>
                            <tbody id="tbodyContent" >
                            <?php if(isset($top20)) {    ?>                            
                           
                             <?php foreach($top20 as $comercio) :  ?>
                                <tr>
                                    <th><?= $comercio->usuario_id ?>
                                    <br>
                                    <strong> <?= $comercio->negocio_nombre ?> </strong>
                                    <br>
                                    <hr>
                                    <?php if (is_null($comercio->negocio_logo)){?>
                                    <img src="<?=base_url('static/uploads/archivos/logo_default.png')?>"
                                    alt="Impactos Digitales" class="img-fluid d-block mx-auto"
                                     style="max-height: 80px !important;">
                                    <?php }else{?>
                                        <img src="<?=base_url('static/uploads/perfil/'.$comercio->negocio_logo)?>"
                                        alt="Impactos Digitales" class="img-fluid d-block mx-auto" 
                                        style="max-height: 80px !important;">
                                    <?php }?>
                                    </th>
                                    <th>
                                   <?= $comercio->num_medallas ?>
                                    </th>
                                    <th>
                                   <?= $comercio->num_insignias ?></th>                                
                                  
                                  <th> <?= $comercio->num_recompensas ?></th>                                
                                  <th>
                                         <a class="btn btn-primary default btn-default" onclick=''
                                          href="<?= base_url() .
                                          'app/administrador/detalleseguimiento/' .
                                           $comercio->usuario_id ?>">
                                           Seguimiento
                                         </a>
                                  </th>
                                </tr>    
                                <?php endforeach; }else{?>
                                    <h2>Aun no se tienen datos</h2>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>