
<div class="row">
        <div class="col-12 mb-2 mb-4">
            <div class="card">
                <div class="card-body">
                <h5 class=" card-title mb-4">
                        <i class="simple-icon-list"></i>
                    Tractoras
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
                                    <th scope="col">
                                            Acciones
                                    </th>
                                 
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                            <?php if(isset($tractoras)){ foreach($tractoras as $tractora){ $identiificador = 'id'.$tractora->negocio_id;  ?>
                                            <tr>
                                                <td>
                                                <strong>    #<?=  $tractora->negocio_id ?> </strong>
                                                <br>
                                                <?=  $tractora->negocio_nombre ?>
                                                </td>
                                                <td> 
                                                <?=  $tractora->negocio_razon ?>
                                                <br>
                                                Rfc:
                                                <strong>
                                                <?=  $tractora->negocio_rfc ?>
                                                </strong>   
                                                </td>
                                                <td>
                                                    <?php foreach($afiliadores as $afiliador){ ?>
                                                   <?php if($tractora->afiliador == $afiliador->usuario_id){ ?>
                                                        <?=  $afiliador->nombre ?>

                                                    <?php } } ?>
                                                </td>
                                                <td>
                                                <button type="button" onclick="abrimodal(<?=$identiificador?>)" 
                                                class="btn btn-primary default" name="actualizar" id="actualizar">
                                                <i class="fas fa-retweet"></i>
                                                    Modificar información
                                                </button>
                                                </td>
                                            </tr>
                                              <!-- inicio modal -->
                                <div  id="<?= $identiificador?>"  class="modal fade" role="dialog" aria-hidden="true">    
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="fas fa-eye"></i>
                                                    Editar la Información de :  
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
                                                         <form id="form-edit-myaccount"
                                            class="validate-ptp" method="post" data-type="json">
                                            <div class="form-row">
                                                <div class="form-group col-sm-4">
                                                    <label for="nombre">
                                                        <sup><i class="fas fa-asterisk text-danger"
                                                            style="font-size: 0.7em;"></i></sup>
                                                            Nombre empresa:
                                                        </label>
                                                        <input type="text" name="nombre<?=$tractora->negocio_id?>" 
                                                        id="nombre<?=$tractora->negocio_id?>"
                                                        class="form-control required" required
                                                        maxlength="40" value="<?= $tractora->negocio_nombre?> ">
                                                        <small class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="razon">
                                                                negocio razón:
                                                            </label>
                                                            <input type="text" name="razon<?=$tractora->negocio_id?>" 
                                                            id="razon<?=$tractora->negocio_id?>"
                                                            class="form-control" maxlength="40"
                                                            value="<?= $tractora->negocio_razon?>">
                                                            <small class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="rfc">
                                                                negocio rfc:
                                                            </label>
                                                            <input type="text" name="rfc<?=$tractora->negocio_id?>" 
                                                            id="rfc<?=$tractora->negocio_id?>"
                                                            class="form-control" maxlength="40"
                                                            value="<?= $tractora->negocio_rfc?>">
                                                            <small class="form-text text-muted">
                                                            </small>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="col-sm-12 form-group mt-3 d-flex justify-content-end">
                                                            <button class="btn btn-primary default btn-lg"  onclick="actualizar_tractora(<?=$tractora->negocio_id?>)">
                                                                <i class="fas fa-check"></i>
                                                                actualizar
                                                            </button>
                                                            <div class="col-1"></div>
                                                            <button class="btn btn-danger default btn-lg"
                                                            id="deactivar"
                                                             data-dismiss="modal" aria-label="Close" >
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>