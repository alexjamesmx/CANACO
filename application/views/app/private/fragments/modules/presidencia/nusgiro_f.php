<div class="row">
       <?= var_dump($giros) ?>
        <div class="col-12 mb-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class=" card-title mb-4">
                        <i class="simple-icon-list"></i>
                    Giros
                    <div id="Lista_afiliaciones"><span class="text-primary float-right"><small>Mostrando 0 de 0</small></span></div>
                </h5>
                <div class="col-md-12">
                        <div id="tblAfilAcumC">
                            <table id="controls-data-tables-pagination" class="data-table nowrap table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            No.
                                        </th>
                                        <th scope="col">
                                            Giros
                                        </th>
                                        <th scope="col">
                                            Comercio
                                        </th>
                                    <th scope="col">
                                            Fecha
                                        </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                   
                                <?php if(isset($giros)){
                                    foreach($giros as $giro){
                                    ?>
                                 <tr>
                                 
                                 <td><?=$giro->actividad_id ?> </td>
                                    <td scope="row"> <?=$giro->actividad?> </td>
                                    <td></td>
                                       <td></td>
                                    </tr>
                            <?php
                            }
                                } ?> 
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>