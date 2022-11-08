<div class="card shadow rounded border-0 ms-lg-12">
    <div class="card-body">
        <form class="login-form" id="form_registro_afiliador" method="post" 
        data-type="json" action="<?=base_url('app/Afiliador_comercio/registroafiliador') ?>" >
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3"> 
                        <label class="form-label">
                            Clave empleado
                            <span class="text-danger">*</span>
                            <button type="button" class="btn btn-link text-primary p-0 m-0">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </label>
                        <div class="form-icon position-relative">
                            <i data-feather="empleado" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" autocomplete="off"  maxlength="10"   placeholder="Clave empleado" name="empleado" id="empleado" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3"> 
                        <label class="form-label">
                            Nombre
                            <span class="text-danger">*</span>
                            <button type="button" class="btn btn-link text-primary p-0 m-0">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </label>
                        <div class="form-icon position-relative">
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" autocomplete="off" maxlength="70" placeholder="Nombre" name="user" id="user" required>
                        </div>
                    </div>
                </div>
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
                            <input type="email" id="email" class="form-control ps-5" maxlength="70" autocomplete="off" placeholder="Correo electrónico" name="email" required>
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
                            <input type="password" id="password" name="password" maxlength="15"  autocomplete="off" class="form-control ps-5" placeholder="Contraseña" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">
                            Confirmar Contraseña 
                            <span class="text-danger">*</span> 
                            <button type="button" class="btn btn-link text-primary p-0 m-0">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </label>
                        <div class="form-icon position-relative">
                            <i data-feather="lock" class="fea icon-sm icons"></i>
                            <input type="password" id="password_c" name="password_c" maxlength="15" autocomplete="off" class="form-control ps-5" placeholder="Contraseña" required>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" id="btn_registar">Registrar</button>
                    </div>
                </div>
                <!--     </div> -->
            </form>
        </div>
    </div>