<div class="card mb-4">    
    <div class="card">
        <div class="card-body" id='mis_requerimientos'>
               <h5 class="counter-box text-center" class=" card-title mb-4">
                    <i class="simple-icon-badge"></i>
                     Mis reconocimientos
                </h5>
            <div class="col-md-12">

            <div class="counter-box text-center">
                <h1 class="mb-0 mt-6"> Recompensas obtenidas </h2> 
            </div>
            <div class="row text-center" id="counter">
            <?php if( is_null($insigniaU)){ ?>
                        <div class="counter-box text-center">
                            <h3 class="mb-0 mt-6 text-center">  Aun no tines recompensas   </h3> 
                        </div>
                    <?php }else {  foreach($insigniaU as $insi){?>
                        <div class="col-md-3 col-6 mt-3 pt-2">
                          <hr>
                            <div class="counter-box text-center">                
                                      <h3 class="mb-0 mt-4"><span class="counter-value" data-target="15"><?=$insi->insignia_nombre?></span></h2>
                                    <button class="btn  p-2 m-2" style="display: inline-block"  title="<?= $insi->insignia_nombre?>"> 
                                        <img src="<?=base_url('static/recompensas/insignias/'.$insi->insignia_img)?>"
                                        class="img-fluid d-block mx-auto " id="<?=$insi->insignia_id?>"
                                        style="max-height: 50px;" >
                                    </button>                                
                                    <h6 class="counter-head text-muted"><?= $insi->insignia_descripcion ?></h6>
                            </div><!--end counter box-->
                        </div>      
                    <?php }}?>
                </div><!--end row-->
                <div class="row" id="counter">
                <?php if( is_null($medallaU)){ ?>
                    <?php  }else { foreach($medallaU as $med){ ?>
                        <div class="col-md-3 col-6 mt-3 pt-2">
                          <hr>
                            <div class="counter-box text-center">                
                                      <h3 class="mb-0 mt-4"><span class="counter-value" data-target="15"><?=$med->medalla_nombre?></span></h2>
                                    <button class="btn  p-2 m-2" style="display: inline-block"  title="<?= $med->medalla_nombre?>"> 
                                        <img src="<?=base_url('static/recompensas/medallas/'.$med->medalla_img)?>"
                                        class="img-fluid d-block mx-auto " id="<?=$med->medallas_id?>"
                                        style="max-height: 50px;" >
                                    </button>                                
                                    <h6 class="counter-head text-muted"><?= $med->medalla_descripcion ?></h6>
                            </div><!--end counter box-->
                        </div>      
                    <?php }}?>
                </div><!--end row-->
                
            <div class="counter-box text-center"> 
                <h1 class="mb-0 mt-6"> Insignias </h2>
            </div>
                <div class="row" id="counter">
                   <?php foreach($insignias as $insignia){?>
                        <div class="col-md-3 col-6 mt-3 pt-2">
                          <hr>
                            <div class="counter-box text-center">                
                                      <h3 class="mb-0 mt-4"><span class="counter-value" data-target="15"><?=$insignia->insignia_nombre?></span></h2>
                                    <button class="btn  p-2 m-2" style="display: inline-block"  title="<?= $insignia->insignia_nombre?>"> 
                                        <img src="<?=base_url('static/recompensas/insignias/'.$insignia->insignia_img)?>"
                                        class="img-fluid d-block mx-auto " id="<?=$insignia->insignia_id?>"
                                        style="max-height: 50px;" >
                                    </button>                                
                                    <h6 class="counter-head text-muted"><?= $insignia->insignia_descripcion ?></h6>
                            </div><!--end counter box-->
                        </div>         
                    <?php }?>
                </div><!--end row-->
            </div>
            <div class="col-md-12">
                <div class="counter-box text-center"> 
                    <h1 class="mb-0 mt-6"> Medallas </h2>
                </div>
                <div class="row" id="counter">
                   <?php foreach($medallas as $medalla){?>
                        <div class="col-md-3 col-6 mt-3 pt-2">
                          <hr>
                            <div class="counter-box text-center">                
                                      <h3 class="mb-0 mt-4"><span class="counter-value" data-target="15"><?=$medalla->medalla_nombre?></span></h2>
                                    <button class="btn  p-2 m-2" style="display: inline-block"  title="<?= $medalla->medalla_nombre?>"> 
                                        <img src="<?=base_url('static/recompensas/medallas/'.$medalla->medalla_img)?>"
                                        class="img-fluid d-block mx-auto " id="<?=$medalla->medallas_id?>"
                                        style="max-height: 50px;" >
                                    </button>                                
                                    <h6 class="counter-head text-muted"><?= $medalla->medalla_descripcion ?></h6>
                            </div><!--end counter box-->
                        </div>         
                    <?php }?>
                </div><!--end row-->
            </div>
            
        </div>                            
    </div>
</div
