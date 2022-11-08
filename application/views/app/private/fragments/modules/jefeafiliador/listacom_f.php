
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <div style = "display:none">                
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
                </div>
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Comercios
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div id="tablaAfiliados" style = "display: block;overflow-x: auto;" >
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
                                        Nombre de afiliador
                                    </th>


                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >

                                <?php if (isset($comercios)) {
                                    $i = 0; ?>
                                    <input type='hidden' value='<?= json_encode(
                                    count($comercios)
                                    ) ?>' id='info'>

                                    <?php foreach (
                                        $comercios
                                        as $com
                                    ) { ?>
                                        <?php
                                        $tipo_transaccion = null;
                                        $afiliadornombre = null;
                                        $divmagic = 'magic' . $i;
                                        $inputmagico = 'im' . $i;
                                        $i++;
                                        if (
                                         true
                                     ) { ?>
                                           <input type='hidden' value='<?=
                                           $com->usuario_id
                                       ?>' id='<?= $inputmagico ?>'>
                                       <?php   if(isset($com->nombre)){                                                            
                                        $afiliadornombre =
                                        '<b>'. $com->nombre .' </b> '.
                                        '<b>'. $com->apellido1 .' </b> '.
                                        '<b>'. $com->apellido2 .' </b>';
                                    }else{
                                        $afiliadornombre = '<b>Este comercio no tiene afiliador asignado</b>';
                                    }

                                }
                                ?>
                                <tr>
                                    <td>
                                        <?= $com->usuario_id ?>
                                    </td>
                                    <td> 
                                        <?= '<b>'.$com->nom.' '.$com->ap.' '.$com->ap2  ?>
                                        <div id='<?= $divmagic ?>'></div>
                                    </td>
                                    <td>
                                        <?php 
                                        echo $afiliadornombre; 
                                        ?>
                                    </td>

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
