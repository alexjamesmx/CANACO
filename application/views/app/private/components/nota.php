<?php 
  if(isset($notas)){
  foreach($notas as $nota){
    ?>
    <div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="text-center">
                    <div class="container">
                        <div class="row">
                            <?php $separar = (explode(" ",$nota->fecha_nota)); ?>
                            <div class="col-6"> <?=   fancy_date($separar[0],'d-m-y')  ?></div>
                            <div class="col-6">Hora: <?=$separar[1]?></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                               <b> <?=$nota->titulo?> </b>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?=$nota->texto?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End cards-->
    <?php
}//end foreach
  }//end if isset
?>