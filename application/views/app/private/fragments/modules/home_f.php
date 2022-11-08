<!-- <?php if ($this->session->userdata('rol_id') == 1) : ?>
    <div class="row">

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="<?= base_url('app/home') ?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-user-plus" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> Nuevo usuarios </p>
                    <p class="card-text mb-0"> Última semana </p>
                    <br>
                    <p class="lead text-center text-secondary"> 27 </p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="<?= base_url('app/home') ?>" class="card">
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
            <a href="<?= base_url('app/home') ?>" class="card">
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
            <a href="<?= base_url('app/home') ?>" class="card">
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

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número total de requerimientos<br> publicados</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>1,842</strong></div>
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

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número total de requerimientos <br> vigentes</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>788</strong></div>
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

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
            <div class=" card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número de usuarios totales diarios, semanales o mensuales</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>3,200</strong></div>
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

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número total de oportunidades de negocio <br> (Match) por día, por mes, por trimestre</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>600</strong></div>
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

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número de afiliaciones <br> automatizadas</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>44</strong></div>
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

        <div class="col-xl-3 col-lg-6 mb-4" draggable="false">
            <div class="card">
                <div class="card-header p-0 position-relative">
                    <div class="position-absolute handle card-icon">
                        <i class="simple-icon-shuffle"></i>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Número de usuarios activos <br> (60 días)</h6>
                    <div role="progressbar" class="progress-bar-circle position-relative" data-color="#922c88" data-trailcolor="#d7d7d7" aria-valuemax="100" aria-valuenow="40" data-show-percent="true">
                        <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(146, 44, 136);"><strong>44</strong></div>
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
    </div>
<?php endif; ?>  -->


<?php if ($this->session->userdata('rol_id') == 2) : ?>
    <div class="widget pb-3">
        <!-- SEARCH -->
        <div class="widget">
            <iframe name="catch" style="display:none;"></iframe>
            <form target="catch" method='get'>
                <div class="input-group" id="busqueda" style='border: solid #576a3d; border-radius: 5px; opacity:0.71416;'>
                    <input autocomplete='off' type="text" id="keyword" name="keyword" class="form-control border-0" placeholder="Encuentra proveedor de" style="font-size: 1.5em !important;">
                    <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit" onclick="search_keyword()"><i id='id_logo' class="fas fa-search"></i></button>
                    <input id="idRed" type="hidden" value="0">
                </div>
                <!-- <button onclick='toat()'>toast</button> -->
            </form>
        </div>
        <!-- SEARCH -->
    </div>
    <div class="row">
        <div class="col-12">
            <div id="custom_marquee_parent" style="display:none;">
                <span id="nomatch_title" style="width:fit-content;z-index:2;font-size: 1.2rem;background: #f8f8f8;font-weight: bold;padding: 12px;border-radius: 12px;position: absolute;">Últimos no matchs: </span>
            </div>
        </div>

    </div>
    <div class="row">
        <?php
        $imagen = 'https://imagenes.milenio.com/9G2XGg-Y66Qnqxx1ug-cDSLiDGk=/958x596/https://www.milenio.com/uploads/media/2021/01/05/del-trabajo-de-las-tienditas_0_11_1082_673.jpg';
        ?>
        <div class="col-12 col-lg-6 mb-4 mt-4" id='publicidad1' style="display: none;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn2.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn3.png" alt="Third slide">
                    </div>

                    <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn4.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn5.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn6.png" alt="Third slide">
                    </div>

                    <div class="carousel-item">
                        <img class="img-fluid mx-auto d-block" width="540px" height="280px" src="<?= base_url() ?>static/uploads/publicidad/pn7.png" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mb-4 mt-4" id='misoportunidadesgrande' style="display: none;">
            <div class="alert alert-warning alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">
                <h2><strong>Te estan buscando </strong></h2>
                <div id='misoportunidades'>
                    <h4> <i class="fas fa-exclamation-triangle"></i>Tienes <strong><em>0 oportunidades de
                                negocio pendientes</em></strong></h4>
                </div>
                <h5> <i class="fas fa-hand-pointer"></i> Confirma si son de tu interés para seguir
                    generando transacciones comerciales</h5>
                <br>
                <a href="<?= base_url() ?>app/mis_oportunidades/misoportunidades" class="btn btn-warning">
                    <i class="iconsminds-repeat-3"></i>
                    Confirmar ahora
                </a>
            </div>
        </div>

        <div class="col-12 col-lg-6 mb-4 mt-4" id='misreqsgrande' style="display: none;">
            <div class="alert alert-danger alert-dismissible fade show mb-4 pt-5 pb-5" role="alert">
                <h2><strong>Revisa empresas interesadas</strong></h2>
                <div id='misreqs'>
                    <h4> <i class="fas fa-exclamation-triangle"></i> Tienes <strong><em><span id='misreqs'>0</span> requerimientos
                                pendientes</em></strong> </h4>
                </div>
                <h5> <i class="fas fa-edit"></i> Finaliza tus requerimientos para seguir generando
                    oportunidades de negocio </h5>
                <br>
                <a href="<?= base_url() ?>app/requirements/mis_requerimientos" class="btn btn-danger">
                    <i class="iconsminds-repeat-3"></i>
                    Terminar ahora
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-12 mb-4 mt-4" id='publicidad2' style="display: block;">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href='https://impactosdigitales.com/software-a-la-medida-queretaro/'>
                        <img class="img-fluid mx-auto d-block" width="1600px" height="430px" src="<?= base_url() ?>static/uploads/publicidad/pc1.png" alt="First slide"></a>
                </div>
                <div class="carousel-item">
                    <a href='https://impactosdigitales.com/cuanto-cuesta-hacer-tienda-en-linea/'>
                        <img class="img-fluid mx-auto d-block" width="1600px" height="430px" src="<?= base_url() ?>static/uploads/publicidad/pc2.png" alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                    <a href='https://impactosdigitales.com/agencias-de-marketing-digital-queretaro-2/'>
                        <img class="img-fluid mx-auto d-block" width="1600px" height="430px" src="<?= base_url() ?>static/uploads/publicidad/pc3.png" alt="Third slide"></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-2 mb-4">
            <a onclick="deshabilitar()" class="card" href='#'>
                <div class="card-body text-center text-primary card-color-nuevo-requerimiento card-custom-shadow">
                    <i class="fas text-dark fa-plus" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <h2 class="card-text card-title-custom-action"> Nuevo</h2>
                    <h2 class="card-text card-title-custom-action"> Requerimiento</h2>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3 mb-2 container-md">
            <a href="<?= base_url(
                            'app/home'
                        ) ?>" class="card" href='#'>
                <div class="card-body text-center text-primary card-color card-custom-shadow">
                    <i class="fas text-dark fa-handshake" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <h2 class="card-text card-title-custom"> Transacciones </h2>
                    <h2 class="card-text card-title-custom"> Completadas </h2>
                    <br>
                    <p id="completados" class="lead text-center text-danger font-weight-semibold"> 0 </p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3 mb-2 container-md">
            <a href="<?= base_url(
                            'app/home'
                        ) ?>" class="card">
                <div class="card-body text-center text-primary card-color card-custom-shadow">
                    <i class="fas text-dark fa-tasks" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <h2 class="card-text card-title-custom"> Requerimientos </h2>
                    <h2 class="card-text card-title-custom"> Solventados </h2>
                    <br>
                    <p id="solventados" class="lead text-center text-danger font-weight-semibold"> 0 </p>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3 mb-2 container-md">
            <a href="<?= base_url(
                            'app/home'
                        ) ?>" class="card">
                <div class="card-body text-center text-primary card-color card-custom-shadow">
                    <i class="fas text-dark fa-user" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <h2 class="card-text card-title-custom"> Perfil </h2>
                    <h2 class="card-text card-title-custom"> Verificado </h2>
                    <br>
                    <div>
                        <p class="lead text-center text-danger font-weight-semibold" id='porcentaje'> 0% </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-2 container-md" id='afiliado' style='display:none'>
            <a href="<?= base_url(
                            'app/home'
                        ) ?>" class="card card-color-afiliado card-custom-shadow">
                <div class="card-body text-center text-primary">
                    <i class="fas text-dark fa-check" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <h2 class="card-text m-0 card-title-custom""> Afiliado a</h2>
                    <h2 class=" card-text m-0 card-title-custom""> CANACO </h2>
                    <br>
                    <div>
                        <p class="text-center text-secondary">
                            <small>
                                Desde: <?= fancy_date($micom[0]->fecha_inicio_afiliacion, 'd-m-y') ?>
                            </small>
                        </p>
                    </div>

                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4" id='noafiliado' style='display:none'>
            <a href="<?= base_url(
                            'app/myaccount/#afildiv'
                        ) ?>" class="card">
                <div class="card-body text-center text-primary">
                    <i class="fas text-secondary fa-street-view" style="font-size: 38px;"></i>
                    <br>
                    <br>
                    <p class="card-text mb-0"> No afiliado a</p>
                    <p class="card-text mb-0"> CANACO </p>
                    <br>
                    <p class="card-text mb-0"> Afiliate ahora dando click aqui </p>
                </div>

                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
            </a>

        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <marquee>
                    <div class="flex-row d-flex" id='barraIgnorados'>
                    </div>
                </marquee>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style=" background-color: #69b800;">
                    <h3 class="modal-title" id="exampleModalLabel"><span id="titulo1" class="text-white">Resultados</span></h3>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="card m-12" id="div_modal" align='center'>
                        <div id="modal-list-result" class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="modal_nomatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px !important">
            <div class="modal-content" style="border-radius: 24px;">
                <!-- <div class="modal-header">
                        </div> -->
                <div class="modal-body">

                    <!-- GRID CONTAINER -->
                    <div class="" style="grid-template-columns: repeat(3, 1fr); grid-template-rows: 10% repeat(2, 1fr) repeat(2, 10%);display: grid;gap: 12px;">

                        <!-- HEADER -->
                        <div style="grid-column: 1/4;grid-row:1;margin-bottom: 1rem;">

                            <div class="d-flex">
                                <h5 class="modal-title" id="modal_nomatch_title" style="align-self: center;width: 100%;text-align: center;"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                        <!-- FOTO PERFIL -->
                        <div class="" style="justify-self:center;grid-row: 2/4;grid-column: 1;position: relative;">
                            <span id="profile_eye" style="opacity:0" class='modal_perfil_logo_eye'></span>
                            <img id="modal_perfil_logo" src="" alt="Foto de negocio" class='modal_perfil_logo' onclick="requerimiento_imagen(this)" onmouseout="profileHoverHide()" onmouseover="profileHover()">
                        </div>
                        <!-- CAMPOS OCULTOS -->
                        <p id="modal_text_id" hidden></p>
                        <p id="modal_text_status" hidden></p>
                        <p id="modal_text_usuario_id" hidden></p>


                        <!-- DETALLES -->
                        <div class="" style="grid-area: 2 / 2 / span 4 / span 3;padding: 1rem;border-top-left-radius: 24px;border-bottom-left-radius: 24px;border-top-right-radius: 24px;border-bottom-right-radius: 24px">
                            <div class="" style="display: grid;grid-template-columns: 1fr 1fr;height: 100%;">

                                <div class="">
                                    <div class="modal_perfil_div">
                                        <span class="modal_perfil_div_text">Disponible desde</span> <br><span id="modal_text_date_nomatch"></span>
                                    </div>

                                    <div class="modal_perfil_div">
                                        <span class="modal_perfil_div_text">Tiempo de entrega</span><br><span id="modal_text_entrega"></span>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="modal_perfil_div"><span class='modal_perfil_div_text'>Cantidad</span><br><span id="modal_text_cantidad"></span></div>
                                    <div class="modal_perfil_div"><span class="modal_perfil_div_text">Especificaciones</span><br><span id="modal_text_especificaciones"></span></div>
                                </div>

                            </div>
                        </div>


                        <!-- NOMBRE NEGOCIO -->
                        <div class="" style="justify-content: center; grid-row: 4/5;grid-column: 1/2;">
                            <div style="text-align: center;font-weight: bold;"><span id="modal_text_negocio_nombre"></span></div>
                        </div>

                        <div style="grid-column:3/4; justify-self:end">
                            <a href="">


                                <span class="modal_perfil_div_text">Contactar</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px" fill-rule="evenodd" clip-rule="evenodd">
                                    <path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z" />
                                    <path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z" />
                                    <path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z" />
                                    <path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z" />
                                    <path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
                            <hr>
                             -->

                </div>
            </div>
        </div>
    </div>


<?php endif; ?>


<!-- <div id='tablaoportunidades'>
    </div> -->



<!-- <div class="col-md-12 mb-4">
        <div>
            <div id='lista_requerimientos'>
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
                        <table id="controls-data-tables-pagination" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
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
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->