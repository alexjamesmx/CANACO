
<div class="row">
    <div class="col-12 mb-2 mb-4">

        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Afiliaciones
                    <div id="Lista_afiliaciones"><span class="text-primary float-right"><small>Mostrando 0 de 0</small></span></div>
                </h5>
                <div class="col-md-12">
                    <div class="no-more-tables">
                    </div>
                    <div id="tablaAfiliados"><table id="controls-data-tables-pagination" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">
                                    N°
                                </th>
                                <th scope="col">
                                   Información
                                </th>
                                <th scope="col">
                                   Acciones
                                </th>
                            </tr>
                        </thead>
                            <!-- <?php var_dump($afliadores);?> -->
                            <?php if(!isset($afliadores)){} else{ ?>
                            <?php    foreach($afliadores as $afiliador){ ?>
                            <tr>
                                <?php $identiificador = ('id'.$afiliador->usuario_id);?>
                                <?php $desactivar = ('no'.$afiliador->usuario_id);?>
                                <?php $activarm = ('ie'.$afiliador->usuario_id);?>
                                <th scope="col">
                                    <div class='container'>
                                        #<?=$afiliador->usuario_id?>
                                    </div>
                                </th>
                                <th scope="col">
                                <div class='container'>
                                    <?=$afiliador->nombre?>
                                    <?=$afiliador->apellido1?>
                                    <?=$afiliador->apellido2?> 
                                </div>                               
                                </th>
                                <th scope="col"> 
                                <div class='container'>

                                    <button class="btn btn-primary default btn-default" onclick="abrimodal(<?= $identiificador?>)" >
                                    <i class="fas fa-edit"></i>
                                        <br>
                                        Modificar informacion
                                    </button>
                                       <?php  if($afiliador->estatus_id==3) { ?>                                   
                                            <button class="btn btn-danger default btn-default" onclick="abrimodal(<?= $desactivar?>)" >
                                                <i class="fas fa-ban"></i>
                                                <br>
                                                Desactivar cuenta
                                            </button>
                                        <?php } else if($afiliador->estatus_id==4){ ?>
                                            <button class="btn btn-success default btn-default" onclick="abrimodal(<?=$activarm?>)" >
                                            <i class="fas fa-check-circle"></i>
                                                <br>
                                                Activar_cuenta
                                            </button>
                                        <?php }?>
                                </div>
                                </th>
                            </tr>
                            
                         <!-- inicio modal -->
                            <div  id="<?= $identiificador?>"  class="modal fade" role="dialog" aria-hidden="true">    
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="fas fa-eye"></i>
                                                    Editar la Información de :    <?=$afiliador->nombre?>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </button>
                                            </div>
                                           <div class="modal-body">
                                           <form id="form-edit-myaccount"
                                            class="validate-ptp" method="post" data-type="json">
                                            <div class="form-row">
                                                <div class="form-group col-sm-4">
                                                    <label for="nombre">
                                                        <sup><i class="fas fa-asterisk text-danger"
                                                            style="font-size: 0.7em;"></i></sup>
                                                            Nombre:
                                                        </label>
                                                        <input type="text" name="nombre<?=$afiliador->usuario_id?>" 
                                                        id="nombre<?=$afiliador->usuario_id?>"
                                                        class="form-control required" required
                                                        maxlength="40" value="<?=$afiliador->nombre?> ">
                                                        <small class="form-text text-muted">
                                                     
                                                        </small>
                                                    </div>

                                                    <div class="form-group col-sm-4">
                                                        <label for="apellido1">
                                                            <sup><i class="fas fa-asterisk text-danger"
                                                                style="font-size: 0.7em;"></i></sup>
                                                                Primer apellido:
                                                            </label>
                                                            <input type="text" name="apellido1<?=$afiliador->usuario_id?>"
                                                             id="apellido1<?=$afiliador->usuario_id?>"
                                                            class="form-control required" required
                                                            maxlength="40"
                                                            value="<?=$afiliador->apellido1?>">
                                                            <small class="form-text text-muted">
                                                             
                                                            </small>
                                                        </div>

                                                        <div class="form-group col-sm-4">
                                                            <label for="apellido2">
                                                                Segundo apellido:
                                                            </label>
                                                            <input type="text" name="apellido2<?=$afiliador->usuario_id?>" 
                                                            id="apellido2<?=$afiliador->usuario_id?>"
                                                            class="form-control" maxlength="40"
                                                            value="<?=$afiliador->apellido2?>">
                                                            <small class="form-text text-muted">
                                                            
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">

                                                        <div class="form-group col-sm-6">
                                                            <label for="telefono_auth">
                                                                <sup><i class="fas fa-asterisk text-danger"
                                                                    style="font-size: 0.7em;"></i></sup>
                                                                    Teléfono:
                                                                </label>
                                                                <input type="tel" name="telefono_auth<?=$afiliador->usuario_id?>"
                                                                id="telefono_auth<?=$afiliador->usuario_id?>"
                                                                class="form-control required local-phone" required
                                                                maxlength="15"
                                                                value="<?=$afiliador->telefono_auth?>">
                                                                <small class="form-text text-muted">
                                                                    &nbsp;
                                                                </small>
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <label for="telefono_auth_c">
                                                                    <sup><i class="fas fa-asterisk text-danger"
                                                                        style="font-size: 0.7em;"></i></sup>
                                                                        Confirmar teléfono:
                                                                    </label>
                                                                    <input type="tel"  name="telefono_auth_c<?=$afiliador->usuario_id?>"
                                                                    id="telefono_auth_c<?=$afiliador->usuario_id?>"
                                                                    class="form-control required local-phone" required
                                                                    maxlength="15"
                                                                    value="<?=$afiliador->telefono_auth?>">
                                                                    <small class="form-text text-muted">
                                                                        &nbsp;
                                                                    </small>
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <label for="email_auth">
                                                                        <sup><i class="fas fa-asterisk text-danger"
                                                                            style="font-size: 0.7em;"></i></sup>
                                                                            E-mail:
                                                                        </label>
                                                                        <input type="email" disabled=true name="email_auth<?=$afiliador->usuario_id?>" 
                                                                        id="email_auth<?=$afiliador->usuario_id?>"
                                                                        class="form-control required" required
                                                                        maxlength="70"
                                                                        value="<?=$afiliador->email_auth?>">
                                                                        <small class="form-text text-muted">
                                                                            &nbsp;
                                                                        </small>
                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <label for="email_auth_c">
                                                                            <sup><i class="fas fa-asterisk text-danger"
                                                                                style="font-size: 0.7em;"></i></sup>
                                                                                Confirmar e-mail: 
                                                                            </label>
                                                                            <input type="email" disabled=true  name="email_auth_c<?=$afiliador->usuario_id?>"
                                                                            id="email_auth_c<?=$afiliador->usuario_id?>" class="form-control required"
                                                                            required maxlength="70"
                                                                            value="<?=$afiliador->email_auth?>">
                                                                            <small class="form-text text-muted">
                                                                                &nbsp;
                                                                            </small>
                                                                        </div>    
                                            </form>
                                            <div class="col-sm-12 form-group mt-3 d-flex justify-content-end">
                                                            <button class="btn btn-primary default btn-lg"  onclick="actualizar(<?=$afiliador->usuario_id?>)">
                                                                <i class="fas fa-check"></i>
                                                                actualizar
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
                                </div>
                                <!-- fin modal -->
   
                                <!-- inicio modal -->
                                        <div  id="<?= $desactivar?>" class="modal fade" role="dialog" aria-hidden="true">    
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-eye"></i>
                                                                Desactivar
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
                                                                    Para desactivar este afiliador por favor escribe "DESACTIVAR"
                                                            </label>
                                                            <input type="text " autocomplete="off" name="desactivar<?=$afiliador->usuario_id?>" id="desactivar<?=$afiliador->usuario_id?>" class="form-control required" >
                                                        </div>
                                                        <div class="col-sm-12 form-group mt-3 d-flex justify-content-end">
                                                            <button class="btn btn-primary default btn-lg"  id="deactivar"
                                                            onclick="desactivar_afiliador(<?=$afiliador->usuario_id?>)">
                                                                <i class="fas fa-check"></i>
                                                                Desactivar
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
                                                                        <input type="text " autocomplete="off" name="activar<?=$afiliador->usuario_id?>" id="activar<?=$afiliador->usuario_id?>" class="form-control required" >
                                                                    </div>
                                                                    <div class="col-sm-12 form-group mt-3 d-flex justify-content-end">
                                                                        <button class="btn btn-primary default btn-lg"  id="bt-activar"
                                                                        onclick="activar_afiliador(<?=$afiliador->usuario_id?>)">
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














                            <?php }}?>
                    </table></div>
                </div>
            </div>

        </div>
    </div>
</div>