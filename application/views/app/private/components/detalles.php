<?php 
    if(isset($detalles)){
        $i=0;                                            
        foreach($detalles as $det){
            //var_dump($det);
?>  
<div class='my-3 col-lg-4 col-md-6 col-12'>
    <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="container">
                        <div class="row">
                            <?php $separar = (explode(" ",$det->fecha_detalle)); ?>

                            <div class="col-6">Fecha <?=$separar[0]?></div>
                            <div class="col-6">Hora: <?=$separar[1]?></div>
                           
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                               <b>  <?=$det->negocio_nombre ?> </b>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                 <?= $det->accion ?> 
                            </div>
                        </div>
                    </div>


                    
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <b> Mensaje: </b>
                            </div>
                        </div>
                    </div>

                    
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                 <?= $det->mensaje ?> 
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="container" >
                        <div class="row">
                            <div class="col-6">
                                  </div>
                                    <?php if($det->estatus_detalle==30){ ?> 
                                        <div class="col-6" id='<?=$det->id_detalle.'noleido'?>' style='display: flex'>
                                            <button class="btn btn-dark default btn-default" onclick='noleido("<?=$det->id_detalle?>")'>
                                                    Marcar como no leido
                                            </button>
                                        </div>
                                        <div class="col-6" id='<?=$det->id_detalle.'leido'?>' style='display: none'>
                                            <button class="btn btn-success default btn-default" onclick='leido("<?=$det->id_detalle?>")'>
                                                    Marcar como leido
                                            </button>
                                        </div>
                                    <?php  } if($det->estatus_detalle==31){ ?> 
                                        <div class="col-6" id='<?=$det->id_detalle.'noleido'?>' style='display: none'>
                                            <button class="btn btn-dark default btn-default" onclick='noleido("<?=$det->id_detalle?>")'>
                                                    Marcar como no leido
                                            </button>
                                        </div>
                                        <div class="col-6" id='<?=$det->id_detalle.'leido'?>' style='display: flex'>
                                            <button class="btn btn-success default btn-default" onclick='leido("<?=$det->id_detalle?>")'>
                                                    Marcar como leido
                                            </button>
                                        </div>
                                    <?php  } ?> 
                                     
                                    
                                    
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
  
</div>
     
<?php }//end foreach 
    }

?>  
  
  
