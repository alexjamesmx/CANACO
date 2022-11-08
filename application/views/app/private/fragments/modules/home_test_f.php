<!--<?=var_dump_format($this->session->userdata())?>-->

<?php if ($this->session->userdata('rol_id') == 1): ?>
    <div class="row">
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="<?=base_url('app/home')?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-user-plus" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Nuevos usuarios </p>
                    <p class="card-text mb-0"> Última semana </p>
                    <br>
                    <p class="lead text-center text-secondary"> 27 </p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="<?=base_url('app/home')?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Afiliaciones </p>
                    <p class="card-text mb-0"> Última semana </p>
                    <br>
                    <p class="lead text-center text-secondary"> <i class="fas fa-plus"></i> 16 </p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="<?=base_url('app/home')?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-people-arrows" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Conversión </p>
                    <p class="card-text mb-0"> Afiliados </p>
                    <br>
                    <p class="lead text-center text-secondary"> 15 <i class="fas fa-percent"></i> </p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="<?=base_url('app/home')?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Requerimientos </p>
                    <p class="card-text mb-0"> Publicados hoy </p>
                    <br>
                    <p class="lead text-center text-secondary"> <i class="fas fa-plus"></i> 787 </p>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }


    input[type="number"] {
        min-width: 50px;
    }

</style>

<div class="row">
    <div class="col-12 col-lg-6 mb-4">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container-g1"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </figure>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container-g2"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </figure>
            </div>
        </div>
    </div>
</div>

<div class="row sortable">

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false" style="">
        <div class="card">
            <div class="card-header p-0 position-relative">
                <div class="position-absolute handle card-icon">
                    <i class="simple-icon-shuffle"></i>
                </div>
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Número total de requerimientos<br> publicados</h6>
                <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                    <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>1,842</strong></div></div>                            
                </div>
                <div class="card-footer">
                    <a href="#"> 
                        <i class="fas fa-plus"></i> 
                        <strong>
                            <u>
                                Mas información
                            </u>
                        </strong>
                    </a>
                </div>
            </div>
        </div>                

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false" style="">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número total de requerimientos <br> vigentes</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>788</strong></div></div>                            
                    </div>
                    <div class="card-footer">
                        <a href="#"> 
                            <i class="fas fa-plus"></i> 
                            <strong>
                                <u>
                                    Mas información
                                </u>
                            </strong>
                        </a>
                    </div>
                </div>
            </div>                

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <div class="position-absolute handle card-icon">
                            <i class="simple-icon-shuffle"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Número total transacciones <br> completadas (solventadas)</h6>
                        <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="65" data-show-percent="true">
                            <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#d7d7d7" stroke-width="4" fill-opacity="0"></path>
                                <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#922c88" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 75.4088;"></path>
                            </svg>
                            <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);">
                                65%
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#"> 
                            <i class="fas fa-plus"></i> 
                            <strong>
                                <u>
                                    Mas información
                                </u>
                            </strong>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <div class="position-absolute handle card-icon">
                            <i class="simple-icon-shuffle"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Número total de oportunidades <br> de negocio (Match)</h6>
                        <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="88" data-show-percent="true">
                            <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#d7d7d7" stroke-width="4" fill-opacity="0"></path>
                                <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#922c88" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 75.4088;"></path>
                            </svg>
                            <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);">
                                88%
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#"> 
                            <i class="fas fa-plus"></i> 
                            <strong>
                                <u>
                                    Mas información
                                </u>
                            </strong>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <div class="position-absolute handle card-icon">
                            <i class="simple-icon-shuffle"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Número de usuarios sin afiliar <br> (diarios, semanales o mensuales)</h6>
                        <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="88" data-show-percent="true">
                            <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#d7d7d7" stroke-width="4" fill-opacity="0"></path>
                                <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#922c88" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 75.4088;"></path>
                            </svg>
                            <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);">
                                88%
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#"> 
                            <i class="fas fa-plus"></i> 
                            <strong>
                                <u>
                                    Mas información
                                </u>
                            </strong>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 mb-4" draggable="false" style="">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <div class="position-absolute handle card-icon">
                            <i class="simple-icon-shuffle"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Número de usuarios totales diarios, semanales o mensuales</h6>
                        <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                            <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>3,200</strong></div></div>                            
                        </div>
                        <div class="card-footer">
                            <a href="#"> 
                                <i class="fas fa-plus"></i> 
                                <strong>
                                    <u>
                                        Mas información
                                    </u>
                                </strong>
                            </a>
                        </div>
                    </div>
                </div>                

                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                Usuarios con medalla diamante <br> sin afiliar
                            </h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="27" data-show-percent="true">
                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#d7d7d7" stroke-width="4" fill-opacity="0"></path>
                                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#922c88" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 75.4088;"></path>
                                </svg>
                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);">
                                    27%
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#"> 
                                <i class="fas fa-plus"></i> 
                                <strong>
                                    <u>
                                        Mas información
                                    </u>
                                </strong>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                Total de requerimientos <br> ignorados (nadie postuló)
                            </h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="6" data-show-percent="true">
                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#d7d7d7" stroke-width="4" fill-opacity="0"></path>
                                    <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#922c88" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 75.4088;"></path>
                                </svg>
                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);">
                                    6%
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#"> 
                                <i class="fas fa-plus"></i> 
                                <strong>
                                    <u>
                                        Mas información
                                    </u>
                                </strong>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 mb-4" draggable="false" style="">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <div class="position-absolute handle card-icon">
                                <i class="simple-icon-shuffle"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Número total de oportunidades de negocio <br> (Match) por día, por mes, por trimestre</h6>
                            <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>600</strong></div></div>                            
                            </div>
                            <div class="card-footer">
                                <a href="#"> 
                                    <i class="fas fa-plus"></i> 
                                    <strong>
                                        <u>
                                            Mas información
                                        </u>
                                    </strong>
                                </a>
                            </div>
                        </div>
                    </div>       

                    <div class="col-xl-3 col-lg-6 mb-4" draggable="false" style="">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <div class="position-absolute handle card-icon">
                                    <i class="simple-icon-shuffle"></i>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Número de afiliaciones <br> automatizadas</h6>
                                <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                                    <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>44</strong></div></div>                            
                                </div>
                                <div class="card-footer">
                                    <a href="#"> 
                                        <i class="fas fa-plus"></i> 
                                        <strong>
                                            <u>
                                                Mas información
                                            </u>
                                        </strong>
                                    </a>
                                </div>
                            </div>
                        </div>       

                        <div class="col-xl-3 col-lg-6 mb-4" draggable="false" style="">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <div class="position-absolute handle card-icon">
                                        <i class="simple-icon-shuffle"></i>
                                    </div>
                                </div>
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Número de usuarios activos <br> (60 días)</h6>
                                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>44</strong></div></div>                            
                                    </div>
                                    <div class="card-footer">
                                        <a href="#"> 
                                            <i class="fas fa-plus"></i> 
                                            <strong>
                                                <u>
                                                    Mas información
                                                </u>
                                            </strong>
                                        </a>
                                    </div>
                                </div>
                            </div>       

                        </div>
                    <?php endif;?>

                    <?php if ($this->session->userdata('rol_id') == 2): ?>
                        <div class="row">
                            <div class="col-12 mb-2 mb-4">
                                <a href="<?=base_url('app/requirements/new')?>" class="card">
                                    <div class="card-body text-center text-primary">
                                        <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                                        <br>
                                        <br>
                                        <p class="card-text mb-0" style="font-size: 20px;"> Nuevo</p>
                                        <p class="card-text mb-0" style="font-size: 20px;"> Requerimiento</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mb-2">
                                <a href="<?=base_url('app/home')?>" class="card">
                                    <div class="card-body text-center text-primary">
                                        <i class="fas text-secondary fa-handshake" style="font-size: 38px;"></i>
                                        <br>
                                        <br>
                                        <p class="card-text mb-0"> Transacciones </p>
                                        <p class="card-text mb-0"> Completadas </p>
                                        <br>
                                        <p class="lead text-center text-secondary"> 139 </p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6 col-lg-3 mb-4">
                                <a href="<?=base_url('app/home')?>" class="card">
                                    <div class="card-body text-center text-primary">
                                        <i class="fas text-secondary fa-tasks" style="font-size: 38px;"></i>
                                        <br>
                                        <br>
                                        <p class="card-text mb-0"> Requerimientos </p>
                                        <p class="card-text mb-0"> Solventados </p>
                                        <br>
                                        <p class="lead text-center text-secondary"> 67 </p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6 col-lg-3 mb-4">
                                <a href="<?=base_url('app/home')?>" class="card">
                                    <div class="card-body text-center text-primary">
                                        <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                                        <br>
                                        <br>
                                        <p class="card-text mb-0"> Perfil </p>
                                        <p class="card-text mb-0"> Verificado </p>
                                        <br>
                                        <p class="lead text-center text-danger"> 27% </p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6 col-lg-3 mb-4">
                                <a href="<?=base_url('app/home')?>" class="card">
                                    <div class="card-body text-center text-primary">
                                        <i class="fas text-secondary fa-street-view" style="font-size: 38px;"></i>
                                        <br>
                                        <br>
                                        <p class="card-text mb-0"> Afiliado a</p>
                                        <p class="card-text mb-0"> CANACO </p>
                                        <p class="lead text-center text-secondary">
                                            <br>
                                            <small class="text-primary" style="font-size: 0.3em !important;">
                                                desde
                                                <?=fancy_date('2021-08-01', 'd-m-y')?>
                                            </small>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="row">

                        </div>

                    <?php endif;?>

                    <?php if ($this->session->userdata('rol_id') == 2): ?>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-4 mt-4">
                                <div class="alert alert-warning alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">

                                    <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em>4 oportunidades de
                                    negocio pendientes</em></strong> </h4>
                                    <h5> <i class="fas fa-hand-pointer"></i> Confirma si son de tu interés para seguir
                                    generando transacciones comerciales</h5>
                                    <br>
                                    <a href="#" class="btn btn-warning">
                                        <i class="iconsminds-repeat-3"></i>
                                        Confirmar ahora
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 mb-4 mt-4">
                                <div class="alert alert-danger alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">

                                    <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em>4 requerimientos
                                    pendientes</em></strong> </h4>
                                    <h5> <i class="fas fa-edit"></i> Finaliza tus requerimientos para seguir generando
                                    oportunidades de negocio </h5>
                                    <br>
                                    <a href="#" class="btn btn-danger">
                                        <i class="iconsminds-repeat-3"></i>
                                        Terminar ahora
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class=" card-title mb-4">
                                            <i class="simple-icon-list"></i>
                                            Últimas oportunidades de negocio
                                            <span class="text-primary float-right">
                                                <small>
                                                    Mostrando 10 de 300
                                                </small>
                                            </span>
                                        </h5>

                                        <div class="col-md-12">
                                            <div class="no-more-tables">
                                                <table id="controls-data-tables-pagination"
                                                class="data-table nowrap table table-bordered table-striped"
                                                data-order="[[ 0, &quot;desc&quot; ]]">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">
                                                            No.
                                                        </th>
                                                        <th scope="col">
                                                            Comercio
                                                        </th>
                                                        <th scope="col">
                                                            Solicitud
                                                        </th>
                                                        <th scope="col">
                                                            Estatus actual
                                                        </th>
                                                        <th scope="col">
                                                            Acciones
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 0; $i <= 0; $i++): ?>
                                                        <tr>
                                                            <td data-title="No.">
                                                                #1737
                                                            </td>
                                                            <td data-title="Comercio">

                                                                <h3 class="p-0 m-0 mb-2">
                                                                    <a href="" class="btn btn-link p-0 m-0">
                                                                        <i class="fas fa-store-alt"></i>
                                                                        Impactos digitales
                                                                    </a>
                                                                </h3>


                                                                <i class="fas fa-street-view  fa-2x fa-fw"></i>
                                                                &nbsp;
                                                                <i class="fas fa-check-circle  fa-2x fa-fw"></i>
                                                                &nbsp;
                                                                <i class="fas fa-trophy  fa-2x fa-fw"></i>
                                                                &nbsp;
                                                                <i class="fas fa-stopwatch  fa-2x fa-fw"></i>
                                                                &nbsp;
                                                                <i class="fas fa-smile-wink fa-2x fa-fw"></i>
                                                                <br>
                                                                <br>
                                                                <hr>
                                                                <h5>
                                                                    <i class="fas fa-star text-warning fa-fw"></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    4.9 / 5
                                                                </h5>
                                                                <h5>
                                                                    <i class="fas fa-handshake fa-fw"></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    1,400 transacciones completadas
                                                                </h5>
                                                                <h5>
                                                                    <i class="fas fa-tasks fa-fw"></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    1,188
                                                                    Requerimientos solventados
                                                                </h5>
                                                            </td>
                                                            <td data-title="Solicitud">
                                                                Se requiere una app de realidad aumentada
                                                            </td>
                                                            <td data-title="Estatus actual">
                                                                <h5 class="text-center">
                                                                    <i class="fas fa-clock"></i>
                                                                    <br>
                                                                    Aplicado, pendiente de respuesta
                                                                </h5>
                                                            </td>
                                                            <td data-title="Acciones">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-primary default btn-default">
                                                                        <i class="fas fa-comment"></i>
                                                                        <br>
                                                                        Contactar
                                                                    </button>
                                                                    <button class="btn btn-danger default btn-default">
                                                                        <i class="fas fa-times"></i>
                                                                        <br>
                                                                        Cancelar solicitud
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td data-title="No.">
                                                                #2084
                                                            </td>
                                                            <td data-title="Comercio">

                                                                <h3 class="p-0 m-0 mb-2">
                                                                    <a href="" class="btn btn-link p-0 m-0">
                                                                        <i class="fas fa-store-alt"></i>
                                                                        LaptopFix
                                                                    </a>
                                                                </h3>

                                                                <i class="fas fa-check-circle fa-2x fa-fw"></i>
                                                                &nbsp;
                                                                <i class="fas fa-stopwatch fa-2x fa-fw"></i>
                                                                &nbsp;
                                                                <i class="fas fa-smile-winkfa-2x fa-fw"></i>
                                                                <br>
                                                                <br>
                                                                <hr>
                                                                <h5>
                                                                    <i class="fas fa-star text-warning fa-fw"></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    4.6 / 5
                                                                </h5>
                                                                <h5>
                                                                    <i class="fas fa-handshake fa-fw"></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    900 transacciones completadas
                                                                </h5>
                                                                <h5>
                                                                    <i class="fas fa-tasks fa-fw"></i>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                                    688
                                                                    Requerimientos solventados
                                                                </h5>
                                                            </td>
                                                            <td data-title="Solicitud">
                                                                Se requiere servicio de mantenimiento industrial
                                                            </td>
                                                            <td data-title="Estatus actual">
                                                                <h5 class="text-center">
                                                                    <i class="fas fa-hourglass-half"></i>
                                                                    <br>
                                                                    Sin responder
                                                                </h5>
                                                            </td>
                                                            <td data-title="Acciones">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-dark default btn-default">
                                                                        <i class="fas fa-check"></i>
                                                                        <br>
                                                                        Aplicar
                                                                    </button>
                                                                    <button class="btn btn-danger default btn-default">
                                                                        <i class="fas fa-ban"></i>
                                                                        <br>
                                                                        No me interesa
                                                                    </button>
                                                                    <button class="btn btn-primary default btn-default">
                                                                        <i class="fas fa-comment"></i>
                                                                        <br>
                                                                        Contactar
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endfor;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class=" card-title mb-4">
                                        <i class="simple-icon-list"></i>
                                        Últimas oportunidades de negocio
                                        <span class="text-primary float-right">
                                            <small>
                                                Mostrando 10 de 300
                                            </small>
                                        </span>
                                    </h5>

                                    <div class="col-md-12">
                                        <div class="no-more-tables">
                                            <table id="controls-data-tables-pagination"
                                            class="data-table nowrap table table-bordered table-striped"
                                            data-order="[[ 0, &quot;desc&quot; ]]">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">
                                                        No.
                                                    </th>
                                                    <th scope="col">
                                                        Comercio
                                                    </th>
                                                    <th scope="col">
                                                        Solicitud
                                                    </th>
                                                    <th scope="col">
                                                        Estatus actual
                                                    </th>
                                                    <th scope="col">
                                                        Acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i <= 0; $i++): ?>
                                                    <tr>
                                                        <td data-title="No.">
                                                            #1737
                                                        </td>
                                                        <td data-title="Comercio">

                                                            <h3 class="p-0 m-0 mb-2">
                                                                <a href="" class="btn btn-link p-0 m-0">
                                                                    <i class="fas fa-store-alt"></i>
                                                                    Impactos digitales
                                                                </a>
                                                            </h3>


                                                            <i class="fas fa-street-view  fa-2x fa-fw"></i>
                                                            &nbsp;
                                                            <i class="fas fa-check-circle  fa-2x fa-fw"></i>
                                                            &nbsp;
                                                            <i class="fas fa-trophy  fa-2x fa-fw"></i>
                                                            &nbsp;
                                                            <i class="fas fa-stopwatch  fa-2x fa-fw"></i>
                                                            &nbsp;
                                                            <i class="fas fa-smile-wink fa-2x fa-fw"></i>
                                                            <br>
                                                            <br>
                                                            <hr>
                                                            <h5>
                                                                <i class="fas fa-star text-warning fa-fw"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                4.9 / 5
                                                            </h5>
                                                            <h5>
                                                                <i class="fas fa-handshake fa-fw"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                1,400 transacciones completadas
                                                            </h5>
                                                            <h5>
                                                                <i class="fas fa-tasks fa-fw"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                1,188
                                                                Requerimientos solventados
                                                            </h5>
                                                        </td>
                                                        <td data-title="Solicitud">
                                                            Se requiere una app de realidad aumentada
                                                        </td>
                                                        <td data-title="Estatus actual">
                                                            <h5 class="text-center">
                                                                <i class="fas fa-clock"></i>
                                                                <br>
                                                                Aplicado, pendiente de respuesta
                                                            </h5>
                                                        </td>
                                                        <td data-title="Acciones">
                                                            <div class="btn-group">
                                                                <button class="btn btn-primary default btn-default">
                                                                    <i class="fas fa-comment"></i>
                                                                    <br>
                                                                    Contactar
                                                                </button>
                                                                <button class="btn btn-danger default btn-default">
                                                                    <i class="fas fa-times"></i>
                                                                    <br>
                                                                    Cancelar solicitud
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-title="No.">
                                                            #2084
                                                        </td>
                                                        <td data-title="Comercio">

                                                            <h3 class="p-0 m-0 mb-2">
                                                                <a href="" class="btn btn-link p-0 m-0">
                                                                    <i class="fas fa-store-alt"></i>
                                                                    LaptopFix
                                                                </a>
                                                            </h3>

                                                            <i class="fas fa-check-circle  fa-2x fa-fw"></i>
                                                            &nbsp;
                                                            <i class="fas fa-stopwatch  fa-2x fa-fw"></i>
                                                            &nbsp;
                                                            <i class="fas fa-smile-wink fa-2x fa-fw"></i>
                                                            <br>
                                                            <br>
                                                            <hr>
                                                            <h5>
                                                                <i class="fas fa-star text-warning fa-fw"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                4.6 / 5
                                                            </h5>
                                                            <h5>
                                                                <i class="fas fa-handshake fa-fw"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                900 transacciones completadas
                                                            </h5>
                                                            <h5>
                                                                <i class="fas fa-tasks fa-fw"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                688
                                                                Requerimientos solventados
                                                            </h5>
                                                        </td>
                                                        <td data-title="Solicitud">
                                                            Se requiere servicio de mantenimiento industrial
                                                        </td>
                                                        <td data-title="Estatus actual">
                                                            <h5 class="text-center">
                                                                <i class="fas fa-hourglass-half"></i>
                                                                <br>
                                                                Sin responder
                                                            </h5>
                                                        </td>
                                                        <td data-title="Acciones">
                                                            <div class="btn-group">
                                                                <button class="btn btn-dark default btn-default">
                                                                    <i class="fas fa-check"></i>
                                                                    <br>
                                                                    Aplicar
                                                                </button>
                                                                <button class="btn btn-danger default btn-default">
                                                                    <i class="fas fa-ban"></i>
                                                                    <br>
                                                                    No me interesa
                                                                </button>
                                                                <button class="btn btn-primary default btn-default">
                                                                    <i class="fas fa-comment"></i>
                                                                    <br>
                                                                    Contactar
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endfor;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class=" card-title mb-4">
                                    <i class="simple-icon-list"></i>
                                    Mis requerimientos
                                    <span class="text-primary float-right">
                                        <small>
                                            Mostrando 10 de 300
                                        </small>
                                    </span>
                                </h5>

                                <div class="col-md-12">
                                    <div class="no-more-tables">
                                        <table id="controls-data-tables-pagination"
                                        class="data-table nowrap table table-bordered table-striped"
                                        data-order="[[ 0, &quot;desc&quot; ]]">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">
                                                    No.
                                                </th>
                                                <th scope="col">
                                                    Comercio
                                                </th>
                                                <th scope="col">
                                                    Solicitud
                                                </th>
                                                <th scope="col">
                                                    Estatus actual
                                                </th>
                                                <th scope="col">
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($arr_lista_req)) { ?>
                                            <?php for ($i = 0; $i <= 0; $i++): ?>
                                                <tr>
                                                    <td data-title="No.">
                                                        #1737
                                                    </td>
                                                    <td data-title="Comercio">

                                                        <h3 class="p-0 m-0 mb-2">
                                                            <a href="" class="btn btn-link p-0 m-0">
                                                                <i class="fas fa-store-alt"></i>
                                                                Impactos digitales
                                                            </a>
                                                        </h3>


                                                        <i class="fas fa-street-view  fa-2x fa-fw"></i>
                                                        &nbsp;
                                                        <i class="fas fa-check-circle  fa-2x fa-fw"></i>
                                                        &nbsp;
                                                        <i class="fas fa-trophy  fa-2x fa-fw"></i>
                                                        &nbsp;
                                                        <i class="fas fa-stopwatch  fa-2x fa-fw"></i>
                                                        &nbsp;
                                                        <i class="fas fa-smile-wink fa-2x fa-fw"></i>
                                                        <br>
                                                        <br>
                                                        <hr>
                                                        <h5>
                                                            <i class="fas fa-star text-warning fa-fw"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            4.9 / 5
                                                        </h5>
                                                        <h5>
                                                            <i class="fas fa-handshake fa-fw"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            1,400 transacciones completadas
                                                        </h5>
                                                        <h5>
                                                            <i class="fas fa-tasks fa-fw"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            1,188
                                                            Requerimientos solventados
                                                        </h5>
                                                    </td>
                                                    <td data-title="Solicitud">
                                                        Se requiere una app de realidad aumentada
                                                    </td>
                                                    <td data-title="Estatus actual">
                                                        <h5 class="text-center">
                                                            <i class="fas fa-clock"></i>
                                                            <br>
                                                            Aplicado, pendiente de respuesta
                                                        </h5>
                                                    </td>
                                                    <td data-title="Acciones">
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary default btn-default">
                                                                <i class="fas fa-comment"></i>
                                                                <br>
                                                                Contactar
                                                            </button>
                                                            <button class="btn btn-danger default btn-default">
                                                                <i class="fas fa-times"></i>
                                                                <br>
                                                                Cancelar solicitud
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-title="No.">
                                                        #2084
                                                    </td>
                                                    <td data-title="Comercio">

                                                        <h3 class="p-0 m-0 mb-2">
                                                            <a href="" class="btn btn-link p-0 m-0">
                                                                <i class="fas fa-store-alt"></i>
                                                                LaptopFix
                                                            </a>
                                                        </h3>

                                                        <i class="fas fa-check-circle "></i>
                                                        &nbsp;
                                                        <i class="fas fa-stopwatch "></i>
                                                        &nbsp;
                                                        <i class="fas fa-smile-wink"></i>
                                                        <br>
                                                        <br>
                                                        <hr>
                                                        <h5>
                                                            <i class="fas fa-star text-warning fa-fw"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            4.6 / 5
                                                        </h5>
                                                        <h5>
                                                            <i class="fas fa-handshake fa-fw"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            900 transacciones completadas
                                                        </h5>
                                                        <h5>
                                                            <i class="fas fa-tasks fa-fw"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            688
                                                            Requerimientos solventados
                                                        </h5>
                                                    </td>
                                                    <td data-title="Solicitud">
                                                        Se requiere servicio de mantenimiento industrial
                                                    </td>
                                                    <td data-title="Estatus actual">
                                                        <h5 class="text-center">
                                                            <i class="fas fa-hourglass-half"></i>
                                                            <br>
                                                            Sin responder
                                                        </h5>
                                                    </td>
                                                    <td data-title="Acciones">
                                                        <div class="btn-group">
                                                            <button class="btn btn-dark default btn-default">
                                                                <i class="fas fa-check"></i>
                                                                <br>
                                                                Aplicar
                                                            </button>
                                                            <button class="btn btn-danger default btn-default">
                                                                <i class="fas fa-ban"></i>
                                                                <br>
                                                                No me interesa
                                                            </button>
                                                            <button class="btn btn-primary default btn-default">
                                                                <i class="fas fa-comment"></i>
                                                                <br>
                                                                Contactar
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php endfor;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
