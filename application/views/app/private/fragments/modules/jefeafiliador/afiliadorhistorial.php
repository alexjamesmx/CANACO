<!--<?= var_dump_format($this->session->userdata()) ?>-->
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <a  class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-user-plus" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0"> <?= $comercios->negocio_nombre?> </p>
                <p class="card-text mb-0"> <?= $comercios->negocio_nombre?> </p>
                <br>
              
            </div>
        </a>
    </div>
</div>

<!-- 
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <a href="<?= base_url() ?>app/jefeafilcomercios/newafilenlace" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">Nueva Afiliación</p>
            </div>
        </a> 
    </div>
</div> -->
<div class="row ">
    <?php if(isset($historial)){ ?>
    
    <?php foreach($historial as $histori){ ?> 
        <div class="col-4 col-lg-6 mb-4" draggable="false" style="">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                        <h9 class="mb-0">Afiliador: <br><?= $histori->nombre ?> </h9>    
                    <div role="progressbar" class="progress-bar-circle position-relative" 
                        data-color="#922c88" data-trailcolor="#d7d7d7" 
                        aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" 
                            style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px;
                            transform: translate(-50%, -50%); color: rgb(146, 44, 136);">
                                Id Emp: <strong><?= $histori->clave_empleado ?> </strong>
                        </div>
                    </div>                                                        
                </div>
                <div class="card-footer">
                        Fecha:   
                    <strong>
                    <?= $histori->date_historico ?> 
                    </strong>
                </div>
            </div>
        </div>
    <?php }}else{?>
        <div class="col-12 col-lg-12 mb-4" draggable="false" align="center" style="">
            <div class="card" align="center">
                <div class="card-header p-0 position-relative" align="center" >
                </div>
              
                <div class="card-footer">
                    
                    <strong>
                     Aun no cuenta con historial
                    </strong>
                </div>
            </div>
        </div>
        <?php }?>
</div> 
         




