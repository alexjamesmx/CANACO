<!-- NUEVA TRACTORA -->
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <a href="<?= base_url() ?>app/afilcomercios/newtractora" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">TRACTORA</p>
                <p> </p>
            </div>
        </a>
    </div>
</div>
<!-- ALTA COMERCIO AFILICACION DESDE ENLACE -->
<div class="row">
    <div class="col-6 mb-2 mb-4">
        <a href="<?= base_url() ?>app/afilcomercios/newcomercio" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">COMERCIO</p>
                <p> </p>
            </div>
        </a>
    </div>
    <div class="col-6 mb-2 mb-4">
        <a href="<?= base_url() ?>app/afilcomercios/newafilenlace" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">Afiliación</p>

                <p class="card-text mb-0" style="font-size: 20px;">desde enlace</p>
            </div>
        </a>
    </div>
</div>
<!-- NUMERO DE CONVERSIONES ULTIMO CORTE -->
<div class="row">
    <div class="col-md-4  mb-4">
        <a href="<?= base_url('app/Afilcomercios/converciones') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-user-plus" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0"> Número de conversiones </p>
                <p class="card-text mb-0"> Último corte </p>
                <br>
                <p class="lead text-center text-secondary m-0" id='conversiones' name='conversiones'> 0 </p>
                <p class="card-text mb-0" id="periodo_corte"></p>
            </div>
        </a>
    </div>
    <!-- TOTAL DE NUEVOS COMERCIOS REGISTRADOS EL DIA DE HOY -->
    <div class="col-md-4  mb-4">
        <a href="<?= base_url('app/home') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0"> Total de negocios </p>
                <p class="card-text mb-0"> registrados por mí el día de hoy </p>
                <br>
                <div id='numreghoy'>
                    <p class="lead text-center text-secondary"> <i class="fas fa-plus"></i> 0 </p>
                </div>
            </div>
        </a>
    </div>
    <!-- NO MATCH ULTIMA SEMANA -->
    <div class="col-md-4  mb-4">
        <a class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-people-arrows" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0"> No match </p>
                <p class="card-text mb-0"> Última semana </p>
                <br>
                <div id='numnomatchs'>
                    <p class="lead text-center text-secondary"> 0 </p>
                </div>
            </div>
        </a>
    </div>

</div>
<marquee>
    <ul class="list-inline mb-0 move-text" id='barraNomatch'>
        <li class="list-inline-item px-2 mb-0">
            <h3><strong>Últimos no match</strong></h3>
        </li>
</marquee>
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
<!-- HIGHCHARTS -->
<div class="row">
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
    <div class="col-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="containerg4"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </figure>
            </div>
        </div>
    </div>
</div>

<!-- REQUERIMIENTOS VIGENTES -->
<div class="row sortable">

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container"></div>
            <!-- <p class="highcharts-description"> -->
            </p>
        </figure>
        <!-- <p class="card-text mb-0" style="font-size: 20px; text-align:center">No. requerimientos</p>
                <p style='text-align:center'><b><small>(VIGENTES)</small></b></p>

                <div class="d-flex justify-content-between">
                    <p>Totales</p>
                    <strong><span id='requerimientos-totales'>sdf</span></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <p>De mis afiliados: </p>
                    <strong><span id='requerimientos-activos'>df</span></strong>
                </div> -->
    </div>

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container2"></div>
            <p class="highcharts-description">
            </p>
        </figure>
        <!-- <div class="card">
            <div class="card-header p-0 position-relative">
                <div class="position-absolute handle card-icon">
                    <i class="simple-icon-shuffle"></i>
                </div>
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Comercios sin afiliar <br>con cierres confirmados</h6>
                <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                    <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong><span id='noafilscierre'>0</span></strong></div>
                </div>
            </div>

        </div> -->
    </div>

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container3"></div>
            <p class="highcharts-description">
            </p>
        </figure>
        <!-- <div class="card">
            <div class="card-header p-0 position-relative">
                <div class="position-absolute handle card-icon">
                    <i class="simple-icon-shuffle"></i>
                </div>
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Comercios afiliados </br>con cierres confirmados</h6>
                <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                    <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong><span name='afilscierres' id='afilscierres'>0</span></strong></div>
                </div>
            </div>

        </div> -->
    </div>

    <div class="col-xl-3 col-lg-6 mb-4 d-flex" draggable="false">
        <div class="card d-flex bg-white w-100">
            <div class="card-body justify-content-between align-items-center">
                <h3 class="mb-0" style="text-align:center"> NEGOCIOS </br></h4>
                    <div class="" style="align-items: center;flex-direction:column;display: flex;justify-content: space-between;height: 100%;width: inherit; margin: 16px 0; padding:15%">
                        <div class="" style="justify-content: space-between;display: flex;width: fit-content;background:#e4e4e4;border-radius: 12px;padding: 10px;">
                            <strong style="align-self:center">
                                <h2>Registros completos</h2>
                            </strong>
                            <strong>
                                <span id="comercios-registros-completos" style="font-size:32px;color:#576a3d">0</span>
                            </strong>
                        </div>
                        <div class="" style="justify-content: space-between;display: flex;width: 100%;background: #e4e4e4;border-radius: 12px;padding: 10px;">
                            <strong style="align-self:center">
                                <h2>Registros incompletos</h2>
                            </strong>
                            <strong>
                                <span id="comercios-registros-incompletos" style="font-size:32px;color:#576a3d">0</span>
                            </strong>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>