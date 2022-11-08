
<div class="row">
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

<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    top 20 Afiliadores
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>clave_empleado</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >   
                                 
                                <?php if(isset($afiliadores)): foreach($afiliadores as $afiliador){?>
                                    <tr>
                                                <td>
                                                <strong> </strong>
                                                <?= $afiliador->nombre ?> 
                                                        <br>
                                                        <?= $afiliador->apellido1 ?>
                                                        <br>
                                                        <?= $afiliador->apellido2 ?>
                                                        <br>
                                                </td>
                                                <td>
                                                <strong> 
                                                     <?= $afiliador->clave_empleado ?> 
                                                </strong>
                                            
                                       
                                               
                                     </td>
                                <?php } endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>