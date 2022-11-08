
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title"></h5>      
                <div class=" container">
                    <div class="row">
                        <div class="col-4">
                            <div class= "row">
                                <img  width="150" height="auto" src="https://impactosdigitales.com/img/logo-desarrollo-paginas-ecommerce.png" alt="">
                            </div>
                            <br/>
                            <div class= "row">Impactos digitales </div>
                            <br/>
                            <div class= "row">
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
                        <div class="col-8">
                            Info de la empresa
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-10"></div>
    <div class="col-2">
        <button type="button" class="btn btn-outline-primary default" data-toggle="modal"
        data-target="#addNota">
        Agregar nota
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addNota" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <form>
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nota</label>
                        <textarea placeholder="" class="form-control" rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<br/>
<br/>
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
                                Contenido de nota
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