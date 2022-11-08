<!-- FILA -->
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <a href="<?= base_url() ?>app/jefeafilcomercios/newtractora" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">TRACTORA</p>

            </div>
        </a>
    </div>
    <div class="col-6 mb-2 mb-4">
        <a href="<?= base_url() ?>app/jefeafilcomercios/newafilenlace" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">Afiliación</p>
                <p class="card-text mb-0" style="font-size: 20px;">Desde enlace</p>
            </div>
        </a>
    </div>
    <div class="col-6 mb-2 mb-4">

        <a href="<?= base_url() ?>app/jefeafilcomercios/newafilcomercio" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;">COMERCIO</p>

            </div>
        </a>
    </div>
</div>
<!-- FILA -->
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
    <div class="col-md-4 mb-4">
        <a href="<?= base_url('app/Afilcomercios/converciones') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas fa-user-check text-secondary" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0">No. REGISTROS - HOY</p>
                <br>
                <div style="margin-left: 16px;margin-right: 16px;">
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <h3 class="text-center text-secondary align-self-center m-0 p-0">Totales: </h3>
                        <h2 class='m-0'><strong><span id='regs_totales'>0</span></strong> </h2>
                    </div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <h3 class="text-center text-secondary align-self-center m-0 p-0">Comercios</h3>
                        <h2 class="text-center m-0">
                            <strong><span id='misregs_comercios'>0</span></strong>
                        </h2>
                    </div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <h3 class="text-center text-secondary align-self-center m-0 p-0">Tractoras</h3>
                        <h2 class="text-center m-0">
                            <strong><span id='misregs_tractoras'>0</span></strong>
                        </h2>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4 mb-4">
        <a class="card">
            <div class="card-body text-center text-primary">
                <i class="fas fa-search text-secondary" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0">No match</p>
                <br>
                <div style="margin-left: 16px;margin-right: 16px;">
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <h3 class="text-center text-secondary align-self-center m-0 p-0">Totales: </h3>
                        <h2 class='m-0'><strong><span id='numnomatchs_totales'></span></strong> </h2>
                    </div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <h3 class="text-center text-secondary align-self-center m-0 p-0">Esta semana: </h3>
                        <h2 class="text-center m-0">
                            <strong><span id='numnomatchs_semanales'></span></strong>
                        </h2>
                    </div>
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
        <!-- <li class="list-inline-item px-2 mb-0"><b>Pantallas para laptos</b>  <span class="text-success"><i class="fas fa-angle-up text-success"></i> 7</span></li>
        <li class="list-inline-item px-2 mb-0"><b>Servicio de limpieza</b> <span class="text-danger"><i class="fas fa-angle-down text-danger"></i>10</span></li>
        <li class="list-inline-item px-2 mb-0"><b>Lavadoras</b>  <span class="text-success"> <i class="fas fa-angle-up text-success"></i>11</span></li>
        <li class="list-inline-item px-2 mb-0"><b>Lanchas</b>  <span class="text-danger"> <i class="fas fa-angle-down text-danger"></i>8</span></li>
        <li class="list-inline-item px-2 mb-0"><b>Niñeras</b>  <span class="text-success"><i class="fas fa-angle-up text-success"></i>2</span></li>
        <li class="list-inline-item px-2 mb-0"><b>Vinos artesanales </b>  <span class="text-danger"> <i class="fas fa-angle-down text-danger"></i>2</span></li> -->
    </ul>
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

    #container {
        width: 100%;
    }
</style>

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
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="m-0 p-0 w-100">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FILA -->
<div class="row sortable">

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container-requerimientos-vigentes"></div>
            <p class="highcharts-description">
            </p>
        </figure>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container-negocios-sinafiliar"></div>
            <p class="highcharts-description">
            </p>
        </figure>

    </div>

    <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container-negocios-afiliados"></div>
            <p class="highcharts-description">
            </p>
        </figure>

    </div>

    <div class="col-xl-3 col-lg-6 mb-4 d-flex" draggable="false">
        <div class="card d-flex bg-white w-100">
            <div class="card-body w-100 justify-content-between align-items-center">
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
                        <div class="" style="justify-content: space-between;display: flex;width: fit-content;background: #e4e4e4;border-radius: 12px;padding: 10px;">
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
<div class="row sortable">
    <div class=" col-md-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container-top-conversiones"></div>
            <p class="highcharts-description">
                &nbsp;
            </p>
        </figure>
    </div>
    <div class=" col-md-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container-tractoras-mayor-requerimientos"></div>
            <p class="highcharts-description">
                &nbsp;
            </p>
        </figure>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="m-0 p-0 w-100">
                    <div id="container-transacciones"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>