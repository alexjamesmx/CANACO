<?php 
var_dump($detalles);
if(isset($detalles)){
        $i=0;                                            
        foreach($detalles as $det){
?>  


<div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-4">
        <div class="card ">
            <div class="card-body">
            <h5 class=" card-title mb-4">
                            <i class="simple-icon-list"></i>
                           Seguimiento del requerimiento
                        </h5>
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
                                <b> Mensaje: <b>
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

                </div>
            </div>
        </div>
    </div>
  
<?php }//end foreach 
    }

?>  
  
  
