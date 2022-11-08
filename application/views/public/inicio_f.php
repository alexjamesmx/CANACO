<div class="" hidden><?= print_r($requerimientos) ?></div>

<!-- Hero Start -->
<section id="home" class="bg-half-170 d-table w-100 it-home" style="background: url('static/images/it/bg1.webp') center center;">
    <!--MODALSTART-->
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12 mt-sm-3">
                <div class="title-heading">
                    <h1 class="fw-bold heading mb-3"><span class="typewrite" style="color: #69b800" data-period="2000" data-type='[ "#ComercioDigital", "#TransaccionesComerciales", "#CalidadCANACO" ]'> <span class="wrap"></span> </span></h1>
                    <div class="widget mb-4 pb-3">
                        <!-- SEARCH -->
                        <div class="widget">
                            <iframe name="catch" style="display:none;"></iframe>
                            <form target="catch" method='get'>
                                <div class="input-group mb-3 border rounded" id="busqueda">
                                    <input type="text" id="keyword" name="keyword" class="form-control border-0" placeholder="Encuentra proveedor de" style="font-size: 1.5em !important;">
                                    <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit" onclick="search_keyword()"><i class='fas fa-spinner fa-pulse' id="prog"></i><i class="uil uil-search" style="color: #69b800; font-size: 1.5em !important;"></i></button>
                                    <input id="idRed" type="hidden" value="0">
                                </div>
                                <!-- <button onclick='toat()'>toast</button> -->
                            </form>
                        </div>
                        <!-- SEARCH -->
                    </div>
                    <h1 class="text-white title-dark mt-2 mb-5">La cámara de los negocios queretanos.</h1>
                    <a href="<?= base_url('/#requerimientoscard') ?>">
                        <p class="para-desc display-4 mt-2" style="color: #69b800; font-size: 50px !important;">
                            Encuentra a los mejores proveedores en Querétaro </p>
                    </a>

                </div>
            </div>
            <!--end col-->
            <div class="col-lg-5 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <?= $login_c ?>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End Hero -->

<!-- Start Features -->
<section id="service" class="py-4 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-envelope-add text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-muted para mb-0">Recibe automáticamente y en tiempo real requerimientos de compra</p>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-award text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-muted para mb-0">Conoce al proveedor calidad CANACO</p>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-usd-circle text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-muted para mb-0">Visibilidad de transacciones comerciales gratuitas <span class="text-primary fw-bold">para tu negocio</span></p>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-invoice text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-muted para mb-0">Recibe inmediatamente cotizaciones en firme de productos y servicios CANACO </p>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End Features -->
<!--Requerimientos publicos --->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="input-group mb-3 border rounded">
                <input onkeyup="scaner()" id="seachscaner" type="text" class="form-control border-0" placeholder="Encuentra oportunidades de negocio" style="font-size:1.em!important;">
                <button type="submit" class="input-group-text bg-while border-0">
                    <i class="fas fa-spinner fa-pulse" style="display:none"></i>
                    <i class="uil uil-search" style="color :#69b800; font-size:1.5em!important;"></i>
                </button>
            </div>
        </div>
        <div id="requerimientoscard" class="row mt-4 pt-2">
            <?php if (isset($requerimientos)) {
                foreach ($requerimientos as $req) { ?>
                    <div onclick="openmodal()" style="height:250px" class="col-lg-3 col-md-6 col-sm-12 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">

                                <h4><a class="card-title title text-dark"><i class="uil uil-user"></i> <?= $req->negocio_nombre ?></a></h4>
                                <span hidden><?= $res->req_id ?></span>
                                <h6><a class="card-title title text-dark"><strong>Requiere: </strong><?= $req->busq_nec ?> </a></h6>
                                <h6><a class="card-title title text-dark"><strong>En cantidad: </strong><?= $req->qty ?></a></h6>
                                <h6><a class="card-title title text-dark"><strong>Especificaciones: </strong><?= $req->especificaciones ?></a></h6>
                                <h6><a class="card-title title text-dark"><strong>Fecha de solicitud: </strong><?= fancy_date(
                                                                                                                    $req->fecha_req,
                                                                                                                    'd-m-y'
                                                                                                                ) ?></a></h6>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <a class="text-muted readmore">Ver mas<i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> <?= $req->negocio_nombre ?></small>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>
        </div>
        <!---endrow--->
        <div id="contendorfiltro" class="row mt-4 pt-2">
        </div>

    </div>
</section>
<!--Fin de requeriminetos publicos---->
<!-- Start -->
<section class="section" id="funcionamiento">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                        <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                            <div class="card-body p-0">
                                <img src="static/images/nuevas/img1.png" class="img-fluid" alt="work-image">
                                <div class="overlay-work bg-dark"></div>
                                <div class="content">
                                    <small class="text-light"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-6 col-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                    <div class="card-body p-0">
                                        <img src="static/images/nuevas/img2.png" class="img-fluid" alt="work-image">
                                        <div class="overlay-work bg-dark"></div>
                                        <div class="content">
                                            <small class="text-light"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                    <div class="card-body p-0">
                                        <img src="static/images/nuevas/img4.png" class="img-fluid" alt="work-image">
                                        <div class="overlay-work bg-dark"></div>
                                        <div class="content">
                                            <small class="text-light"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->

            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <span class="badge bg-soft-primary rounded-pill fw-bold">Acerca del sistema</span>
                        <h4 class="title mb-4 mt-3">Funcionamiento</h4>
                        <p class="text-muted para-desc">Regístrate gratuitamente, configura tu perfil y comienza a recibir las notificaciones cuando una empresa o comercio, necesite tus productos o servicios.<br><br>
                            COTIZA, PARTICIPA EN LICITACIONES, VENDE DE MANERA DIGITAL.<br><br>
                            Si necesitas un producto o servicio difícil de encontrar, publica tu requerimiento y de manera inmediata, recibe datos de contacto, la lista de nuestros afiliados que venden o proveen ese servicio o producto que necesitas, todos respaldados por el distintivo PROVEEDOR CALIDAD <span class="text-primary fw-bold">CANACO</span> , encuentra el servicio que necesitas o registrate para recibir un correo cuando sea requerido un servicio para el que califiques.</p>
                    </div>


                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End -->

<!-- Start -->
<section class="section pt-0" id="numeros">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative py-5 rounded" style="background: url('static/images/nuevas/img3.png') top;">
                        <div class="bg-overlay rounded bg-primary bg-gradient" style="opacity: 0.8;"></div>

                        <div class="row">
                            <div class="col-lg-3 col-6 my-4">
                                <div class="counter-box text-center px-lg-4">
                                    <i class="uil uil-users-alt text-white-50 h2"></i>
                                    <h1 class="mb-0 text-white">+<span class="counter-value" data-target="5000">4000</span></h1>
                                    <h6 class="counter-head text-white-50">Comercios afiliados</h6>
                                </div>
                                <!--end counter box-->
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-6 my-4">
                                <div class="counter-box text-center px-lg-4">
                                    <i class="uil uil-schedule text-white-50 h2"></i>
                                    <h1 class="mb-0 text-white"><span class="counter-value" data-target="118 "></span></h1>
                                    <h6 class="counter-head text-white-50">Años de tradición</h6>
                                </div>
                                <!--end counter box-->
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-6 my-4">
                                <div class="counter-box text-center px-lg-4">
                                    <i class="uil uil-file-check-alt text-white-50 h2"></i>
                                    <h1 class="mb-0 text-white">+<span class="counter-value" data-target="100">0</span>k</h1>
                                    <h6 class="counter-head text-white-50">Transacciones comerciales mensuales gratuitas</h6>
                                </div>
                                <!--end counter box-->
                            </div>
                            <!--end col-->

                            <div class="col-lg-3 col-6 my-4">
                                <div class="counter-box text-center px-lg-4">
                                    <i class="uil uil-hard-hat text-white-50 h2"></i>
                                    <h1 class="mb-0 text-white"><span class="counter-value" data-target="2000">1000</span></h1>
                                    <h6 class="counter-head text-white-50">Certificaciones PROVEEDOR CALIDAD CANACO</h6>
                                </div>
                                <!--end counter box-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>

                    <div class="content mt-md-5 mt-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4">
                                <div class="tiny-three-item">
                                    <div class="tiny-slide">
                                        <div class="d-flex client-testi m-2">
                                            <img src="static/images/client/01.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                                            <div class="flex-1 content p-3 shadow rounded bg-white position-relative">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                </ul>
                                                <p class="text-muted mt-2">" Desde que decidí afiliarme con la CANACO mi negocio empezó a recibir más atención."</p>
                                                <h6 class="text-primary">- Tomás Isrrael <small class="text-muted">C.E.O</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tiny-slide">
                                        <div class="d-flex client-testi m-2">
                                            <img src="static/images/client/02.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                                            <div class="flex-1 content p-3 shadow rounded bg-white position-relative">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                                </ul>
                                                <p class="text-muted mt-2">" No soy afiliada, sin embargo mi negocio llegó a más gente gracias a su plataforma web, ahora afiliarse no suena como una mala idea."</p>
                                                <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tiny-slide">
                                        <div class="d-flex client-testi m-2">
                                            <img src="static/images/client/03.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                                            <div class="flex-1 content p-3 shadow rounded bg-white position-relative">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                </ul>
                                                <p class="text-muted mt-2">" Con las diversas capacitaciones que recibí por parte del CECAN me siento más preparado para llevar mi empresa por el mejor rumbo. "</p>
                                                <h6 class="text-primary">- Carlos Oliver <small class="text-muted">P.A</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tiny-slide">
                                        <div class="d-flex client-testi m-2">
                                            <img src="static/images/client/04.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                                            <div class="flex-1 content p-3 shadow rounded bg-white position-relative">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                </ul>
                                                <p class="text-muted mt-2">" Me parece increible que no sea necesario buscar alguien que pueda cumplir con mi solicitud, solo la publico y los interesados se encargan de contactarme. "</p>
                                                <h6 class="text-primary">- Cristina Sánchez <small class="text-muted">Manager</small></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row -->
        <div class="feature-posts-placeholder bg-light"></div>
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End section -->

<!-- Start -->
<section class="section" id="solicitud">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Solicitudes</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Servicios con alta demanda en <span class="text-primary fw-bold">CANACO</span>, realice su registro para no perder esta oportunidad.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="static/images/nuevas/img5.png" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Se necesitan 100 brochas</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>442</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>50</a></li>
                            </ul>
                            <a href="page-blog-detail.html" class="text-muted readmore">Ver más <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> Pintura</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 12 Agosto 2021</small>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="static/images/nuevas/img6.png" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Se necesitan 100m de cuerda</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>420</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>60</a></li>
                            </ul>
                            <a href="page-blog-detail.html" class="text-muted readmore">Ver más <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> Ferreteria</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 27 Noviembre 2021</small>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="static/images/nuevas/img7.png" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <h5><a href="javascript:void(0)" class="card-title title text-dark">Se necesita experto en configuración de computadores para café internet</a></h5>
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>115</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>935</a></li>
                            </ul>
                            <a href="page-blog-detail.html" class="text-muted readmore">Ver más <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> Cibers</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 10 Septiembre 2021</small>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->

</section>
<!--end section-->
<!-- End -->



<div class="modal fade" id="modal_search" tabindex="-1" aria-labelledby="modal_search" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_searchLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal_size">
        <div class="modal-content">
            <div class="modal-header" style=" background-color: #69b800;">
                <h5 class="modal-title" id="exampleModalLabel"><span id="titulo1" class="text-white">Resultados</span><span id="titulo2">Registrate</span></h5><i class='fas fa-spinner fa-pulse' id="prog_modal"></i>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card m-12" id="div_modal">
                    <div id="modal-list-result" class="row card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>