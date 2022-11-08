
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4 mt-4 ">
                    <div style = "display : none" class="col-12 col-lg-4">
                        <strong>
                            <i class="fas fa-filter"></i> 
                            Fecha de registro
                        </strong>
                        <div>
                            <select class="form-control form-control-sm rounded-right rounded-left`" id="select_fecha" name="afiliados">
                                <option value = "" label="Seleciona la opción"> Seleciona la opción</option>
                                <option value="0">Fecha de registro enlace</option>
                                <option value="1">Fecha de afiliación</option>
                                <option value="2">Fecha de última trnasacción</option>
                                <option value="3">Fecha de última publicación</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <strong>
                            <i class="fas fa-filter"></i> 
                            Afiliación
                        </strong>
                        <div>
                            <select id ="selet_data_afiliados" class="form-control form-control-sm rounded-right rounded-left`" id="afiliados" name="afiliados">
                                <option value = "" label="Seleciona la opción"> Seleciona la opción</option>
                                <option value="0">Comercios sin afiliación</option>
                                <option value="1">Comercios afiliados</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <strong>
                            <i class="fas fa-filter"></i> 
                            Productos y servicios
                        </strong>
                        <div>
                            <select id = "select_servicio"  class="form-control form-control-sm rounded-right rounded-left`" id="prodserv" name="prodserv">
                                <option value = "" label="Seleciona la opción">Seleciona la opción</option>
                                <option value="1">Solo productos</option>
                                <option value="2">Solo servicios</option>
                                <option value="3">Productos y servicios</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display:none" id ="form-date-1" class = "row mb-4 mt-4">
                    <div class = "col-12 col-lg-12">
                        <strong>
                            Fecha de registro enlace
                        </strong>
                    </div>    
                    <div class="col-6 col-lg-6">
                        <strong>
                            <i class ="fas fa-filter"></i>
                            Fecha inicial
                        </strong>
                        <div>
                            <input class="form-control" id = "fecha_init_1"  type="date" placeholder="Fecha inicio">
                        </div>
                    </div>
                    <div class= "col-6 col-lg-6">
                        <strong>
                            <i class = "fas fa-filter"></i>
                            Fecha final
                        </strong>
                        <div>
                            <input class= "form-control" id = "fecha_end_1"  type="date" placeholder="Fecha final">
                        </div>
                    </div>
                </div>
                <div style="display:none" id ="form-date-2" class = "row mb-4 mt-4">
                    <div class ="col-12 col-lg-12">
                        <strong>
                            Fecha de afiliación
                        </strong>
                    </div>
                    <div class="col-6 col-lg-6">
                        <strong>
                            <i class ="fas fa-filter"></i>
                            Fecha inicial
                        </strong>
                        <div>
                            <input class="form-control" id = "fecha_init_2"  type="date" placeholder="Fecha inicio">
                        </div>
                    </div>
                    <div class= "col-6 col-lg-6">
                        <strong>
                            <i class = "fas fa-filter"></i>
                            Fecha final
                        </strong>
                        <div>
                            <input class= "form-control" id = "fecha_end_2"  type="date" placeholder="Fecha final">
                        </div>
                    </div>
                </div>
                <div style="display:none" id ="form-date-3" class = "row mb-4 mt-4">
                    <div class = "col-12 col-lg-12">
                        <strong>
                            Fecha de ultima transaccion
                        </strong>
                    </div>        
                    <div class="col-6 col-lg-6">
                        <strong>
                            <i class ="fas fa-filter"></i>
                            Fecha inicial
                        </strong>
                        <div>
                            <input class="form-control" id = "fecha_init_3"  type="date" placeholder="Fecha inicio">
                        </div>
                    </div>
                    <div class= "col-6 col-lg-6">
                        <strong>
                            <i class = "fas fa-filter"></i>
                            Fecha final
                        </strong>
                        <div>
                            <input class= "form-control" id = "fecha_end_3"  type="date" placeholder="Fecha final">
                        </div>
                    </div>
                </div>  
                <div style="display:none" id ="form-date-4" class = "row mb-4 mt-4">
                    <div class = "col-12 col-lg-12">
                        <strong>
                            Fecha de ultima publicación
                        </strong>
                    </div>    
                    
                    <div class="col-6 col-lg-6">
                        <strong>
                            <i class ="fas fa-filter"></i>
                            Fecha inicial
                        </strong>
                        <div>
                            <input class="form-control" id = "fecha_init_4"  type="date" placeholder="Fecha inicio">
                        </div>
                    </div>
                    <div class= "col-6 col-lg-6">
                        <strong>
                            <i class = "fas fa-filter"></i>
                            Fecha final
                        </strong>
                        <div>
                            <input class= "form-control" id = "fecha_end_4"  type="date" placeholder="Fecha final">
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col">
                        <div class="input-group">
                            <button onclick = "filter()" class="form-control btn btn-primary" >Aplicar filtros</button>
                        </div>
                    </div>
                </div>
                
                <div id = "content_search"  class="row mb-4">
                    <div class="col">
                        <div class="input-group">
                            <input id= "search" type="text" class="form-control"
                            placeholder="Buscar por nombre o keyword">
                        </div>
                    </div>
                </div>
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Comercios
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div id="tablaAfiliados" style  = "overflow-x: auto; height:100%" >
                        <table id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        No.
                                    </th>
                                    <th scope="col">
                                        Comercio
                                    </th>
                                    <th scope="col">
                                        Fecha de enlace
                                    </th>
                                    <th th scope="col">Fecha de inicio de afilicacion </th>
                                    <th th scope="col">Fecha de fin de afilicacion </th>
                                    <th scope="col">
                                        Estatus
                                    </th>
                                    <th scope="col">
                                        Actividad
                                    </th>
                                    
                                    <th scope="col">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                                
                                <?php if (isset($comercios)) {
                                    foreach ($comercios as $com) { ?>
                                        <?php
                                        $afiliado_comercio = null;
                                        $fecha_inicio_afiliacion = null;
                                        $fecha_fin_afiliacion = null;
                                        $tipo_transaccion = null;
                                        $fecha_creacion = null;
                                        if (isset($com->fecha_creacion)) {
                                            $fecha_creacion = date(
                                                'Y-m-d',
                                                strtotime(
                                                    $com->fecha_creacion
                                                )
                                            );
                                        }
                                        if (isset($com->afiliado_canaco)) {
                                            if (
                                                $com->afiliado_canaco == '1'
                                            ) {
                                                $afiliado_comercio =
                                                'Afiliado';
                                                $fecha_inicio_afiliacion =
                                                $com->fecha_inicio_afiliacion;
                                                $fecha_fin_afiliacion =
                                                $com->fecha_fin_afiliacion;
                                            }
                                            if (
                                                $com->afiliado_canaco == '0'
                                            ) {
                                                $afiliado_comercio =
                                                'No afiliado';
                                            }
                                        }
                                        if (isset($com->tipo_transaccion)) {
                                            if (
                                                $com->tipo_transaccion == 1
                                            ) {
                                                $tipo_transaccion =
                                                'Solo productos';
                                            }
                                            if (
                                                $com->tipo_transaccion == 2
                                            ) {
                                                $tipo_transaccion =
                                                'Solo servicios';
                                            }
                                            if (
                                                $com->tipo_transaccion == 3
                                            ) {
                                                $tipo_transaccion =
                                                'Productos y servicios';
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <h2><?= $com->negocio_id ?></h2>
                                            </td>
                                            <td><h2><?= $com->negocio_nombre ?></h2></td>
                                            <td>
                                                <?= $fecha_creacion ?>
                                            </td>
                                            <td> <?= $fecha_inicio_afiliacion ?> </td>
                                            <td> <?= $fecha_fin_afiliacion ?> </td>
                                            <td>
                                                <?= $afiliado_comercio ?>
                                            </td>
                                            <td>
                                                <?= $tipo_transaccion ?>
                                            </td>
                                            <td></td>                              
                                        </tr>
                                    <?php }
                                } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
