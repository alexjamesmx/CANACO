<div class="row">
    <div class="col-12 mb-2 mb-4">
                <a href="<?= base_url() ?>app/Afilcomercios/newtractora" class="card">
                    <div class="card-body text-center text-primary">
                        <i class="fas text-secondary fa-plus-circle" style="font-size: 38px;"></i>
                        <br>
                        <br>
                        <p class="card-text mb-0" style="font-size: 20px;">Nueva Tractora</p>
                        <p> </p>
                    </div>
                </a> 
    </div> 
   
</div>
<div class="row">
    <div class="col-md-6 col-lg-3 mb-4">
        <a href="<?= base_url('app/home') ?>" class="card">
            <div class="card-body text-center text-primary">
                <i class="fas text-secondary fa-user-plus" style="font-size: 38px;"></i>
                <br>
                <br>
                <p class="card-text mb-0"> Número de Afiliaciones </p>
                <p class="card-text mb-0"> Afiliación </p>
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
                <p class="card-text mb-0"> Por plataforma </p>
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
                <p class="card-text mb-0"> Número de match </p>
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
                <p class="card-text mb-0"> Ingresos por </p>
                <p class="card-text mb-0"> Afiliación </p>
                <br>
                <p class="lead text-center text-secondary"> <i class="fas fa-plus"></i> 787 </p>
            </div>
        </a>
    </div>
</div>
<div class="row">

    <div class="col-md-12 col-lg-6 mb-4 ">
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="border">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <h2>No match</h2>
                        </button>
                        <div id="collapseOne" class="collapse show " data-parent="#accordion">
                            <div id="tblmatchno">
                                <table id="" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                No.
                                            </th>
                                            <th scope="col">
                                                No match
                                            </th>
                                            <th scope="col">
                                                Fecha
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>1</td>
                                        <td>Imagen del la empresa Nombre de la empresa  Valoración</td>
                                        <td>Fecha</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-6 mb-4 ">
        <div class="card">
            <div class="card-body">
                <div id="accordion1">
                    <div class="border">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h2>Afiliaciones mensuales</h2>
                        </button>
                        <div id="collapseTwo" class="collapse show " data-parent="#accordion1">
                            <div id="tablaAfilMen">
                                <table id="" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                No.
                                            </th>
                                            <th scope="col">
                                                Empresa
                                            </th>
                                            <th scope="col">
                                                Fecha
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>1</td>
                                        <td>Imagen del la empresa Nombre de la empresa  Valoración</td>
                                        <td>Fecha</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<div class="row">
    <div class="col-12 col-lg-6 mb-4">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container-g3"></div>
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
                    <div id="container-g4"></div>
                    <p class="highcharts-description">
                        &nbsp;
                    </p>
                </figure>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="col-12 mb-2 mt-4">
            <hr>
        </div>
        <div class="col-md-12">
            <h5 class=" card-title mb-4">
                <i class="simple-icon-list"></i>
                Últimas 10 afiliaciones
                <div id="Lista_afiliaciones"><span class="text-primary float-right"><small>Mostrando 0 de 0</small></span></div>

            </h5>

            <div id="tablaAfiliados">
                <table id="" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                No.
                            </th>
                            <th scope="col">
                                Comercio
                            </th>
                            <th scope="col">
                                Banges
                            </th>
                            <th scope="col">
                                Oportunidades de negocio
                            </th>
                            <th>
                                Requerimientos
                            </th>
                            <th >
                                Notas
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                No.
                            </td>
                            <td>
                            <div class = "row" style = "width :100%">

<div class = "col">

    <div >

        <img src="<?=base_url("static/uploads/archivos/logo_default.png")?>" alt="animales del bajio" style="max-height: 200px !important;">

    </div>

    <div>

        <small class = "text-muted">

            <div>

                Animales del bajío&nbsp;

            </div>

            <div>

                20 de octubre 2021



            </div>

            <div>

                <span>

                    <div>

                        <b>Servicios en: </b>

                        <br>Cría de animales

                    </div>

                    <div>



                        <b>Este perfil no cuenta con keywords</b>



                    </div>

                </span>

                <hr>

            </div>

            <div class = "container">

                <div class = "row">

                    'No hay medallas para mostrar'

                </div>

            </div>



        </small>

    </div>

</div>

</div>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <button class="btn btn-warning default">
                                    <a href="<?= base_url() .
                                    'app/presidencia/detallenotas/'?>">
                                    Ver notas
                                </a>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


