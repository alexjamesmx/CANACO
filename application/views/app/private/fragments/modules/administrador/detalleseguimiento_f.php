<input type='hidden' id='anid' value='<?=$usuario[0]->usuario_id?>'>
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title"></h5>      
                <div class=" container">
                    <div class="row">
                    <div class="col-4">
                    <input type='hidden' value='0' id='info'>
                        <div class="row" id='magic0'>

                        </div>
                        <input type='hidden' value='<?= $usuario[0]->usuario_id?>' id='im0'>
                    </div>
                        <div class="col-8">
                        <td>
                                <b>Telefono:</b> <br> <?=$usuario[0]->telefono_auth ?>
                                <hr>
                                <b>Email:</b> <br>  <?=$usuario[0]->email_auth?>
                                <hr>
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
        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
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
                        <input type="text" id='nota_titulo' class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nota</label>
                        <textarea placeholder="" id='nota_cuerpo' class="form-control" rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Cerrar</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="alta_nota(<?=$usuario[0]->usuario_id?>)">Guardar</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<br/>
<br/>
<div class="row" id='notas'>
  <!--card-->
 

</div>