<div class="card mb-4">
    <div>
        <div class="card-body" id='mis_requerimientos'>
            <h5 class=" card-title mb-4">
                Mis requerimientos
                <div id='requerimientos_mostrados'>
                    <span class="text-primary float-right">
                        <small>
                        </small>
                    </span>
                </div>
            </h5>
            <div class="col-md-12" style="padding:0;margin:0;">
                <div class=" no-more-tables">
                    <div class="form-check form-check-inline">
                        <div class="mb-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sipude" value="0" id="todos" onclick="todos()">
                                <label class="form-check-label" for="p-fisica">
                                    Mostrar Todos
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <div class="mb-0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="sipude" id="activos" onclick="activos()">
                                <label class="form-check-label" for="p-moral">
                                    Mostrar activos
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='tablareq' class='table-responsive'>
                </div>
            </div>
        </div>
    </div>
</div>