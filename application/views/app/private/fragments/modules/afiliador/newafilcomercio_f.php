<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div  class="card" >
            <div class="card-body">
                <h5 class="mb-4">Comercio</h5>
                <!--fin form-->
                <div id="accordion">
                    <div class="border">
                        <button class="btn btn-link"  data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2>Productos y servicios</h2>
                        </button>

                        <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                            <div class="p-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>
                                            <strong>
                                                Keywords asignados al comercio
                                            </strong>
                                        </h3>
                                    </div>
                                    <div class="col-sm-12">
                                        <table class="table table-responsive table-hover table-bordered" id="tbl-show-act-kw">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Actividad
                                                        económica
                                                    </th>
                                                    <th colspan="">
                                                        Palabras clave
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl-tbody-show-act-kw"></tbody>
                                        </table>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button type="button" class="btn btn-primary default btn-lg addkeyword">
                                            <i class="fas fa-plus"></i>
                                            Agregar palabras clave (keywords)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="border">
                            <button class="btn btn-link"  data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <h2>
                                    Datos del comercio
                                </h2>
                            </button>
                            <div id="collapseThree" class="collapse show" data-parent="#accordion" style="">
                                <div class="p-4">
                                    
                                    <div class="form-row mt-4 mb-3">
                                        <div class="col-md-12">
                                            <h6>Datos generales del comercio </h6>   
                                            
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="nombre_comercio">
                                                <sup>
                                                    <i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i>
                                                </sup> 
                                                Nombre comercial:
                                            </label>
                                            
                                            <input type="text" name="nombre_comercio" id="nombre_comercio" class="form-control required" required="" maxlength="150" value=" " />

                                            <small class="form-text text-muted">                        
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="razon">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                Razón social:
                                            </label>
                                            <input type="text" name="razon" id="razon" class="form-control required" required="" maxlength="150" value=" ">
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
                                                <option selected="">fisica</option>
                                                <option value="fisica">Física</option>
                                                <option value="moral">Moral</option>            
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="RFC">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                RFC:
                                            </label>
                                            <input type="text" name="RFC" id="RFC" class="form-control required valid" required="" maxlength="150" style="text-transform:uppercase" value="a777777777777">
                                            <small class="form-text text-muted">                        
                                                DDAC545...
                                            </small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="RFC">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                                Confirma tu RFC:
                                            </label>
                                            <input type="text" name="CRFC" id="CRFC" class="form-control required valid" required="" maxlength="150" style="text-transform:uppercase" value="a777777777777">
                                            <small class="form-text text-muted">                        
                                                DDAC545...
                                            </small>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="show_direc"> <strong> ¿Tiene punto de atención 
                                            a clientes? </strong> </label>
                                            <div class="custom-switch custom-switch-primary mb-2">
                                                <input class="custom-switch-input" id="show_direc" name="show_direc" type="checkbox">
                                                <label class="custom-switch-btn" for="show_direc"> </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6 group-direc" style="">
                                            <label for="calle">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Calle:
                                            </label>
                                            <input type="text" name="calle" id="calle" class="form-control " maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6 group-direc " style="">
                                            <label for="colonia">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Colonia:
                                            </label>
                                            <input type="text" name="colonia" id="colonia" class="form-control " maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>
                                        <div class="form-group col-sm-4 group-direc" style="">
                                            <label for="exterior">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Número exterior:
                                            </label>
                                            <input type="text" name="exterior" id="exterior" class="form-control " maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>
                                        <div class="form-group col-sm-4 group-direc " style="">
                                            <label for="interior">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Número interior:
                                            </label>
                                            <input type="text" name="interior" id="interior" class="form-control " maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>
                                        <div class="form-group col-sm-4 group-direc" style="">
                                            <label for="cp">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Código postal:
                                            </label>
                                            <input type="text" name="cp" id="cp" class="form-control " maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="border">
                            <button class="btn btn-link"  data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <h2>Datos de contacto</h2>
                            </button>
                            <div id="collapseTwo" class="collapse show" data-parent="#accordion" style="">
                                <div class="p-4">
                                 
                                    <div class="form-row mt-4 mb-3">
                                        <div class="col-md-12">
                                            <h6>Información personal</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <label for="nombre">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Nombre:
                                            </label>
                                            <input type="text" name="nombre" id="nombre" class="form-control required" required="" maxlength="40" value="preuab">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="apellido1">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Primer apellido:
                                            </label>
                                            <input type="text" name="apellido1" id="apellido1" class="form-control required" required="" maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="apellido2">
                                                Segundo apellido:
                                            </label>
                                            <input type="text" name="apellido2" id="apellido2" class="form-control" maxlength="40" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-sm-6">
                                            <label for="telefono_auth">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Teléfono:
                                            </label>
                                            <input type="tel" name="telefono_auth" id="telefono_auth" class="form-control required local-phone" required="" maxlength="14" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="telefono_auth_c">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Confirmar teléfono:
                                            </label>
                                            <input type="tel" name="telefono_auth_c" id="telefono_auth_c" class="form-control required local-phone" required="" maxlength="14" value="">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="email_auth">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                E-mail:
                                            </label>
                                            <input type="email" name="email_auth" id="email_auth" class="form-control required" required="" maxlength="70" value="pruebatest@gmail.com">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="email_auth_c">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Confirmar e-mail:
                                            </label>
                                            <input type="email" name="email_auth_c" id="email_auth_c" class="form-control required" required="" maxlength="70" value="pruebatest@gmail.com">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6 group-password" >
                                            <label for="password_e">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Contraseña:
                                            </label>
                                            <input type="password" name="password" id="password" class="form-control required valid" required="" autocomplete="off" maxlength="12" placeholder="Min. 8 caracteres">
                                            <small class="form-text text-muted">
                                                &nbsp;
                                            </small>
                                        </div>

                                        <div class="form-group col-sm-6 group-password" >
                                            <label for="password_c_e">
                                                <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                                Confirmar contraseña:
                                            </label>
                                            <input type="password" name="password_c" id="password_c" class="form-control required" required="" maxlength="12" placeholder="Min. 8 caracteres">
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
                                        <input type="email" name="email_compras" id="email_compras" class="form-control required" required="" maxlength="70" value="">
                                        <small class="form-text text-muted">
                                            &nbsp;
                                        </small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nombre_compras">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Nombre del encargado de compras:
                                        </label>
                                        <input type="text" name="nombre_compras" id="nombre_compras" class="form-control required" required="" maxlength="40" value="">
                                        <small class="form-text text-muted">
                                            &nbsp;
                                        </small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="numero_compras">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Número del encargado de compras:
                                        </label>
                                        <input type="tel" name="numero_compras" id="numero_compras" class="form-control required local-phone" required="" maxlength="14" value="">
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
                                        <input type="email" name="email_ventas" id="email_ventas" class="form-control required" required="" maxlength="70" value="">
                                        <small class="form-text text-muted">
                                            &nbsp;
                                        </small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="nombre_ventas">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Nombre del encargado de ventas:
                                        </label>
                                        <input type="text" name="nombre_ventas" id="nombre_ventas" class="form-control required" required="" maxlength="40" value="">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="numero_ventas">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Número del encargado de ventas:
                                        </label>
                                        <input type="tel" name="numero_ventas" id="numero_ventas" class="form-control required local-phone" required="" maxlength="14" value="">

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="whatps_ventas">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Whatsapp de ventas:
                                        </label>
                                        <input type="tel" name="whatps_ventas" id="whatps_ventas" class="form-control required local-phone valid" required="" maxlength="14" value="">
                                        <small class="form-text text-muted">                        
                                            Whatsapp de telefono...
                                        </small>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <button id="btn-sbmt-update-account" type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>

                                        <button id="btn-cancel-update-account" type="button" class="btn btn-danger" onclick="window.location.reload(true);">
                                            <i class="fas fa-times"> </i> Cancelar
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <!---fin acordeon -->
        </div>
    </div>
</div>
</div>
