<div class="row">
    <!-- AFILIACIONES POR VALIDARSE -->
    <div class="col-6 mb-2 mb-4">
        <a href="<?= base_url() ?>app/contaduria/validarafil" class="card">
            <div class="card-body text-center text-primary">

                <i class="fas text-secondary fa-search-dollar" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;"> Afiliaciones</p>
                <p class="card-text mb-0" style="font-size: 20px;"> por validarse</p>
            </div>
        </a>
    </div>
    <!-- ALTA COMERCIO -->
    <div class="col-6 mb-2 mb-4">
        <a href="<?= base_url() ?>app/contaduria/altacomercio" class="card">
            <div class="card-body text-center text-primary">

                <i class="fas text-secondary fa-plus" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0" style="font-size: 20px;"> Alta de comercio</p>
                <p class="card-text mb-0" style="font-size: 20px;"> </p>
            </div>
        </a>
    </div>

</div>
<!-- METRICAS RECIBOS POR PAGAR -->
<div class="row">
    <div class="col-md-6 col-lg-3 mb-4">
        <a href="<?= base_url('app/contaduria/comporpagar') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas fa-file-archive text-secondary" style="font-size: 38px;"></i>
                <br>
                <i class="fa-solid fa-money-bill"></i>
                <br>
                <p class="card-text mb-0">AFILIACIONES (recibos) </p>
                <p class="card-text mb-0">por PAGAR </p>
                <br>
                <p class="lead text-center text-secondary"><span id='afils24'></span></p>
            </div>
        </a>
    </div>
    <!-- METRICAS MONTO APROXIMADO COMISIONES  -->
    <div class="col-md-6 col-lg-3 mb-4">
        <a href="<?= base_url('app/contaduria/ingracum') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas fa-money-bill text-secondary" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0">AFILIACIONES</p>
                <p class="card-text mb-0">(all-time)</p>
                <br>
                <div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <p class="text-center text-secondary align-self-center m-0 p-0">Total: </p>
                        <h2 class='m-0'><strong>$<span id='dineroFT'></span></strong> </h2>
                    </div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <small class="text-center text-secondary align-self-center m-0 p-0">Comisiones (10%): </small>
                        <h4 class="text-center m-0">
                            <strong><span id='dineroFT_comisiones'></span></strong>
                        </h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- METRICAS INGRESOS ACUMULADOS ULTIMA SEMANA -->
    <div class="col-md-6 col-lg-3 mb-4">
        <a href="<?= base_url('app/contaduria/ingracum') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas fa-money-bill text-secondary" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0">AFILIACIONES</p>
                <p class="card-text mb-0">(de <script>
                        const arr = [
                            'Enero',
                            'Febrero',
                            'Marzo',
                            'Abril',
                            'Mayo',
                            'Junio',
                            'Julio',
                            'Agosto',
                            'Septiembre',
                            'Octubre',
                            'Noviembre',
                            'Diciembre'
                        ]
                        const d = new Date().getMonth()
                        document.write(arr[d])
                    </script>)</p>
                <br>
                <div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <p class="text-center text-secondary align-self-center m-0 p-0">Total: </p>
                        <h2 class=''><strong>$<span id='dineroT'></span></strong></h2>
                    </div>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <small class="text-center text-secondary align-self-center m-0 p-0">Comisiones (10%): </small>
                        <h4 class=''><strong><span id='dineroT_comisiones'></span></strong></h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- METRICAS AFILIACIONES VALIDAS AL DIA DE HOY -->
    <div class="col-md-6 col-lg-3 mb-4">
        <a href="<?= base_url('app/contaduria/aldiadehoy') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-user-check" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0">Afiliaciones VALIDADAS</p>
                <p class="card-text mb-0">(all-time)</p>
                <br>
                <div>
                    <p class="lead text-center text-secondary"> <strong><span id='an'></span></strong> </p>
                </div>
            </div>
        </a>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
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


    <div class="col-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </figure>
            </div>
        </div>
    </div>
</div>