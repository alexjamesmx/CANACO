<style>
.modal-open .select2-container {
    z-index: 9999 !important;
}

.select2-container--bootstrap .select2-results__group {
    z-index: 9999 !important;
    color: #000 !important;
    display: block;
    padding: 6px 12px;
    font-size: 13px;
    line-height: 1.42857143;
    white-space: nowrap;
}

</style>
<div id="modal-addnotaafilporvalidar" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nota</h5>
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
                        <textarea placeholder="" class="form-control" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary default"
                data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary default">Guardar</button>
            </div>
        </div>
    </div>
</div>