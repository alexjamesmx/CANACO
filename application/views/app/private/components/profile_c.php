<?php 
$arr_tipo_actividad = array(
    '1' => 'Productos',
    '2' => 'Servicios',
    '3' => 'Productos y servicios'
);

    if(isset($coms)){ ?>
    <div class='row'> 
        <?php
        $match = array_map("unserialize", array_unique(array_map("serialize", $coms)));
        foreach ($match as $row) { ?>
                        <div>                                                        
                            <div class="m-3 mb-5">
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
                                 <br>
                                <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                    <div class=" align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                        <a class="w-100 w-sm-100">
                                            <div style="" class="list-item-heading mb-0 truncate">
                                                <?php  echo($row->negocio_nombre); ?><br> 
                                                <small class="text-muted">
                                                    <?php echo($row->negocio_razon); ?>
                                                </small>
                                                <hr>
                                                <div style = "" class="mb-4">
                                                    <?php if(isset($row->negocio_rfc)){ ?>
                                                    
                                                        <i class='fas fa-check'></i>  Este comercio factura 
                                                    <?php }else{ echo '<i class="fas fa-times"></i>  Este Comercio No Factura'; } ?>  
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
                                                    <strong><?= $row->negocio_vent_whatsp ?></strong> 
                                                   
                                                </div>
                                                <div class="mb-1">
                                                    Correo de ventas:
                                                    <br>
                                                    <i class="fas fa-envelope d-inline-block mb-4"></i> 
                                                    <strong><?= $row->negocio_vent_correo ?></strong> 
                                                </div>
                                                <div> 
                                                    <?php  if(isset($keys)){ ?>   
                                                        <br>
                                                        <b onclick='$(".group-keyword<?= $row->negocio_id ?>").slideToggle(400)' style="color: #69b800;">Mostrar Keywords</b>
                                                    <div class='group-keyword<?= $row->negocio_id ?>' style="display: none;">
                                                        <ul>
                                                            <?php  foreach($keys as $key){ ?>
                                                                <span class="badge  badge-outline-theme-3 m-1" style="font-size: 1.0em !important; display: flex">
                                                                    <i class="fas fa-hashtag fa-xs"></i>
                                                                    <?= $key->keyword; ?> 
                                                                </span>
                                                            <?php  } ?>
                                                        </ul>
                                                    </div>
                                                    <?php  } ?>
                                                </div>
                                                <div>  
                                                        <b onclick='$(".group-medallas<?= $row->negocio_id ?>").slideToggle(400)' style="color: #69b800;">Mostrar Medallas</b>
                                                    <div class='group-medallas<?= $row->negocio_id ?>' style="display: none;">
                                                        <ul>
                                                            <div class = "row">
                                                            <?php if(isset($medallas)){ ?>
                                                                <br>
                                                                <b>Medallas: </b> 
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <br>
                                                                
                                                                <?php foreach($medallas as $meds){ ?>
                                                                    <button class="btn" style="display: inline-block"> 
                                                                        <img src="<?=base_url('static/recompensas/medallas/'.$meds->medalla_img)?>"
                                                                        class="img-fluid d-block mx-auto "
                                                                        style="max-height: 25px;" disabled>
                                                                    </button>                    
                                                                <?php }
                                                                    }else{
                                                                        echo 'No hay medallas para mostrar'; 
                                                                    }?>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div>  
                                                    <b onclick='$(".group-insignias<?= $row->negocio_id ?>").slideToggle(400)' style="color: #69b800;">Mostrar Insignias</b>
                                                    <div class='group-insignias<?= $row->negocio_id ?>' style="display: none;">
                                                        <ul>
                                                            <div class = "row">
                                                            <?php if(isset($insignias)){ ?>
                                                                <br>
                                                                <b>Insignias: </b> 
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <?php  foreach($insignias as $insig){ ?>
                                                                   
                                                                    <button class="btn  p-1" style="display: flex"> 
                                                                        <img src="<?=base_url('static/recompensas/insignias/'.$insig->insignia_img)?>"
                                                                        class="img-fluid d-block mx-auto "
                                                                        style="max-height: 30px; " disabled>
                                                                    </button>                     
                                                                <?php }
                                                            }else{
                                                                echo 'No hay insignias para mostrar'; 
                                                            } ?> 
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div>                
                                                <button  class="btn btn-link m-0 p-0" onclick="window.open('<?=base_url()?>/app/perfil/perfil_publico/<?=$row->usuario_id?>', '_blank')">
                                                    <strong>
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