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
<div id="modal-editkeywords" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus"></i>
                    Modificar palabras clave (keywords)
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="row" id="form-add-keywords" name="form-add-keywords">
                    <div class="col-sm-12 form-group">
                        <label for="" class="form-label">
                            <strong style="font-size: 1.3em !important;">
                                1.- ¿Ofreces producto, servicios o ambos?
                            </strong>
                        </label>
                        <select class="form-control" id="edit-prodserv" name="edit-prodserv">
                            <option label="&nbsp;"> &nbsp;</option>
                            <option value="1">Solo productos</option>
                            <option value="2">Solo servicios</option>
                            <option value="3">Productos y servicios</option>

                        </select>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="" class="form-label">
                            <strong style="font-size: 1.3em !important;">
                                2.- Busca o teclea la actividad que mejor describa tus productos o
                                servicios:
                            </strong>
                        </label>
                        <select class="form-control select2-single" data-width="100%" id="edit-tactividad" name="edit-tactividad">
                            <option label="&nbsp;"> &nbsp;</option>
                            <?php foreach ($tipos_actividad as $k => $v): ?>
                            <optgroup label="<?=$v['actividad']->actividad?>">
                                <?php foreach ($v['tipos'] as $k2 => $v2): ?>
                                <option value="<?=$v2->tactividad_id?>">
                                    <?=$v2->tipo_actividad?>
                                </option>
                                <?php endforeach;?>
                            </optgroup>
                            <?php endforeach;?>
                            <optgroup label="Industrias manufactureras">
                                <option value="1">Industria alimentaria</option>
                                <option value="2">Industria de las bebidas y del tabaco</option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-link text-primary">
                            ¿No encuentras tu tipo de actividad, <u>contáctanos</u>?
                        </button>
                    </div>
                    <div class="col-sm-12 form-group mt-3">
                        <label for="" class="form-label">
                            <strong style="font-size: 1.3em !important;">
                                3.- Teclea <em>¿cómo buscan tus productos o servicios tus clientes
                                    en Google?</em>
                                (separa por comas cada palabra clave, keywords):
                            </strong>
                        </label>
                        <input data-role="tagsinput" type="text" class="form-control" id="edit-keywords"  name="keywords">
                    </div>
                    <div class="col-sm-12 form-group mt-3">
                        <button class="btn btn-primary default btn-lg btn-sbmt-addkeyword">
                            <i class="fas fa-save"></i>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
         </div>
    </div>
</div>
