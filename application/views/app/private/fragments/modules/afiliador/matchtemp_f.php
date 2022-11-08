<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title"></h5>      
                <div class=" container">
                    <div class="row">
                        <div class="col-4">
                            <div class="container">
                                <div class="row">
                                    <img src=<?=base_url().'static/admin/img/logo-panel-desk.png" alt=""'?>>
                                </div>
                                <br/>
                                <div class= "row">Canaco </div>
                                <br/>
                                <div class="row">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item"><i class="simple-icon-star"></i></li>
                                        <li class="list-inline-item"><i class="simple-icon-star"></i></li>
                                        <li class="list-inline-item"><i class="simple-icon-star"></i></li>
                                        <li class="list-inline-item"><i class="simple-icon-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">info de la empresa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <!--card-->
  <?php 
  $for = 3; 
  for ($i=0; $i < $for; $i++){
    ?>
    <div class="col-md-6 col-sm-6 col-lg-4 col-12 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">Fecha</div>
                            <div class="col-6">Hora</div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                Titulo
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                INFO REQUERIMEINTO
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End cards-->
    <?php
}
?>

</div>
