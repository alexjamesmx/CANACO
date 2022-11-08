<?php
$arr_tipo_actividad = array(
    '1' => 'Productos',
    '2' => 'Servicios',
    '3' => 'Productos y servicios'
); 

?>
                             <?php 
                                    if (!isset($info[0]->negocio_logo)) { 
                                        $logo='logo_default.png';
                                    }else{
                                        $logo=$info[0]->negocio_logo;
                                    } 
                                ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 col-md-6  col-center">                        
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="glide details">
                                                                    <h2 class="col-12 mt-2 mb-4 text-center">
                                                                        <strong>
                                                                            <?= $info[0]->negocio_nombre ?>
                                                                        </strong>
                                                                    </h2>
                                                                    <div class="glide__track" data-glide-el="track">
                                                                                <img alt="detail" src="<?=base_url()?>static/uploads/perfil/<?= $logo ?>"
                                                                                    class="responsive border-0 border-radius img-fluid mb-3" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                        <div class="card">
                                                                <div class="card-header">
                                                                    <ul class="nav nav-tabs card-header-tabs " role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab"
                                                                                aria-controls="first" aria-selected="true">Medallas</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                                                                                aria-controls="second" aria-selected="false">Insignias</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab"
                                                                                aria-controls="third" aria-selected="false">Keywords</a>
                                                                        </li>    
                                                                    </ul>
                                                                </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                                <div class="tab-pane fade show active" id="first" role="tabpanel"
                                                                    aria-labelledby="first-tab">
                                                                    <?php  if (isset($medallas)) { foreach($medallas as $medalla):  ?>  
                                                                     
                                                                        <table class="table table-borderless">
                                                                            <thead>
                                                                         
                                                                            
                                                                                <tr>
                                                                                    <th scope="col">Medalla</th>
                                                                                    <th scope="col">Nombre</th>
                                                                                    <th scope="col">Descripción</th>
                                                                                </tr>
                                                                                
                                                                            </thead>
                                                                            <tbody>
                                                                            
                                                                                <tr> 
                                                                                    <td> <img src="<?=base_url('static/recompensas/medallas/'.$medalla->medalla_img)?>"
                                                                                            class="img-fluid d-block mx-auto "
                                                                                            style="max-height: 45px; " disabled></td>
                                                                                    <td><?=$medalla->medalla_nombre ?></td>
                                                                                    <td><?=$medalla->medalla_descripcion ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                        <?php endforeach; } else{ echo('No cuenta con medallas');}?> 
                                                                </div>
                                                                <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                                                                    
                                                                           
                                                                        <?php  if (isset($insignias)) { foreach($insignias as $insignia):  ?>      
                                                                        <table class="table table-borderless">
                                                                             
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">Insigina</th>
                                                                                    <th scope="col">Nombre</th>
                                                                                    <th scope="col">Descripción</th>
                                                                                </tr>
                                                                                
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td> <img src="<?=base_url('static/recompensas/insignias/'.$insignia->insignia_img)?>"
                                                                                            class="img-fluid d-block mx-auto "
                                                                                            style="max-height: 45px; " disabled></td>
                                                                                    <td><?=$insignia->insignia_nombre ?></td>
                                                                                    <td><?=$insignia->insignia_descripcion ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <?php endforeach; }else{echo('No cuenta con Insignia');} ?> 
                                                                    
                                                                </div>

                                                                <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="second-tab">
                                                                    <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                                                    <div>
                                                                        <?php  if(isset($keys)){ ?>   
                                                                            
                                                                        <ul>
                                                                            <?php  foreach($keys as $key){ ?>
                                                                                
                                                                                    <span class="badge  badge-outline-theme-3 m-1" style="font-size: 1.0em !important; display: inline-block;">
                                                                                        <i class="fas fa-hashtag fa-xs"></i>
                                                                                        <?= $key->keyword; ?> 
                                                                                    </span>
                                                                            <?php  } }?>
                                                                        </ul>
                                                                    
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                </div>
                                            </div>
                                        </div>  
                                        
                </div>
                <!-- aqui todo ben -->
                                <div class="col-6 col-md-6  col-right">
                                            <div class="card mb-4">
                                                <div class="position-absolute card-top-buttons">
                                                <button   button class="btn btn-header-light icon-button">
                                                
                                                </button>
                                                </div>
                                                <div class="card-body">
                                                    <p class="mb-3">
                                                                <strong><?=($coms[0]->negocio_razon); ?></strong><br>         
                                                                        <?php if(isset($info[0]->negocio_rfc)){ ?>
                                                                            
                                                                            <i class="far fa-file-alt text-primary"  
                                                                            style="max-height: 80px;  "></i>  Este comercio factura  
                                                                        <?php }else{ echo '<i class="far fa-file-alt text-primary"  
                                                                            style="max-height: 80px;  "></i> Este comercio co factura'; } ?>
                                                                        <br>
                                                                        <i class="fas fa-calendar-day text-primary"></i> <?= 'Registrado desde: '. fancy_date(
                                                                        $coms[0]->fecha_creacion,
                                                                        'd-m-y'
                                                                    ) ?>
                                                        <br /><br />
                                                        <hr>
                                                    </p>
                                                    <strong class="d-block mb-2 text-primary ">
                                                    
                                                                                    Promedio de valoración
                                                                                </strong>
                                                                                 <br>
                                                                                <h1 class="d-block mb-2 text-primary ">
                                                                                        <strong class=" mb-2 text-primary ">
                                                                                            <?=$coms[0]->negocio_calif?></strong> 
                                                                                    </h1>
                                                                                    <br>
                                                                                    <div class="d-block  text-primary ">
                                                                                    <?php
                                                                                    $e = intdiv($coms[0]->negocio_calif,1);
                                                                                    $r = fmod($coms[0]->negocio_calif, 1);
                                                                                    for ($i=1; $i <= $e; $i++) { 
                                                                                ?>
                                                                                        <i class="fas fa-star"></i>
                                                                                <?php
                                                                                    }
                                                                                    if(($r)>0){
                                                                                    echo '<i class="fas fa-star-half"></i>';
                                                                                    } 
                                                                                ?> 
                                        
                                                                                    </div>
                                                                              
                                                </div>
                                            </div>
                                    <div class="card mb-4 md-4 d-lg-block">
                                        <div class="card-body">
                                            <h5 class="card-title"><span>Documentos</span>
                                            
                                            </h5>
                                            <div class="col-6">
                                            <?php if( !isset($get_docs[0]->cv_doc) || $get_docs[0]->cv_doc =='' ){ ?>
                                            Este perfil no tiene Curriculum
                                            <?php } else{ ?>
                                                <strong>Curriculum</strong>
                                                <hr>
                                                <button onclick="abrircurriculum()" class="btn btn-primary default"  >
                                                Ver documento
                                                                </button>  
                                                                <hr>
                                                <?php } ?>
                                            </div>
                                            <div class="col-6">
                                            <?php if( !isset($get_docs[0]->cv_catalgo) || $get_docs[0]->cv_catalgo =='' ){ ?>
                                             
                                                Este perfil no tiene catálogo
                                            <?php } else{ ?>
                                                <button onclick="abrircatalogo()" class="btn btn-primary default"  >
                                                                    Ver documento
                                                                </button>  
                                                <?php } ?>
                                                <hr>
                                                Tienda Online:
                                                
                                                <?php if (isset($coms[0]->negocio_liga_ecomers) ){?>
                                                    
                                                    <a onclick="window.open('<?= $coms[0]->negocio_liga_ecomers ?>', '_blank')" 
                                                    href="#" >
                                                    <strong>
                                                
                                                <?= $coms[0]->negocio_nombre ?>
                                                </strong>
                                                </a>
                                                <?php }else{echo('No tiene tienda online');}?>
                                                <hr>
                                                Liga de google maps:
                                                <?php if (isset($coms[0]->negocio_liga_google) ){?>
                                                    
                                                    <a onclick="window.open('<?= $coms[0]->negocio_liga_google ?>', '_blank')" 
                                                    href="#" >
                                                    <strong>
                                                Ubicación  
                                                <?= $coms[0]->negocio_nombre ?>
                                                </strong>
                                                </a>
                                                <?php }else{echo('No tiene tienda online');}?>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-select-all-ckbx" onclick='window.close()'>
                            <strong>
                                <u>
                                    Regresar
                                </u>
                            </strong>
                        </button>
                                </div>

            <!-- todo ok -->
         <!-- inicio modal -->
         <div id="doc_cv" class="modal fade" role="dialog" aria-hidden="true">    
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fas fa-eye"></i>
                                            Vista del documento Curriculum
                                    </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="fas fa-times"></i>
                                            </span>
                                        </button>
                                        <hr>
                                </div>
                                <div class="modal-body">                                                       
                                    <iframe src="<?=base_url().'static/uploads/archivos/'.$get_docs[0]->cv_doc?>" width="100%"
                                                height="1000"></iframe>
                                </div>                                                 
                    </div>
                </div>
         </div>
        <!-- fin modal -->
                 <!-- inicio modal -->
         <div id="doc_cata" class="modal fade" role="dialog" aria-hidden="true">    
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="fas fa-eye"></i>
                                        Vista del documento Catalpg
                                </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </button>
                            </div>
                                <div class="modal-body">                                                       
                                    <iframe src="<?=base_url().'static/uploads/archivos/'.$get_docs[0]->cv_catalgo?>" width="100%"
                                                height="1000"></iframe>
                                </div>                                                 
                                                                                 
                    </div>
                </div>
        </div>
        <!-- fin modal -->