
<div id="medalla" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        
        <?php   $tama = count($recompensas) ;  $tama =  $tama-1?>
             <div class="modal-header text-center">
                <h5 class="modal-title text-center mb-12">
                    <i class="fas fa-plus "></i>
                 Nuevas Recompensas
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="text-center mb-12">
                        <h1 class="text-center mb-12"> Felicidades por tus nuevas recompensas </h1>
                        <br>
                        <?php for($i=0; $i <= $tama ; $i++) {  $bandera=0; ?>

                                        <?php foreach ($recompensas[$i] as $recompensa ) { $bandera= $bandera+1;?>
                                            <?php if($bandera < 4 and $bandera != 1){ ?>
                                                <strong> <?= $recompensa ?> </strong>
                                                <br> 
                                            <?php } ?>

                                            <?php if($bandera==4){ ?>
                                                <img src="<?=base_url('static/recompensas/juntas/'.$recompensa)?>"
                                                class="img-fluid d-block mx-auto avatar avatar-small"
                                                style="max-height: 60px;   " >
                                            <?php } ?>
                                        <?php } ?>
                                        <hr>
                           <?php }?>
                    </div>
                    <div class="col-sm-12 text-center">
                                    <a  class="btn btn-primary default btn-lg" href="<?=base_url('app/myaccount/awards')?>"  >
                                        Ver detalles 
                                    </a> 
                    </div>
                    
            </div>
         </div>
    </div>
</div>
