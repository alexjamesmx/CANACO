<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Usuarios canaco
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados table-responsive" >
                        <table  id="lista_tbody"  
                        class="data-table nowrap table table-bordered table-striped " 
                        data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                <th>Nombre de comercio</th>
                                <th>Cambiar estatus</th>
                                <th>Notas</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                            <?php if(isset($comercios)) {    ?>                            
                             <?php foreach($comercios as $comercio) :  ?>
                                <?php $activarm = ('ie'.$comercio->usuario_id);?>
                                <?php $desactivar = ('no'.$comercio->usuario_id);?>
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
                                    <?php  if($comercio->estatus_id==3) { ?>                                   
                                            <button class="btn btn-danger default btn-default" onclick="abrimodal(<?= $desactivar?>)" >
                                                <i class="fas fa-ban"></i>
                                                <br>
                                                Desactivar cuenta
                                            </button>
                                        <?php } else if($comercio->estatus_id==4){ ?>
                                            <button class="btn btn-success default btn-default" onclick="abrimodal(<?=$activarm?>)" >
                                            <i class="fas fa-check-circle"></i>
                                                <br>
                                                Activar_cuenta
                                            </button>
                                        <?php }?>
                                    </th>                                    
                                  <th>
                                         <a class="btn btn-primary default btn-default" onclick=''
                                          href="<?= base_url() .
                                          'app/administrador/detalleseguimiento/' .
                                           $comercio->usuario_id ?>">
                                           Seguimiento
                                         </a>
                                  </th>
                                </tr>  
                                   <!-- inicio modal -->
                                           <div  id="<?= $activarm?>" class="modal fade" role="dialog" aria-hidden="true">    
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-eye"></i>
                                                                Activar
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">
                                                                    <i class="fas fa-times"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                                <div class="form-group col-sm-12">
                                                                        <label for="nombre_ventas">
                                                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                                                Para Activar este afiliador por favor escribe "ACTIVAR"
                                                                        </label>
                                                                        <input type="text " autocomplete="off" name="activar<?=$comercio->usuario_id?>" id="activar<?=$afiliador->usuario_id?>" class="form-control required" >
                                                                    </div>
                                                                    <div class="col-sm-12 form-group mt-3 d-flex justify-content-end">
                                                                        <button class="btn btn-primary default btn-lg"  id="bt-activar"
                                                                        onclick="activar_afiliador(<?=$comercio->usuario_id?>)">
                                                                            <i class="fas fa-check"></i>
                                                                            Activar
                                                                        </button>
                                                                        <div class="col-1"></div>
                                                                        <button class="btn btn-danger default btn-lg" data-dismiss="modal" aria-label="Close" >
                                                                            <i class="fas fa-times"></i>
                                                                            Cancelar
                                                                        </button>
                                                                    </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin modal -->
  
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


