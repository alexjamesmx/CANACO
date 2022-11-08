<div class="row" id="counter">                             
    <?php foreach($medallas as $medalla){?>
        <div class="col-md-4 col-6 mt-4 pt-2">
           <hr> 
            <div class="counter-box text-center">                              
                <h3 class="mb-0 mt-4"><span class="counter-value" data-target="15"><?= $medalla->medalla_nombre ?></span></h2>
                <button class="btn  p-2 m-2" style="display: inline-block" data-bs-toggle="tooltip" 
                        data-bs-placement="bottom" title="<?=$medalla->medalla_nombre  ?>"> 
                     <img src="<?=base_url('static/recompensas/medallas/'.$medalla->medalla_img)?>"
                          class="img-fluid d-block mx-auto avatar avatar-small"
                          style="max-height: 60px;   " >
                </button>                             
                    <h6 class="counter-head text-muted"><?=$medalla->medalla_descripcion  ?></h6>
            </div><!--end counter box-->
        </div>
            
    <?php }?>
</div><!--end row-->
    