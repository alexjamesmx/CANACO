<?php
$account = $account_data_n[0];
?>
<form id="form-edit-myaccount-pass" action="<?=base_url($section_data->url_sec . 'doupdatepass')?>" class="validate-ptp" method="post" data-type="json">
    <div class="form-row mt-4 mb-3">

    </div>


    <div class="form-row">        
        <div class="form-group col-sm-6 group-password"
        style="display: block;">
        <label for="password_e">
            <sup><i class="fas fa-asterisk text-danger"
                style="font-size: 0.7em;"></i></sup>
                Contraseña:
            </label>
            <input autocomplete="off" type="password" name="password" id="password"
            class="form-control required" required 
            maxlength="12" placeholder="Min. 8 caracteres"> 
            <small class="form-text text-muted">
                &nbsp;
            </small>
        </div>

        <div class="form-group col-sm-6 group-password"
        style="display: block;">
        <label for="password_c_e">
            <sup><i class="fas fa-asterisk text-danger"
                style="font-size: 0.7em;"></i></sup>
                Confirmar contraseña:
            </label>
            <input type="password" name="password_c" id="password_c"
            class="form-control required" required
            maxlength="12" placeholder="Min. 8 caracteres">
            <small class="form-text text-muted">
                &nbsp;
            </small>
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-sm-12">
            <button id="btn-sbmt-update-account-pass" type="submit"
            class="btn btn-primary default">
            <i class="fas fa-save"></i> Guardar
        </button>

        <button id="btn-cancel-update-account-pass" type="button"
        class="btn btn-danger default"
        onclick="window.location.reload(true);">
        <i class="fas fa-times"> </i> Cancelar
    </button>
</div>
</div>
</form>
