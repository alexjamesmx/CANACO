<form id="form-edit-myaccount"
        action="<?=base_url($section_data->url_sec . 'doupdate')?>"
        class="validate-ptp" method="post" data-type="json">
        <div class="form-row mt-4 mb-3">
            <div class="col-md-12">
                <h6>Información personal</h6>
                <hr>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="nombre">
                    <sup><i class="fas fa-asterisk text-danger"
                        style="font-size: 0.7em;"></i></sup>
                        Nombre:
                    </label>
                    <input type="text" name="nombre" id="nombre"
                    class="form-control required" required
                    maxlength="150" value="<?=$account_data->nombre?>">
                    <small class="form-text text-muted">
                        &nbsp;
                    </small>
                </div>

                <div class="form-group col-sm-4">
                    <label for="apellido1">
                        <sup><i class="fas fa-asterisk text-danger"
                            style="font-size: 0.7em;"></i></sup>
                            Primer apellido:
                        </label>
                        <input type="text" name="apellido1" id="apellido1"
                        class="form-control required" required
                        maxlength="150"
                        value="<?=$account_data->apellido1?>">
                        <small class="form-text text-muted">
                            &nbsp;
                        </small>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="apellido2">
                            Segundo apellido:
                        </label>
                        <input type="text" name="apellido2" id="apellido2"
                        class="form-control" maxlength="150"
                        value="<?=$account_data->apellido2?>">
                        <small class="form-text text-muted">
                            &nbsp;
                        </small>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-sm-6">
                        <label for="telefono_auth">
                            <sup><i class="fas fa-asterisk text-danger"
                                style="font-size: 0.7em;"></i></sup>
                                Teléfono:
                            </label>
                            <input type="tel" name="telefono_auth"
                            id="telefono_auth"
                            class="form-control required local-phone" required
                            maxlength="15"
                            value="<?=$account_data->telefono_auth?>">
                            <small class="form-text text-muted">
                                &nbsp;
                            </small>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="telefono_auth_c">
                                <sup><i class="fas fa-asterisk text-danger"
                                    style="font-size: 0.7em;"></i></sup>
                                    Confirmar teléfono:
                                </label>
                                <input type="tel" name="telefono_auth_c"
                                id="telefono_auth_c"
                                class="form-control required local-phone" required
                                maxlength="15"
                                value="<?=$account_data->telefono_auth?>">
                                <small class="form-text text-muted">
                                    &nbsp;
                                </small>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="email_auth">
                                    <sup><i class="fas fa-asterisk text-danger"
                                        style="font-size: 0.7em;"></i></sup>
                                        E-mail:
                                    </label>
                                    <input type="email" name="email_auth" id="email_auth"
                                    class="form-control required" required
                                    maxlength="70"
                                    value="<?=$account_data->email_auth?>">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="email_auth_c">
                                        <sup><i class="fas fa-asterisk text-danger"
                                            style="font-size: 0.7em;"></i></sup>
                                            Confirmar e-mail:
                                        </label>
                                        <input type="email" name="email_auth_c"
                                        id="email_auth_c" class="form-control required"
                                        required maxlength="70"
                                        value="<?=$account_data->email_auth?>">
                                        <small class="form-text text-muted">
                                            &nbsp;
                                        </small>
                                    </div>
                                <div class="col-md-12 mt-5">
                                     <h6>Datos del departamento de compras </h6>                
                                     <hr>
                                </div>
                               <div class="form-group col-sm-6">
                                    <label for="email_compras">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                        Correo electrónico compras:
                                    </label>
                                    <input type="email" name="email_compras" id="email_compras" class="form-control required" required maxlength="70" value="<?=$account->negocio_comp_correo ?>">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="nombre_compras">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                    Nombre del encargado de compras:
                                    </label>
                                    <input type="text" name="nombre_compras" id="nombre_compras" class="form-control required" required maxlength="40" value="<?=$account->negocio_comp_nombre?>">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="numero_compras">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                    Número del encargado de compras:
                                    </label>
                                    <input type="tel" name="numero_compras" id="numero_compras"
                                    class="form-control required local-phone" required
                                                maxlength="15"
                                     value="<?=$account->negocio_comp_numero?>">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div> 
                                <div class="col-md-12 mt-5">
                                     <h6>Datos del departamento de ventas </h6>                
                                     <hr>
                                </div>
                                        <div class="form-group col-sm-6">
                                            <label for="email_ventas">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                Correo electrónico ventas:
                                            </label>
                                            <input type="email" name="email_ventas" id="email_ventas" class="form-control required" required maxlength="70" value="<?=$account->negocio_vent_correo ?>">
                                            <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="nombre_ventas">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Nombre del encargado de ventas:
                                            </label>
                                            <input type="text" name="nombre_ventas" id="nombre_ventas" class="form-control required" required maxlength="40" value="<?=$account->negocio_vent_nombre?>">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="numero_ventas">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Número del encargado de ventas:
                                            </label>
                                            <input type="tel" name="numero_ventas" id="numero_ventas" 
                                            class="form-control required local-phone" required
                                                maxlength="15"
                                            value="<?=$account->negocio_vent_numero ?>">

                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="whatps_ventas">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Whatsapp de ventas:
                                            </label>
                                            <input type="tel" name="whatps_ventas" id="whatps_ventas"
                                            class="form-control required local-phone" required
                                                maxlength="15"  value="<?=$account->negocio_vent_whatsp ?>">
                                            <small class="form-text text-muted">                        
                                            Whatsapp de telefono...
                                            </small>
                                        </div>
            
                                        <div class="form-group col-sm-12">
                                            <label for="change_password"> <strong> Modificar
                                            contraseña </strong> </label>
                                            <div class="custom-switch custom-switch-primary mb-2">
                                                <input class="custom-switch-input"
                                                id="change_password" name="change_password"
                                                type="checkbox">
                                                <label class="custom-switch-btn"
                                                for="change_password"> </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 group-password"
                                        style="display: none;">
                                        <label for="password_e">
                                            <sup><i class="fas fa-asterisk text-danger"
                                                style="font-size: 0.7em;"></i></sup>
                                                Contraseña:
                                            </label>
                                            <input type="password" name="password" id="password"
                                            class="form-control required" required autocomplete="off"
                                            maxlength="12" placeholder="Min. 8 caracteres">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6 group-password"
                                        style="display: none;">
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
                                            <button id="btn-sbmt-update-account" type="submit"
                                            class="btn btn-primary">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>

                                        <button id="btn-cancel-update-account" type="button"
                                        class="btn btn-danger"
                                        onclick="window.location.reload(true);">
                                        <i class="fas fa-times"> </i> Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>