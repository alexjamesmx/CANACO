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
<div class="card shadow rounded border-0 ms-lg-12">
    <div class="card-body">
        <h5 class="card-title fw-bold">Registro</h5>
        
        <iframe name="catch" style="display:none;"></iframe>
        <form class="login-form" id="reg" target="catch">
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
                            <input type="email" id="email_modal" class="form-control ps-5" placeholder="Correo electrónico" name="email_modal" required>
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
                            <input type="text" class="form-control ps-5"  placeholder="Nombre" name="user_modal" id="user_modal" required>
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
                            <input type="password" id="password_modal" name="password_modal" class="form-control ps-5" placeholder="Contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="change_documentos"> <strong> ¿Facturas? </strong> </label>
                    <div class="mb-2">
                        <input class="custom-switch-input form-check-input"  id="change_factura_modal" onclick='$(".group-subir-rfc-m").slideToggle(400);' name="change_factura_modal" type="checkbox">
                    </div>
                </div>
            <div class="form-row group-subir-rfc-m" style="display: none;">
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
                            <input type="text"  name="rfc_modal" id="rfc_modal" class="form-control ps-5" style="text-transform:uppercase;"  onkeypress="return check(event)" placeholder="RFC" maxlength="13">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label d-block">
                            REGIMEN FISCAL
                            <span class="text-danger">*</span> 
                            <button type="button" class="btn btn-link text-primary p-0 m-0">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </label>
                        <div class="form-check form-check-inline">
                            <div class="mb-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="regimen_modal" value="fisica" id="regimen_modal">
                                    <label class="form-check-label" for="p-fisica">
                                        Persona<br>Física
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="mb-0">
                                <div class="form-check">
                                    <input class="form-check-input"  type="radio"  value="moral" name="regimen_modal" id="regimen_modal">
                                    <label class="form-check-label" for="p-moral">
                                        Persona<br>Moral
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="terminos_modal">
                        <label class="form-check-label" for="flexCheckDefault">
                            Acepto los <a href="#" class="text-primary">términos y condiciones</a>
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" id="btn_registar" onclick="registro_comercio('1')">Registrarme</button>
                    </div>
                </div>
       <!--     </div> -->
        </form>
    </div>
</div>