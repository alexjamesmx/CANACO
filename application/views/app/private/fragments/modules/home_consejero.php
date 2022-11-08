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
    <div class="col-12 mb-2 mb-4">

        <a href="<?= base_url() ?>app/Consejero/newafilcomercio" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;"> COMERCIO </p>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-4 mb-4">
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



    <div class="col-4 mb-4">
        <a href="<?= base_url() ?>app/afilcomercios/matchtemp" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-people-arrows" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0"> Total de afiliaciones (actual) </p>
                <br>
                <div>
                    <p id='total_afiliaciones' class="lead text-center text-secondary"> 0 </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4 mb-4">
        <a href="<?= base_url('app/home') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0">No. oportunidades negocio</p>
                <br>
                <p class="lead text-center text-secondary" id='no_oportunidades_negocio'>
                    0</p>
            </div>
        </a>
    </div>
</div>


<div class="row">

    <div class=" col-md-6 mb-4" draggable="false">
        <figure class="highcharts-figure">
            <div id="container-top-conversiones"></div>
            <p class="highcharts-description">
                &nbsp;
            </p>
        </figure>
    </div>
    <div class="col-md-6 col-lg-6 mb-4">
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
<div class="row">
    <div class="col-8 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="m-0 p-0 w-100">
                    <div id="container-g1"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 mb-4">
        <figure class="highcharts-figure">
            <div id="container-requerimientos-vigentes"></div>
            <p class="highcharts-description">
            </p>
        </figure>
    </div>
</div>