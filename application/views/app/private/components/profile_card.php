<?php 
$arr_tipo_actividad = array(
    '1' => 'Productos',
    '2' => 'Servicios',
    '3' => 'Productos y servicios'
);
if(isset($coms)){
?>
<div class = "row" style = "width :100%">
    <div class = "col">
    <div >
    <?php 
    if($coms[0]->negocio_logo != null){
        ?>
        <img src="<?=base_url().'static/uploads/perfil/'.$coms[0]->negocio_logo?>" alt="<?php  echo($coms[0]->negocio_nombre); ?> "  class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
        <?php
    }else{
        ?>
        <img src=<?=base_url().'static/uploads/archivos/logo_default.png'?> alt="<?php  echo($coms[0]->negocio_nombre); ?>" class="img-fluid d-block mx-auto" style="max-height: 150px !important;">
        <?php
    } ?>
    </div>
    <div>
        <small >
            <div>
            <?=($coms[0]->negocio_nombre); ?>&nbsp;
            </div>
            <div>
            <?=($coms[0]->negocio_razon); ?>
                        &nbsp;
                    <?= fancy_date(
                        $coms[0]->fecha_creacion,
                        'd-m-y'
                    ) ?>
            </div>
            <div>
            <?php if(isset($comms[0]->negocio_rfc)){ ?>
                 Este Comercion Factura
            <?php }else{ echo 'Este Comercio No Factura'; } ?>
                    <br>
            </div>
            <div>
             <br>   
            <strong>Requerimientos solventados: <?= $transaccionesf ?></strong>
            <br>   
            <strong>Transacciones completadas: <?= $transaccionesc ?></strong>
            <br>
                <strong>Calificacion promedio: <?=$coms[0]->negocio_calif?></strong><br>
                <?php
                    $e = intdiv($coms[0]->negocio_calif,1);
                    $r = fmod($coms[0]->negocio_calif, 1);
                    for ($i=1; $i <= $e; $i++) { 
                ?>
                        <i class="fas fa-star"></i>
                <?php
                    }
                    if(($r)>0){
                        echo '<i class="fas fa-star-half"></i>';
                    } 
                ?> 
            <br>
            
            </div>    
            <div>
            &nbsp;
            <?php 
                if(isset($coms[0]->negocio_vent_whatsp)){
                    echo('<b>Whatsapp de ventas: </b>'.$coms[0]->negocio_vent_whatsp.'<br>');
                }else{
                    echo 'Este comercio no tiene numero de whatsapp disponible <br>';
                }
            ?>

            <?php 
                if(isset($coms[0]->negocio_vent_correo)){
                    echo('<b>Correo de ventas: </b>'.$coms[0]->negocio_vent_correo.'<br>');
                }else{
                    echo 'Este comercio no tiene correo de ventas disponible <br>';
                }
            ?>
            &nbsp;
            <?php 
                if(isset($coms[0]->negocio_liga_ecomers)){
                    echo('<b>Ecommerce: </b>'.$coms[0]->negocio_liga_ecomers.'<br>');
                }
            ?>
            &nbsp;
            </div>
            <div>
                <span>
                    <div>
                        <?php if(isset($kwac)){ ?>  <b><?=$arr_tipo_actividad[$kwac[0]->tipo_transaccion]?> en: </b>
                    </div>
                    <div>
                        <?=str_replace(",", "<br>-", $kwac[0]->tipo_actividad)?>
                            <?php }else{ ?>
                            <b>Este perfil no cuenta con keywords</b>
                        <?php } ?>
                    </div>
                </span>
                <hr>

                <div>
                    <?php  if(isset($keys)){ ?>   
                        <br>
                        <b onclick='$(".group-keyword").slideToggle(400)'>Mostrar Keywords</b>
                    <div class='group-keyword' style="display: none;">
                    <ul>
                        <?php  foreach($keys as $key){ ?>
                            
                                <span class="badge  badge-outline-theme-3 m-1" style="font-size: 1.0em !important; display: inline-block;">
                                    <i class="fas fa-hashtag fa-xs"></i>
                                    <?= $key->keyword; ?> 
                                </span>
                        <?php  } }?>
                    </ul>
                </div>

                <div class = "container">
                    <div class = "row">
                    <?php if(isset($medallas)){ ?>
                        <br>
                        <b>Medallas: </b> 
                        <?php foreach($medallas as $meds){ ?>
                            <button class="btn  p-2 m-2" style="display: inline-block"> 
                                <img src="<?=base_url('static/recompensas/medallas/'.$meds->medalla_img)?>"
                                class="img-fluid d-block mx-auto "
                                style="max-height: 25px;" disabled>
                            </button>                    
                        <?php }
                            }else{
                                echo 'No hay medallas para mostrar'; 
                            }?>
                    </div>
                </div>
                
                <hr>
                <div>
                    <?php if(isset($insignias)){ ?>
                        <br>
                        <b>Insignias: </b> 
                        <br>
                      <?php  foreach($insignias as $insig){ ?>
                            <button class="btn  p-2 m-2" style="display: inline-block"> 
                                <img src="<?=base_url('static/recompensas/insignias/'.$insig->insignia_img)?>"
                                class="img-fluid d-block mx-auto "
                                style="max-height: 45px; " disabled>
                            </button>                     
                        <?php }
                    }else{
                        echo 'No hay insignias para mostrar'; 
                    } ?> 
                </div>
            </div>
        </small>
    </div>
    </div>  
</div>
<?php
}
?>