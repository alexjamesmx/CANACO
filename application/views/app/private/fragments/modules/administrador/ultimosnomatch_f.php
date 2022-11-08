<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    No match
                </h5>
                <div class="col-md-12 table-responsive">
                    <div class="no-more-tables ">
                    </div>
                    <div style ="overflow-x:auto;" id="tablaAfiliados" >
                        <table  id="lista_tbody"  class="data-table nowrap table table-bordered table-striped " data-order="[[ 0, &quot;desc&quot; ]]">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        Keyword
                                    </th>
                                    <th th scope="col">
                                        Fecha de publicacion
                                    </th>
                                    <th scope="col">
                                        Id de usuario que busco (ultimo)
                                    </th>
                                    <th scope="col">
                                        Veces buscada
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyContent" >
                                <?php if(isset($nomatchs)){ foreach($nomatchs as $nm){ ?>
                                 <tr>
                                    <th scope="col">
                                        <?= $nm->keyword ?>
                                    </th>
                                    <th th scope="col">
                                        <?= $nm->date_nomatch ?>
                                    </th>
                                    <th scope="col">
                                        
                                        <?= $nm->usuario_id ?>
                                    </th>
                                    
                                    <th scope="col">
                                        
                                        <?= $nm->no_keys ?>
                                    </th>
                                  
                                    
                                </tr>

                                
                              <?php  } //for
                                } //if
                              ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>