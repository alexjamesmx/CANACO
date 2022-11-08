<?php 
$arr_tipo_actividad = array(
    '1' => 'Productos',
    '2' => 'Servicios',
    '3' => 'Productos y servicios'
);

    if(isset($match_usuarios) && count($match_usuarios)>0 ){ ?>
    <div class='row'> 
        <?php
        $match = array_map("unserialize", array_unique(array_map("serialize", $match_usuarios)));
        foreach ($match as $row) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" align='center'>
                                                        
                            <div class="card m-3">
                                <div align='center'>
                                    <?php
                                        if($row->negocio_logo != null){
                                    ?>
                                    <img src="<?=base_url().'static/uploads/perfil/'.$row->negocio_logo?>" alt="<?php  echo($row->negocio_nombre); ?> "  class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
                                    <?php
                                        }else{
                                    ?>
                                    <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> alt="<?php  echo($row->negocio_nombre); ?>" class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
                                    <?php
                                        } ?>

                              
                                </div>
                                <div class="pl-2 d-flex flex-grow-1 min-width-zero">

                                    <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                        <a href="#" onclick="clean()" class="w-100 w-sm-100">
                                            <div style="color: #69b800;" class="list-item-heading mb-0 truncate">
                                                <?php  echo($row->negocio_nombre); ?><br> 
                                                <small class="text-muted">
                                                    <?php echo($row->negocio_razon); ?>
                                                        
                                                </small>
                                                <hr>
                                                <div style = "" class="mb-4">
                                                    <span >
                                                        <?=$arr_tipo_actividad[$row->tipo_transaccion]?> en <br><?=$row->tipo_actividad?>
                                                    </span> 
                                                </div>
                                                
                                                <div style = "" class="mb-4">
                                                    <?php if(isset($row->negocio_rfc)){ ?>
                                                    
                                                    Este Comercion Factura <i class='fas fa-check'></i>
                                                    <?php }else{ echo 'Este Comercio No Factura <i class="fas fa-times"></i>'; } ?>  
                                                </div>

                                                
                                                <div class="mb-4">
                                                    Valoración promedio
                                                    <br>
                                                    <i class="fas fa-star"></i> 
                                                    <strong><?= $row->negocio_calif  ?> / 5</strong>     
                                                </div>

                                                <div class="mb-1">
                                                    Whatsapp de ventas:
                                                    <br>
                                                    <i class="fab fa-whatsapp d-inline-block mb-4"></i>
                                                  
                                                    <strong><?=substr_replace($row->negocio_vent_whatsp,'********',0,7)  ?></strong> 
                                                   
                                                </div>
                                                <div class="mb-1">
                                                    Correo de ventas de ventas:
                                                    <br>
                                                    <i class="fas fa-envelope d-inline-block mb-4"></i> 
                                                    <strong><?= $row->negocio_vent_correo ?></strong> 
                                                </div>
                                                <button  class="btn btn-link m-0 p-0">
                                                    <strong style="color: #69b800;">
                                                        <i  class="fas fa-plus"></i> 
                                                        Mas información
                                                    </strong>
                                                </button>
                                            </div>
                                        </a>  
                                    </div>
                                </div>
                            </div>
                        
                    </div>
            <?php   } ?>
</div>
<?php   }else{ ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" align='center'>
            <div class="card m-3" align='center'>
              
            <img src="<?=base_url('static/images/losentimos.png')?>"
                                        class="img-fluid d-block mx-auto"
                                        style="max-height: 930px !important;">
            </div>
        </div>


    <?php } ?>