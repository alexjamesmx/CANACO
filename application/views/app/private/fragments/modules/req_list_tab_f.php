
                                <h5 class=" card-title mb-4">
                                    <i class="simple-icon-list"></i>
                                    Mis requerimientos
                                    <span class="text-primary float-right">
                                        <small>
                                            <?php if (isset($arr_lista_req)) { ?>
                                                Mostrando 10 de <?php echo(count($arr_lista_req)); ?>
                                            <?php } ?>
                                        </small>
                                    </span>
                                </h5>

                                <div class="col-md-12">
                                    <div class="no-more-tables">
                                        <table id="controls-data-tables-pagination"
                                        class="data-table nowrap table table-bordered table-striped"
                                        data-order="[[ 0, &quot;desc&quot; ]]">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">
                                                    No.
                                                </th>
                                                <th scope="col">
                                                    Fecha de publicación
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
                                        <tbody>
                                            <?php if (isset($arr_lista_req)) { ?>
<!--                                                   <pre>
                                                    <?php echo(print_r($arr_lista_req)); ?>
                                                </pre>    -->
                                            <?php foreach ($arr_lista_req as $rq): ?>
                                                <tr>
                                                    <td data-title="No.">
                                                        #1737
                                                    </td>
                                                    <td data-title="Comercio">

                                                        <h3 class="p-0 m-0 mb-2">
                                                            <a href="" class="btn btn-link p-0 m-0">
                                                                <i class="fas fa-store-alt"></i>
                                                                <?php echo($rq->fecha_req); ?>
                                                            </a>
                                                        </h3>

                                                    </td>
                                                    <td data-title="Solicitud">
                                                        <?php echo $rq->especificaciones; ?>
                                                    </td>
                                                    <td data-title="Estatus actual">
                                                        <h5 class="text-center">
                                                            <i class="fas fa-clock"></i>
                                                            <br>
                                                                <?php 
//echo(print_r($rq->respuestas));
 
                                                                if($rq->contadores['cont_seleccionado']>= 1){
                                                                    echo($rq->comentarios['cont_seleccionado']);
                                                                }elseif($rq->contadores['cont_conresp']>= 1){
                                                                    echo($rq->comentarios['cont_conresp']);
                                                                }else{
                                                                    echo($rq->comentarios['cont_guardadoenv']);
                                                                }                                                               ?>
                                                        </h5>
                                                    </td>
                                                    <td data-title="Acciones">
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary default btn-default">
                                                                <i class="fas fa-comment"></i>
                                                                <br>
                                                                <?php 

                                                                if($rq->contadores['cont_seleccionado']>= 1){
                                                                    echo($rq->contadores['cont_seleccionado']);
                                                                }elseif($rq->contadores['cont_conresp']>= 1){
                                                                    echo($rq->contadores['cont_conresp']);
                                                                }else{
                                                                    echo($rq->contadores['cont_guardadoenv']);
                                                                }
                                                                ?> Postulaciones


                                                                Ver detalle
                                                            </button>
                                                            <button class="btn btn-danger default btn-default">
                                                                <i class="fas fa-times"></i>
                                                                <br>
                                                                Cancelar solicitud
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                              
                                            <?php endforeach;?>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
