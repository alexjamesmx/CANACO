
 <script>
    var base_url = "<?= base_url() ?>";
 </script>
 <script src="<?= base_url() ?>static/js/script_registro.js"></script>

 <script src="<?= base_url() ?>static/js/jquery.js"></script>


<div class="card shadow rounded border-0 ms-lg-5">
    <div class="card-body">
        <h5 class="card-title fw-bold">Registro</h5>
       <!-- <form class="login-form"> -->
            <div class="row">
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
                            <input type="text" class="form-control ps-5" placeholder="Nombre" name="user" id="user" required>
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
                            RFC
                            <span class="text-danger">*</span> 
                            <button type="button" class="btn btn-link text-primary p-0 m-0">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </label>
                        <div class="form-icon position-relative">
                            <i data-feather="shield" class="fea icon-sm icons"></i>
                            <input type="text" name="rfc" id="rfc" class="form-control ps-5" placeholder="RFC" required maxlength="13">
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
                                    <input class="form-check-input" type="radio" name="regimen" value="fisica" id="regimen">
                                    <label class="form-check-label" for="p-fisica">
                                        Persona<br>Física
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="mb-0">
                                <div class="form-check">
                                    <input class="form-check-input"  type="radio"  value="moral" name="regimen" id="regimen">
                                    <label class="form-check-label" for="p-moral">
                                        Persona<br>Moral
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input" required="" type="checkbox" value="" id="terminos">
                        <label class="form-check-label" for="flexCheckDefault">
                            Acepto los <a href="#" class="text-primary">términos y condiciones</a>
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-grid">
                        <button class="btn btn-primary" id="btn_registar" onclick="registro_comercio()">Registrarme</button>
                    </div>
                </div>
            </div>
      <!--  </form> ->
    </div>
</div>