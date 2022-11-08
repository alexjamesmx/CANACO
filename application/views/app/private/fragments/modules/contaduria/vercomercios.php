
<div class="row">
        <div class="col-12 mb-2 mb-4">
            <div class="card">
                <div class="card-body">
                <h5 class=" card-title mb-4">
                        <i class="simple-icon-list"></i>
                        Mis negocios
                    </h5>
                <div class="col-md-12 table-responsive">
                        <div class="no-more-tables ">
                        </div>
                    <div id="tablaAfiliados" style = "display: block;overflow-x: auto;" >
                        <table id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            Comercio información
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
                            <?php if(isset($miscomercios)){ foreach($miscomercios as $comercio){  ?>
                                            <tr>
                                                <td>
                                                <strong> # <?= $comercio->negocio_id  ?>  </strong>
                                                <br>
                                                <?= $comercio-> negocio_nombre  ?>
                                                <div class = "col">
                                                <div >
                                                <?php 
                                                if($comercio->negocio_logo != null){
                                                    ?>
                                                    <img src="<?=base_url().'static/uploads/perfil/'.$comercio->negocio_logo?>" 
                                                    alt="<?=  $comercio->negocio_nombre ?> "  class="img-fluid d-block mx-auto" 
                                                    style="max-height: 150px !important;">
                                                    <?php
                                                }else{
                                                    ?>
                                                    <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> 
                                                    alt="<?php  echo($comercio->negocio_nombre); ?>" class="img-fluid d-block mx-auto" 
                                                    style="max-height: 150px !important;">
                                                    <?php
                                                } ?>
                                                </div>
                                                <div> 
                                                </td>
                                                <td> 
                                                <strong> # <?= $comercio->usuario_id  ?>  </strong>
                                                <br>
                                                nombre del dueño: 
                                                <br>
                                                   <?= $comercio->nombre ?>  
                                                   <?= $comercio->apellido1 ?>
                                                   <?= $comercio->apellido2 ?>    
                                                </td>
                                                <td>
                                                    <?= $comercio->email_auth ?>
                                                    <br>
                                                    <?= $comercio->telefono_auth ?>
                                                </td>
                                                <td>
                                                <?= $comercio->fecha_creacion ?>
                                                </td>
                                            </tr>
                                            <?php }}else {?>
                                                <td>
                                                Aun no tienes negocios
                                                </td>
                                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>