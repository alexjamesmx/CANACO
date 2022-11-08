<style>
    .custom-switch .custom-switch-input+.custom-switch-btn {
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
                        <label clas="form-label">
                            Nombre de quien usará la cuenta
                            <span class="text-danger">*</span>
                            <button type="button" class="btn btn-link text-primary p-0 m-0">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </label>
                        <div class="form-icon position-relative">
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" placeholder="Nombre" name="user" id="user" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="change_documentos"> <strong> ¿Facturas? </strong> </label>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="custom-switch-input form-check-input" id="change_factura" name="change_factura" type="checkbox" onchange='handleFactura_si(this)'>
                                <label class="form-check-label" for="change_factura">Si</label>
                            </div>
                            <div class="col-md-6">
                                <input class="custom-switch-input form-check-input" id='change_factura_no' type="checkbox" onchange="handleFactura_no(this)">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id='rfc_field' class="form-row group-subir-rfc" style="display: none;">
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
                                <input type="text" name="rfc" id="rfc" class="form-control ps-5" style="text-transform:uppercase;" onkeypress="return check(event)" placeholder="RFC" maxlength="13">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="terminos">
                        <label class="form-check-label" for="flexCheckDefault">
                            Acepto los <a href="#" class="text-primary">términos y condiciones</a>
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" id="btn_registar" onclick="registro_comercio('0')">Registrarme</button>
                    </div>
                </div>
                <!--     </div> -->
        </form>
    </div>
</div>