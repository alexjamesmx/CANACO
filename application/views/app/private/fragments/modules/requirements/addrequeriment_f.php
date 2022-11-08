<?php
if (isset($republicar)) {
    $que_necesita = $republicar[0]->busq_nec;
    $cantidad = $republicar[0]->qty;
    $tiempo_entrega = $republicar[0]->entrega;
    $especificaciones = $republicar[0]->especificaciones;
    $republicar = true;
} else {
    $que_necesita = null;
    $cantidad = null;
    $tiempo_entrega = null;
    $especificaciones = null;
    $republicar = null;
}
?>
<div class="card mb-4">
    <div class="card-body">
        <form id="form-create-control" action="<?= base_url('app/requirements/addrequirement') ?>" class="validate-ptp" method="post" data-type="json">
            <h5 class="mb-4">Información del requerimiento</h5>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="control_sheet">
                        <h2>
                            <sup>
                                <i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i>
                            </sup>
                            1.- ¿Qué necesitas?
                        </h2>
                    </label>

                    <textarea name="que_necesita" id="que_necesita" class="form-control" required maxlength="300" placeholder="Más información" rows="2"><?= $que_necesita ?></textarea>
                    <small class="form-text text-primary">
                        <i class="fas fa-info-circle"></i> Instrucciones
                    </small>
                </div>
                <div class="form-group col-md-6">
                    <input type="hidden" name="republicar" id="republicar" class="form-control toupper" value="<?= $republicar ?>">
                    <label for="control_sheet">
                        <h2>
                            <sup>
                                <i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i>
                            </sup>
                            2.- ¿En qué cantidad?
                        </h2>
                    </label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" value="<?= $cantidad ?>" required maxlength="50" placeholder="Más información">
                    <small class="form-text text-primary">
                        <i class="fas fa-info-circle"></i> Instrucciones
                    </small>
                </div>

                <div class="form-group col-md-6">
                    <label for="control_sheet">
                        <h2>
                            <sup>
                                <i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i>
                            </sup>
                            ¿Cuál es tu tiempo de entrega?
                        </h2>
                    </label>
                    <select name="tiempo_entrega" id="tiempo_entrega" class="custom-select">
                        <option value> - - - - - </option>
                        <option value="1">Urgente (1 a 3 días)</option>
                        <option value="2">Prioritario (3 a 15 días)</option>
                        <option value="3">Regular (estandares del mercado)</option>
                    </select>
                    <small class="form-text text-primary">
                        <i class="fas fa-info-circle"></i> Instrucciones
                    </small>
                </div>
                <div class="form-group col-md-12">
                    <label for="control_sheet">
                        <h2>
                            <sup>
                                <i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i>
                            </sup>
                            Especificaciones técnicas
                        </h2>
                    </label>
                    <textarea maxlength="300" class="form-control" id="especificaciones" name="especificaciones" rows="3" placeholder="Más información"><?= $especificaciones ?></textarea>
                    <small class="form-text text-primary">
                        <i class="fas fa-info-circle"></i> Instrucciones
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <button id="btn-newreq-next-step" class="btn btn-primary default btn-block" type="button">
                        Continuar
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <div class="form-group col-md-4 d-none d-md-block d-lg-block d-xl-block">&nbsp;
                </div>
                <div class="form-group col-md-4">
                    <button class="btn btn-danger default btn-block" type="button" onclick="">
                        <i class="fas fa-times-circle"></i>
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>