<form id="form-update-comercio" action="<?= base_url('app/Prueba_d/upnegocio') ?>" class="validate-ptp" method="post" data-type="json">
    <?php foreach ($account_data_n as $account) { ?>
        <div class="form-row mt-4 mb-3">
            <div class="col-md-12">
                <h6>Datos generales del comercio </h6>
                <hr>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre_comercio">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Nombre comercial:
                </label>

                <input type="text" name="nombre_comercio" id="nombre_comercio" class="form-control required" required maxlength="150" value="<?= $account->negocio_nombre ?> ">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>
            <div class="form-group col-md-4">
                <label for="fiscales">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    ¿Cuántos empleados tienes?
                </label>
                <select class="form-select form-control" aria-label="Default select example" name="empleados" id="empleados">
                    <option selected><?= $account->negocio_tipo_empresa ?></option>
                    <option value="Micro">1 a 5 [Micro]</option>
                    <option value="Pequeña ">5 a 30 [Pequeña]</option>
                    <option value="Mediana"> 31 a 100 [Mediana]</option>
                    <option value="Grande"> Más de 100 [Grande]</option>
                </select>
            </div>

            <?php if (!$account->negocio_rfc == NULL) { ?>
                <div class="form-group col-md-4">
                    <label for="razon">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        Razón social:
                    </label>
                    <input type="text" name="razon" id="razon" class="form-control required" required maxlength="150" value="<?= $account->negocio_razon ?> ">
                    <small class="form-text text-muted">
                        Razón social...
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <label for="fiscales">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        ¿Física o moral?:
                    </label>
                    <select class="form-select form-control" aria-label="Default select example" name="fiscales" id="fiscales">
                        <option selected><?= $account->negocio_persona ?></option>
                        <option value="fisica">Física</option>
                        <option value="moral">Moral</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="patronal">
                        <sup></sup>
                        Registro patronal: (Opcional)
                    </label>
                    <input type="text" name="patronal" id="patronal" class="form-control" maxlength="150" style="text-transform:uppercase" value="<?= $account->registro_patronal ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="RFC">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        RFC:
                    </label>
                    <input type="text" name="RFC" id="RFC" class="form-control required" required maxlength="150" style="text-transform:uppercase" value="<?= $account->negocio_rfc ?>">
                    <small class="form-text text-muted">
                        DDAC545...
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <label for="RFC">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        Confirma tu RFC:
                    </label>
                    <input type="text" name="CRFC" id="CRFC" class="form-control required" required maxlength="150" style="text-transform:uppercase" value="<?= $account->negocio_rfc ?>">
                    <small class="form-text text-muted">
                        DDAC545...
                    </small>
                </div>

                <div class="form-group col-sm-6 ">
                    <label for="liga">
                        <sup></sup>
                        ¿Cuentas con tienda online ecommerce?
                        <br>

                    </label>
                    <input type="text" name="ecomers" id="ecomers" class="form-control " value="<?= $account->negocio_liga_ecomers ?>">
                    <small class="form-text text-muted">
                        Agrega la liga de tu sitio web
                    </small>
                </div>
            <?php } ?>
            <div class="form-group col-sm-12">
                <label for="show_direc"> <strong> ¿Tiene punto de atención
                        a clientes? </strong> </label>
                <div class="custom-switch custom-switch-primary mb-2">
                    <input class="custom-switch-input" id="show_direc" name="show_direc" type="checkbox">
                    <label class="custom-switch-btn" for="show_direc"> </label>
                </div>
            </div>

            <div class="form-group col-sm-6 group-direc" style="display: none;">
                <label for="calle">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Calle:
                </label>
                <input type="text" name="calle" id="calle" class="form-control " maxlength="40" value="<?= $account->negocio_calle ?>">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>

            <div class="form-group col-sm-6 group-direc " style="display: none;">
                <label for="colonia">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Colonia:
                </label>
                <input type="text" name="colonia" id="colonia" class="form-control " maxlength="40" value="<?= $account->negocio_colonia ?>">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>
            <div class="form-group col-sm-4 group-direc" style="display: none;">
                <label for="exterior">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Número exterior:
                </label>
                <input type="text" name="exterior" id="exterior" class="form-control " maxlength="40" value="<?= $account->negocio_numero_ex ?>">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>
            <div class="form-group col-sm-4 group-direc " style="display: none;">
                <label for="interior">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Número interior:
                </label>
                <input type="text" name="interior" id="interior" class="form-control " maxlength="40" value="<?= $account->negocio_numero_int ?>">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>
            <div class="form-group col-sm-4 group-direc" style="display: none;">
                <label for="cp">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Código postal:
                </label>
                <input type="text" name="cp" id="cp" class="form-control " maxlength="40" value="<?= $account->negocio_cp ?>">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>
            <div class="form-group col-sm-4 group-direc " style="display: none;">
                <label for="interior">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                    Número interior:
                </label>
                <input type="text" name="interior" id="interior" class="form-control " maxlength="40" value="<?= $account->negocio_numero_int ?>">
                <small class="form-text text-muted">
                    &nbsp;
                </small>
            </div>


            <div class="form-group col-sm-4 group-direc" style="display: none;">

                <label for="liga">
                    <sup></sup>
                    Liga de google maps:
                </label>
                <input type="text" name="liga" id="liga" class="form-control " value="<?= $account->negocio_liga_google ?>">
                <small class="form-text text-muted">
                    Valor para tu perfil medalla geolocalización
                </small>
            </div>
            <div class="form-group col-md-4 group-direc" style="display: none;">
                <label for="sucursales">
                    <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em; display: none;"></i></sup>
                    ¿Cuentas con sucursales?:
                </label>
                <select class="form-select form-control" aria-label="Default select example" name="sucursales" id="sucursales">
                    <option selected><?= $account->negocio_sucursales ?></option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
                <small class="form-text text-muted">
                    Medalla nueva
                </small>
            </div>

        </div>



        <div class="form-row">


            <div class="form-group col-sm-12">
                <button id="btn-sbmt-create-comercio" type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <!--    
                    <button id="btn-cancel-update-account" type="button" class="btn btn-danger" onclick="window.location.reload(true);">
                        <i class="fas fa-times"> </i> Cancelar
                    </button> -->
            </div>
        </div>

    <?php } ?>
</form>