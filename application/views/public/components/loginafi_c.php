<div class="card shadow rounded border-0 ms-lg-12">
    <div class="card-body">
        <h5 class="card-title fw-bold">Registro</h5>
      
        <form class="login-form" id="form_registro_usuario_afiliador" method="post" 
        data-type="json" action="<?=base_url('app/Afiliador_comercio/registro') ?>" >
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

                <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary"  type="submit" id="btn_registar" >Registrar usuario</button>
                    </div>
                </div>
       <!--     </div> -->
        </form>
    </div>
</div>