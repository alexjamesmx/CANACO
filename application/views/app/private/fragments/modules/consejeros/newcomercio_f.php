<style>
    .custom-switch .custom-switch-input + .custom-switch-btn {
    outline: 0;
    display: inline-block;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: pointer;
    width: 58px;
    height: 28px;
    margin: 0;
    padding: 4px;
    background: #ced4da;
    border-radius: 76px;
    transition: all 0.3s ease;
    border: 1px solid #ced4da;
}
</style>  
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <!-- <h5 class="mb-4">Comercio</h5> -->
        <!--fin form-->
        <!-- <div class="col-lg-12 col-md-12 mt-4 pt-2 mt-sm-0 pt-sm-0"> -->
            <div class="card shadow  border-0 ms-lg-12">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Registro</h5>

                    <form class="login-form" id="form_registro_usuario_afiliador" method="post" 
                    data-type="json" action="<?=base_url('app/Consejero/registro') ?>" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Correo electrónico  
                                    <span class="text-danger">*</span> 
                                    <button type="button" class="btn btn-link text-primary p-0 m-0">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                </label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" id="email" class="form-control ps-5" placeholder="Correo electrónico" name="email" required>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Contraseña 
                                    <span class="text-danger">*</span> 
                                    <button type="button" class="btn btn-link text-primary p-0 m-0">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                </label>
                                <div class="form-icon position-relative">
                                    <i data-feather="lock" class="fea icon-sm icons"></i>
                                    <input type="password" id="password" name="password" class="form-control ps-5" placeholder="Contraseña" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Nombre de quien usará la cuenta 
                                    <span class="text-danger">*</span>
                                    <button type="button" class="btn btn-link text-primary p-0 m-0">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                </label>
                                <div class="form-icon position-relative">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <input type="text" class="form-control ps-5"  placeholder="Nombre" name="user" id="user" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                                    <h6> ¿Facturas?  </h6>   

                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" id="switch_rfc" name="switch_rfc" type="checkbox">
                                        <label class="custom-switch-btn" for="switch_rfc"></label>
                                    </div>
                        </div>
                    <div class="form-row group-subir-rfc " style="display: none;">           
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    RFC
                                    <span class="text-danger">*</span> 
                                    <button type="button" class="btn btn-link text-primary p-0 m-0">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                </label>
                                <div class="form-icon position-relative">
                                    <i data-feather="shield" class="fea icon-sm icons"></i>
                                    <input type="text"  name="rfc" id="rfc" class="form-control ps-5" style="text-transform:uppercase;"  onkeypress="return check(event)" placeholder="RFC" required minlength="12" maxlength="13">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button class="btn btn-primary default"  type="submit" id="btn_registar" >Registrar usuario</button>
                            </div>
                        </div>
                        <!--     </div> -->
                    </form>
                </div>
            </div>





            <!-- </div> -->
            <div id="accordion" style="display:none;">
                <div class="border">
                    <button class="btn btn-link"  data-target="#collapseOne" 
                    aria-expanded="true" aria-controls="collapseOne">
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
                                                    Actividad económica
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

                <div class="border">
                    <button class="btn btn-link"  data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <h2>
                            Datos del comercio
                        </h2>
                    </button>

                    <div id="collapseThree" class="collapse show" data-parent="#accordion" style="">
                        <div class="p-4">
                            <form id="form-update-comercio" 
                            action="<?=base_url('app/Consejero/upnegocio')?>"
                                class="validate-ptp" method="post" data-type="json">
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
                                    <div class="form-group col-md-4" id='personabi'>
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
                                    <div class="form-group col-md-4" id='rfcbi'>
                                        <label for="RFC">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            RFC:
                                        </label>
                                        <input type="text" name="RFC" id="RFC" class="form-control required valid" required="" maxlength="150" style="text-transform:uppercase" value="">
                                        <small class="form-text text-muted">                        
                                            DDAC545...
                                        </small>
                                    </div>
                                    <div class="form-group col-md-4"  id='rfc2bi'>
                                        <label for="RFC">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Confirma tu RFC:
                                        </label>
                                        <input type="text" name="CRFC" id="CRFC" class="form-control required valid" required="" maxlength="150" style="text-transform:uppercase" value="">
                                        <small class="form-text text-muted">                        
                                            DDAC545...
                                        </small>
                                    </div>
                                    <div class="form-group col-md-4"  id='patronbi'>
                                        <label for="RFC">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup> 
                                            Registro patronal:
                                        </label>
                                        <input type="text" name="patronal" id="patronal" class="form-control required valid" maxlength="150" style="text-transform:uppercase" value="">
                                       
                                    </div>
                                  <div class="form-group col-sm-6 group-direc" style="display:block;">
                                        <label for="calle">
                                            <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                            Municipio:
                                        </label>
                                        <select class="form-select form-control" aria-label="Default select example" name="municipio" id="municipio">
                                            <option selected="Queretaro">Querétaro</option>
                                            <option value="Amealco de Bonfil">Amealco de Bonfil</option>
                                            <option value="Pinal de Amoles">Pinal de Amoles</option>
                                            <option value="Arroyo Seco">Arroyo Seco</option>
                                            <option value="Cadereyta de montes">Cadereyta de montes</option>  
                                            <option value="Colón">Colón</option>  
                                            <option value="Corregidora">Corregidora</option>
                                            <option value="Ezequiel montes">Ezequiel montes</option>  
                                            <option value="Huimilpan">Huimilpan</option>
                                            <option value="Jalpan de serra">Jalpan de serra</option>  
                                            <option value="Landa de matamoros">Landa de matamoros</option>
                                            <option value="El marqués">El marqués</option>  
                                            <option value="Pedro Escobedo">Pedro Escobedo</option>
                                            <option value="Peñamiller">Peñamiller</option>  
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="San joaquín">San joaquín</option>  
                                            <option value="San juan del rio">San juan del rio</option>
                                            <option value="Tequisquiapan">Tequisquiapan</option>  
                                            <option value="Toliman">Toliman</option>       
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 group-direc" style="display:block;">
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
                                <div class="form-row">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <button id="btn-sbmt-create-comercio" 
                                            type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>

                                    </div>
                                </div>
                            </form>       
                        </div>                            

                    </div>
                </div>

                <div class="border">
                    <button class="btn btn-link"  data-target="#collapseTwo" aria-expanded="true"
                     aria-controls="collapseTwo">
                        <h2>Datos de contacto</h2>
                    </button>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordion" style="">
                        <div class="p-4">
                            <form id="form-edit-myaccount"
                            action="<?=base_url('app/Consejero/doupdate')?>"
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


                                <div class="form-group col-sm-12">
                                    <h6> ¿La Información personal es la misma que el departamento de compras?  </h6>   
                                    <div class="custom-switch custom-switch-primary mb-2">
                                     <input class="custom-switch-input" id="yes_compras" name="yes_compras" type="checkbox">
                                     <label class="custom-switch-btn" for="yes_compras"> </label>
                                 </div>
                             </div>

                             <div class="col-md-12 mt-5">
                               <h6>Datos del epartamento de compras </h6>                
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
                        <div class="form-group col-sm-12">
                            <h6> ¿La Información personal es la misma que el departamento de ventas?  </h6>   
                            <div class="custom-switch custom-switch-primary mb-2">
                             <input class="custom-switch-input" id="yes_ventas" name="yes_ventas" type="checkbox">
                             <label class="custom-switch-btn" for="yes_ventas"> </label>
                         </div>
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
                        <button id="btn-sbmt-update-account" type="submit"
                        class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>

        <div class="col-sm-12 text-center">
            <button type="button" onclick="afiliarpri()" class="btn btn-primary default btn-lg">
                <i class="fas fa-id-card-alt"></i>
                Terminar
            </button>

        </div>
    </div>
    <!---fin acordeon -->
</div>
</div>
</div>
</div>
