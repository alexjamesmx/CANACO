<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="index.php">
            <span class="logo-light-mode">
                <img src="<?=base_url('static/images/canaco.png')?>" class="l-dark" height="80" alt="">
                <img src="<?=base_url('static/images/canaco-light.png')?>" style="margin-top: 10px;" class="l-light" height="150" alt=""> 
            </span>
            <img src="<?=base_url('static/images/logo-light.png')?>" height="24" class="logo-dark-mode" alt="">
        </a>
        <ul class="buy-button list-inline mb-0 mt-1">

            <?php if ($this->session->userdata('signin') && $this->session->userdata('rol_id') == 2) : ?>
            <li class="list-inline-item mb-0">
                <div class="dropdown">
                    <button type="button" class="header-icon btn btn-empty" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-handshake fa-2x" style="color: #69b800"></i>
                        <span class="position-absolute top-0 start-20 translate-middle badge rounded-pill bg-danger">
                            11
                        </span>                        
                    </button>

                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="border-bottom">
                                <div style="font-size: 14px; margin-left:10px;">
                                    <a href="<?=base_url('app/home/')?>">
                                        <p class="text-muted">
                                            <i class="fas fa-info-circle"></i> Nuevas oportunidades de negocio
                                        </p>
                                    </a>
                                </div>
                            </div>                     
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-inline-item mb-0">
                <div class="dropdown">
                    <button type="button" class="header-icon btn btn-empty" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-tasks fa-2x" style="color: #69b800"></i>
                        <span class="position-absolute top-0 start-20 translate-middle badge rounded-pill bg-danger">
                            7
                        </span>
                        
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <div class="scroll">
                            <div class="border-bottom">
                                <div style="font-size: 14px; margin-left:10px;">
                                    <a href="<?=base_url('app/home/')?>">
                                        <p class="text-muted">
                                            <i class="fas fa-info-circle"></i> Nuevos interesados en tus requerimientos
                                        </p>
                                    </a>
                                </div>                                
                            </div>                     
                        </div>
                    </div>
                </div>
            </li>
        <?php endif; ?>
        <li class="list-inline-item mb-0">
            <a href="<?=base_url()?>" class="btn btn-primary">
                <i class="uil uil-signin icons"></i>
                &nbsp;&nbsp;
                Ir al sitio
            </a>
        </li>
    </ul><!--end login button-->
    <!-- End Logo container-->
</div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
