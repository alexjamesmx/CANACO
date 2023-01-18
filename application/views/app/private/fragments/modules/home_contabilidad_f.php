<div class="row px-3" style="display: felx; justify-content: space-between;">

    <h2 style="font-size: 2rem;">Inicio</h2>
    <div>
        <!-- AFILIACIONES POR VALIDARSE -->
        <button type="button" class="btn btn-secondary mx-2 text-light" style="font-size: 1.2rem;">
            <a href="<?= base_url() ?>app/contaduria/validarafil">
                <i class="fas text-light fa-search-dollar"></i>
                <b class="text-light"> Afiliaciones por validarse </b>
            </a>
        </button>
        <!-- ALTA COMERCIO -->
        <button type="button" class="btn btn-secondary mx-2 px-5" style="font-size: 1.2rem;">
            <a href="<?= base_url() ?>app/contaduria/altacomercio">
                <i class="fas fa-plus text-light"></i>
                <b class="text-light"> Alta de comercio </b>
            </a>
        </button>
    </div>

</div>
<hr>
<div class="card-deck mb-4">
    <!-- METRICAS RECIBOS POR PAGAR -->
    <div class="card" style="border-style: solid;
    border-width: 9px 3px 3px 3px; border-color: #175827;">
        <a href="<?= base_url('app/contaduria/comporpagar') ?>">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body text-center">
                        <i class="fas fa-file-archive" style="font-size: 38px; color: #87bd28;"></i>
                        <p class="card-text mb-0">AFILIACIONES (recibos) </p>
                        <p class="card-text mb-0">por PAGAR </p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <p class="lead text-secondary text-center"><span id='afils24'></span></p>
                </div>
            </div>
        </a>
    </div>
    <!-- METRICAS MONTO APROXIMADO COMISIONES  -->
    <div class="card" style="border-style: solid;
    border-width: 9px 3px 3px 3px; border-color: #175827;">
        <a href="<?= base_url('app/contaduria/ingracum') ?>">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="card-body text-center">
                        <i class="fas fa-money-bill" style="font-size: 38px; color: #87bd28;"></i>
                        <p class="card-text mb-0">AFILIACIONES</p>
                        <p class="card-text mb-0">(all-time)</p>
                    </div>
                </div>
                <div class="col-md-6 my-auto">
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <p class="text-center text-secondary align-self-center m-0 p-0">Total: </p>
                        <h2 class='mr-3'><strong>$<span id='dineroFT'></span></strong> </h2>
                    </div> <br>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <small class="text-center text-secondary align-self-center m-0 p-0">Comisiones (10%): </small>
                        <h4 class="text-center mr-3">
                            <strong><span id='dineroFT_comisiones'></span></strong>
                        </h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- METRICAS INGRESOS ACUMULADOS ULTIMA SEMANA -->
    <div class="card" style="border-style: solid;
    border-width: 9px 3px 3px 3px; border-color: #175827;">
        <a href="<?= base_url('app/contaduria/ingracum') ?>">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="card-body text-center">
                        <i class="fas fa-money-bill" style="font-size: 38px; color: #87bd28;"></i>
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
                    </div>
                </div>
                <div class="col-md-6 my-auto">
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <p class="text-center text-secondary align-self-center m-0 p-0">Total: </p>
                        <h2 class='mr-3'><strong>$<span id='dineroT'></span></strong> </h2>
                    </div> <br>
                    <div class="d-flex" style="place-content:space-between;margin: 0">
                        <small class="text-center text-secondary align-self-center m-0 p-0">Comisiones (10%): </small>
                        <h4 class="text-center mr-3">
                            <strong><span id='dineroT_comisiones'></span></strong>
                        </h4>
                    </div>
                </div>
            </div>
    </div>
    <!-- METRICAS AFILIACIONES VALIDAS AL DIA DE HOY -->
    <div class="card" style="border-style: solid;
    border-width: 9px 3px 3px 3px; border-color: #175827;">
        <a href="<?= base_url('app/contaduria/aldiadehoy') ?>">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body text-center">
                        <i class="fas fa-user-check" style="font-size: 38px; color: #87bd28;"></i>
                        <p class="card-text mb-0">Afiliaciones VALIDADAS</p>
                        <p class="card-text mb-0">(all-time)</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <p class="lead text-secondary text-center"><span id='an'></span></p>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">

    <div class="col-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body p-5">
                <h3 class="card-title text-center">Top 10 Afiliados</h3>
                <canvas id="myChart" style="max-height: 500px;"></canvas>
            </div>
        </div>
    </div>
</div>