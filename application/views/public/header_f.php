<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="index.php">
            <span class="logo-light-mode">
                <img src="<?= base_url('static/images/canaco.png') ?>" class="l-dark" height="80" alt="">
                <img src="<?= base_url('static/images/canaco-light.png') ?>" style="margin-top: 10px;" class="l-light" height="150" alt="">
            </span>
            <img src="<?= base_url('static/images/logo-light.png') ?>" height="24" class="logo-dark-mode" alt="">
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
                                        <a href="<?= base_url('app/home/') ?>">
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
                                        <a href="<?= base_url('app/home/') ?>">
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
                <a href="<?= base_url('login') ?>" class="btn btn-primary">
                    <i class="uil uil-signin icons"></i>
                    &nbsp;&nbsp;
                    Acceder
                </a>
            </li>
        </ul>
        <!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light" id="navmenu-nav">
                <li class="has-submenu">
                    <a href="#funcionamiento">Funcionamiento</a>
                </li>
                <li class="has-submenu">
                    <a href="#numeros">Estadísticas</a>
                </li>
                <li class="has-submenu">
                    <a href="#solicitud">Solicitudes</a>
                </li>
            </ul>
            <!--end navigation menu-->
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
    <ul class="buy-menu-btn d-none">
        <li class="list-inline-item mb-0">
            <div class="dropdown">
                <button type="button" class="btn btn-link text-decoration-none dropdown-toggle p-0 pe-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell" style="color: #69b800"></i>

                </button>

                <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-0" style="width: 240px;">
                    <form>
                        <input type="text" id="text2" name="name" class="form-control border bg-white" placeholder="Search...">
                    </form>
                </div>
            </div>
        </li>
        <li class="list-inline-item mb-0">
            <a href="#" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="uil uil-signin icons"></i></a>
        </li>
    </ul>
    <!--end login button-->
    </div>
    <!--end navigation-->
    </div>
    <!--end container-->
</header>
<!--end header-->
<!-- Navbar End -->