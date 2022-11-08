<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class=" card-title mb-4">
                    <i class="simple-icon-list"></i>
                    Requerimeintos ignorados
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
                                        Comercio
                                    </th>
                                    <th scope="col">
                                        Solicitud
                                    </th>
            
                                </tr>
                            </thead>
                            <tbody>
                            <input type='hidden' value='<?= json_encode(
                            $requerimientos
                            ) ?>' id='info'>
                            <?php 
                            $i=0;
                             if (isset($requerimientos)) { 
                                foreach ($requerimientos as $req) {
                                $divmagic = 'magic' . $i;
                                $i++;
                               ?>
                                <tr>
                                    <td>
                                        <p>#<?= $req->opnegocio_id ?></p>
                                    </td>
                                    <td>
                                        <div id='<?= $divmagic ?>' class = "row" style = "width :100%">
                                           
                                        </div>
                                    </td>
                                    <td>
                                        
                                            <h5 class="p-0 m-0 mb-6"><strong>Lo que está buscando: </strong><?= $req->busq_nec?></h5>
                                            <h5 class="p-0 m-0 mb-6"><strong>Especificaciones técnicas: </strong><?= $req->especificaciones ?></h5>
                                            <h5 class="p-0 m-0 mb-6"><strong>Cantidad: </strong><?= $req->qty?></h5>
                                            <h5 class="p-0 m-0 mb-6"><strong>Fecha de publicacion: </strong><?= fancy_date($req->fecha_req,'d-m-y') ?></h5>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>