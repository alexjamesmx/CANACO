<div class="row" id="counter">
               <?php foreach($insignias as $insignia){?>
    <div class="col-md-4 col-6 mt-4 pt-2">
      <hr>
        <div class="counter-box text-center">                
            <h3 class="mb-0 mt-4"><span class="counter-value" data-target="15"><?=$insignia->insignia_nombre?></span></h2>
               <button class="btn  p-2 m-2" style="display: inline-block"  title="<?= $insignia->insignia_nombre?>"> 
                     <img src="<?=base_url('static/recompensas/insignias/'.$insignia->insignia_img)?>"
                          class="img-fluid d-block mx-auto " id="<?=$insignia->insignia_id?>"
                          style="max-height: 70px;" >
               </button>                                
                <h6 class="counter-head text-muted"><?= $insignia->insignia_descripcion ?></h6>
        </div><!--end counter box-->
    </div>         
               <?php }?>
 </div><!--end row-->
         










