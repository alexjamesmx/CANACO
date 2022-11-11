<div class="col-12 mb-4">
    <div class="card mb-4 p-3">
        <div id="afiliacionWizard">
            <ul class="card-header">
                <li><a href="#step-0">Paso 1<br /><small>Elige tu membresía jijia</small></a></li>
                <li><a href="#step-1">Paso 2<br /><small>Agrega nuestros datos bancarios</small></a></li>
                <li><a href="#step-2">Paso 3<br /><small>Realiza el pago</small></a></li>
                <li><a href="#step-3">Paso 4<br /><small>Adjunta tu comprobante</small></a></li>
                <li><a href="#step-4">Paso 5<br /><small>Facturación</small></a></li>
                <li><a href="#step-5">Paso 6<br /><small>Verifica tu insignia <strong>CANACO PREMIUM</strong></small></a></li>
            </ul>
            <div class="card-body">
                <div id="step-0" style="height: auto !important; display:  none;">
                    <form id="form-step-0" class="tooltip-label-right my-5" novalidate>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-center"><b>
                                        1.- Selecciona la membresía de tu interés
                                    </b></h3>
                                <hr>
                            </div>
                            <!-- EMPRENDEDOR -->
                            <div class="col-12">
                                <img src="<?= base_url('static/images/info_membrsias_canaco.png') ?>" alt="MEMBRESIAS CANACO" class="img-fluid">
                            </div>
                            <div class="col-12 col-lg-6 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-primary"><b>Emprendedor</b></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            &nbsp;
                                                            1,850.00 MXN
                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-center m-2 p-2">
                                                    <input type="radio" name="membresia" onclick='afiliacion_step1()' value="1" id="membresia_1" required>
                                                    <br>
                                                    <label for="membresia_1" class="btn btn-primary">
                                                        Seleccionar membresía
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA EMPRENDEDOR -->

                            <!-- PYME -->
                            <div class="col-12 col-lg-6 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-primary"><b>PYME</b></h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            &nbsp;
                                                            2,990.00 MXN
                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-center m-2 p-2">
                                                    <input type="radio" name="membresia" onclick='afiliacion_step1()' value="2" id="membresia_2" required>
                                                    <br>
                                                    <label for="membresia_2" class="btn btn-primary">
                                                        Seleccionar membresía
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TEMRINA PYME -->

                            <!-- VISIONARIO -->
                            <div class="col-12 col-lg-6 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-primary"><b>VISIONARIO</b></h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            &nbsp;
                                                            4,500.00 MXN
                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-center m-2 p-2">
                                                    <input type="radio" name="membresia" onclick='afiliacion_step1()' value="3" id="membresia_3" required>
                                                    <br>
                                                    <label for="membresia_3" class="btn btn-primary">
                                                        Seleccionar membresía
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA VISIONARIO -->

                            <!-- CONSOLIDADO -->
                            <div class="col-12 col-lg-6 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-primary"><b>CONSOLIDADO</b></h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            &nbsp;
                                                            6,900.00 MXN
                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-center m-2 p-2">
                                                    <input type="radio" name="membresia" onclick='afiliacion_step1()' value="4" id="membresia_4" required>
                                                    <br>
                                                    <label for="membresia_4" class="btn btn-primary">
                                                        Seleccionar membresía
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA CONSOLIDADO -->

                            <!-- CONSOLIDADO -->
                            <div class="col-12 col-lg-6 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-primary"><b>PROYECCIÓN</b></h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            &nbsp;
                                                            11,500.00 MXN
                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-center m-2 p-2">
                                                    <input type="radio" name="membresia" onclick='afiliacion_step1()' value="5" id="membresia_5" required>
                                                    <br>
                                                    <label for="membresia_5" class="btn btn-primary">
                                                        Seleccionar membresía
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA CONSOLIDADO -->
                        </div>

                    </form>
                </div>
                <div id="step-1" style="height: auto !important;">
                    <form id="form-step-1" class="tooltip-label-right my-5" novalidate>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-center"><b>
                                        2.- Agrega nuestros datos bancarios
                                    </b></h3>
                                <hr>
                            </div>
                            <!-- DATOS DE TARJETA -->
                            <div class="col-12 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-primary">Cuenta: <b> CÁMARA NACIONAL DE COMERCIO SERVICIOS Y TURISMO DE QRO</b></h3>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="text-primary"> Cuenta:<b> 0113356248</b></h4>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="text-primary"> CLABE:<b> 012680001133562482</b></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>

                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA DATOS DE TARJETA -->
                        </div>
                    </form>
                </div>

                <div id="step-4" style="height: auto !important;">
                    <iframe width="0" height="0" border="0" name="resframes" id="resframes"></iframe>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="text-center"><b>
                                    5.- Facturación
                                </b></h3>
                            <hr>
                        </div>
                        <!-- DATOS DE TARJETA -->
                        <div class="col-12 col-item">
                            <!-- DATOS DE TARJETA -->
                            <div class="col-12 col-item" id='subiste_rfc' style='display: none'>
                                <div class="card my-3">
                                    <input type="hidden" id='fake_rfc'>
                                    <div class="alert alert-light mb-0">
                                        <p class="text-center mt-3">
                                            <i class="fas fa-check fa-3x text-dark"></i>
                                        </p>
                                        <h4 class="text-center text-dark">
                                            <strong>Se han registrado tus datos para facturacion</strong>
                                        </h4>

                                        <button onclick='regresa()' class="btn btn-primary  col-center col-12">
                                            Cambiar la dirección de Facturación
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <!-- TERMINA DATOS DE TARJETA -->

                            <!-- Facturacion -->
                            <div class="card-body" id='sube_rfc' style='display: block'>
                                <h3 class="text-primary  text-center">Dirección de Facturación: <b> </b></h3>
                                <div class="card-title" style="height: auto; margin-bottom: 10px !important;">

                                    <form id="form-fac-direc" class="validate-ptp" action="<?= base_url('app/Afiliate/direcc_factura') ?>" method="post" data-type="json" target='resframes'>
                                        <div class="col-12">
                                            <h4 class="text-primary">Estado:<b> <input type="text" name="estado_fac" id="estado_fac" class="form-control required"></input> </b></h4>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <h4 class="text-primary">Municipio:<b> <input type="text" name="municipio_fac" id="municipio_fac" class="form-control required"></input> </b></h4>
                                        </div>
                                        <div class="col-12">
                                            <h3 class="text-primary">Calle: <b> <input type="text" name="calle_fac" id="calle_fac" class="form-control required"></input> </b></h3>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-primary">Código postal:<b>
                                                    <input type="text" name="codigopos_fac" id="codigopos_fac" class="form-control required"></input></b></h4>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-primary">Colonia:<b><input type="text" name="colonia_fac" id="colonia_fac" class="form-control required"></input></b></h4>
                                        </div>
                                        <div class="col-12">
                                            <h3 class="text-primary">Número interior: <b> <input type="text" name="numinte_fac" id="numinte_fac" class="form-control"></input> </b></h3>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-primary">Número exterior:<b><input type="text" name="numext_fac" id="numext_fac" class="form-control required"></input></b></h4>
                                        </div>
                                        <div class="alert alert-warning">
                                            <h9>
                                                <i class="fas fa-exclamation-triangle"></i>
                                                Recuerda guardar tu dirección para poder facturar
                                                .
                                            </h9>
                                        </div>
                                        <button id="btn-sbmt-guardar-direc" type="submit" class="btn btn-primary  col-center col-12">
                                            <i class="fas fa-save"></i>
                                            Guardar la dirección de Facturación
                                        </button>
                                    </form>
                                </div>
                                <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                <em>

                                                </em>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Facturacion -->

                        </div>
                        <!-- TERMINA DATOS DE TARJETA -->
                    </div>
                </div>
                <div id="step-2" style="height: auto !important;">
                    <form id="form-step-2" class="tooltip-label-right my-5" novalidate>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-center"><b>
                                        3.- Realiza el pago
                                    </b></h3>
                                <hr>
                            </div>

                            <!-- DATOS DE TARJETA -->
                            <div class="col-12 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="alert alert-light mb-0" role="alert">
                                                        <p class="text-center mt-3">
                                                            <i class="fas fa-info-circle fa-3x text-dark"></i>
                                                        </p>

                                                        <h4 class="text-center text-dark">
                                                            Una vez agregada nuestra cuenta realiza el pago correspondiente con la referencia PLATAFORMA-<?= $this->session->userdata('usuario_id') ?> de acuerdo al monto de la membresía seleccionada.
                                                            <br>
                                                            <br>
                                                            <strong>Recuerda guardar el comprobante de pago</strong>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>

                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA DATOS DE TARJETA -->
                        </div>
                    </form>
                </div>

                <div id="step-5" style="height: auto !important;">
                    <form id="form-step-4" class="tooltip-label-right my-5" novalidate>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-center"><b>
                                        6.- Verifica tu insignia CANACO PREMIUM
                                    </b></h3>
                                <hr>
                            </div>
                            <!-- DATOS DE TARJETA -->
                            <div class="col-12 col-item">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">

                                                    <div class="alert alert-light mb-0" id='sube_rec' role="alert" style='display:block'>
                                                        <p class="text-center mt-3">
                                                            <i class="fas fa-exclamation fa-3x text-dark"></i>
                                                        </p>

                                                        <h4 class="text-center text-dark">
                                                            Asegúrate de haber subido tu recibo de pago
                                                            <br>
                                                            <br>
                                                            <strong>Da click en subir recibo en el paso 4 para proceder con tu trámite</strong>
                                                        </h4>
                                                    </div>

                                                    <div class="alert alert-light mb-0" id='espera_insignia' role="alert" style='display:none'>
                                                        <p class="text-center mt-3">
                                                            <i class="fas fa-hourglass-half fa-3x text-dark"></i>
                                                        </p>

                                                        <h4 class="text-center text-dark">
                                                            Espera a que se valide tu proceso de afiliación
                                                            <br>
                                                            <br>
                                                            Recibirás la insignia <strong>CANACO PREMIUM</strong> cuando se confirma tu evaluación
                                                        </h4>
                                                    </div>

                                                    <div class="alert alert-light mb-0" id='toma_insignia' role="alert" style='display:none'>
                                                        <p class="text-center mt-3">
                                                            <i class="fas fa-check fa-3x text-dark"></i>
                                                        </p>
                                                        <h4 class="text-center text-dark">
                                                            ¡Haz completado tu proceso de afiliación!
                                                            <br>
                                                            <br>
                                                            Ahora tienes la insignia <strong>CANACO PREMIUM</strong>
                                                            <br><br><br>
                                                            <img src=<?= base_url() . "static/recompensas/insignias/ins_canaco_premium.png" ?> class="img-fluid d-block mx-auto " style="max-height: 170px;">
                                                        </h4>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>
                                                        <em>

                                                        </em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TERMINA DATOS DE TARJETA -->
                        </div>
                    </form>
                </div>


                <div id="step-3" style="height: auto !important;">
                    <form id="form-step-3" class="tooltip-label-right my-5" novalidate>
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 class="text-center"><b>
                                        4.- Adjunta el comprobante de pago
                                    </b></h3>
                                <hr>
                            </div>
                            <!-- DATOS DE TARJETA -->
                            <div class="col-12 col-item">
                                <div class="card my-3">

                                    <div class="alert alert-light mb-0" id='seSubio' role="alert" style='display:none'>
                                        <p class="text-center mt-3">
                                            <i class="fas fa-check fa-3x text-dark"></i>
                                        </p>
                                        <h4 class="text-center text-dark">
                                            <strong>Tu recibo se ha enviado para ser validado</strong>
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <!-- TERMINA DATOS DE TARJETA -->
                            <!-- DATOS DE TARJETA -->
                            <div class="col-12 col-item">
                                <div class="card my-3">

                                </div>
                            </div>
                            <!-- TERMINA DATOS DE TARJETA -->
                        </div>
                    </form>
                    <div class="card-body" id='formRec'>
                        <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                            <!-- alex_nota     -->
                            <!-- <iframe onload="respuesta()" width="0" height="0" border="0" name="resframe" id="resframe"><input type='hidden' value='<?= $message  ?>' id='info'></iframe> -->
                            <form id="form-up-recibo" action="<?= base_url('app/files/subirRecibo/') ?>" class="validate-ptp" method="post" enctype="multipart/form-data" target='resframe'>
                                <div class="row">
                                    <input type="file" name="r" id="r" class="form-control required btn btn-info" accept="application/pdf" required>
                                    <hr>
                                    <div class="form-group col-sm-12 group-cotizacion" style="display: block;">
                                        <button id="btn-recibo" type="submit" class="btn btn-link btn-block mb-4 mt-2" style="font-size: 32px">
                                            <i class="fas fa-save"></i> Subir recibo
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-text" style="height: auto; margin-bottom: 10px !important;">
                            <div class="row">
                                <div class="col-12">
                                    <p>
                                        <em>

                                        </em>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-toolbar custom-toolbar text-center card-body pt-0">
                <button class="btn btn-primary prev-btn" type="button" onclick="alTituloAfiliacion();">Anterior</button>
                <button class="btn btn-primary next-btn" type="button" onclick="alTituloAfiliacion();">Siguiente</button>
                <button class="btn btn-primary finish-btn" type="submit">Finalizar</button>
            </div>
        </div>
    </div>
</div>