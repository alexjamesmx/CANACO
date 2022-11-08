<?php //var_dump($comercios); ?>
<div class="row">
    <div class="col-12 mb-2 mb-4">
        <div  class="card" >
            <div class="card-body">
                <h5>Selecciona un comercio registrado en ENLACE</h5>

                <div class="p-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <select class="form-control select2-single" data-width="100%" name="" id="conercio_id">
                                <option label="Comercios">Comercios</option>
                                <?php foreach ($comercios as $k){ 

                                    if(isset($k->negocio_nombre)){
                                        ?>
                                        
                                        
                                        <option value="<?=$k->negocio_id?>">
                                            <?=$k->negocio_nombre?>
                                        </option>
                                        
                                    </optgroup>      
                                    <?php 
                                }
                            }?>

                        </select>
                    </div>
                </div>
            </div>

            <hr>
            <!--inicio acordeon-->
            <div id="accordion" style="display: none;">
                <div class="border">
                    <button class="btn btn-link"  data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <h2>
                            Datos del comercio
                        </h2>
                    </button>
                    <div id="collapseThree" class="collapse show" data-parent="#accordion" style="">
                        <div class="p-4">
                            <input type="hidden" name="id_usuario" id="id_usuario"/>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre_comercio">
                                        <sup>
                                            <i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i>
                                        </sup> 
                                        Nombre comercial:
                                    </label>
                                    
                                    <input type="text" name="nombre_comercio" disabled id="nombre_comercio" class="form-control required" required="" maxlength="150" value=" " />

                                    <small class="form-text text-muted">                        
                                        &nbsp;
                                    </small>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="show_direc"> <strong> Informacion del punto de atencion a </strong> </label>
                                </div>

                                <div class="form-group col-sm-6 group-direc" style="">
                                    <label for="calle">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                        Calle:
                                    </label>
                                    <input type="text" name="calle" id="calle" disabled class="form-control " maxlength="40" value="">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>

                                <div class="form-group col-sm-6 group-direc " style="">
                                    <label for="colonia">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                        Colonia:
                                    </label>
                                    <input type="text" name="colonia" id="colonia" disabled class="form-control " maxlength="40" value="">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>
                                <div class="form-group col-sm-4 group-direc" style="">
                                    <label for="exterior">
                                        <sup><i class="fas fa-asterisk text-danger" disabled style="font-size: 0.7em;"></i></sup>
                                        Número exterior:
                                    </label>
                                    <input type="text" name="exterior" id="exterior" disabled class="form-control " maxlength="40" value="">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>
                                <div class="form-group col-sm-4 group-direc " style="">
                                    <label for="interior">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                        Número interior:
                                    </label>
                                    <input type="text" name="interior" id="interior" disabled class="form-control " maxlength="40" value="">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>
                                <div class="form-group col-sm-4 group-direc" style="">
                                    <label for="cp">
                                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                                        Código postal:
                                    </label>
                                    <input type="text" name="cp" id="cp" class="form-control" disabled maxlength="40" value="">
                                    <small class="form-text text-muted">
                                        &nbsp;
                                    </small>
                                </div>
                            </div>
                        </div>                            
                    </div> 
                </div>

                <div id='afiliacion'><!-- Afiliacion-->
                    <div class="col-12 mb-4">    
                        <div class="card mb-4 p-3">
                            <div id="afiliacionWizard">
                                <ul class="card-header">
                                    <li id='r0'><a href="#step-0">Paso 1<br /><small>Elige tu membresía</small></a></li>
                                    <li id='r1'><a href="#step-1">Paso 2<br /><small>Agrega nuestros datos bancarios</small></a></li>
                                    <li id='r2'><a href="#step-2">Paso 3<br /><small>Realiza el pago</small></a></li>
                                    <li id='r3'><a href="#step-3">Paso 4<br /><small>Adjunta tu comprobante</small></a></li>
                                    <li id='r4'><a href="#step-4">Paso 5<br /><small>Verifica tu insignia <strong>CANACO PREMIUM</strong></small></a></li>
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
                                                                        <div  class="alert alert-light mb-0" role="alert">
                                                                            <p class="text-center mt-3">
                                                                                <i class="fas fa-info-circle fa-3x text-dark"></i>
                                                                            </p>

                                                                            <h4   class="text-center text-dark">
                                                                                Una vez agregada nuestra cuenta realiza el pago correspondiente a la membresía de tu preferencia.
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

                                    <div id="step-4" style="height: auto !important;">
                                        <form id="form-step-4" class="tooltip-label-right my-5" novalidate>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <h3 class="text-center"><b>
                                                        5.- Verifica tu insignia CANACO PREMIUM
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

                                                                        <div  class="alert alert-light mb-0" id='sube_rec' role="alert" style='display:block'>
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

                                                                        <div  class="alert alert-light mb-0" id='espera_insignia' role="alert" style='display:block'>
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

                                                                        <div  class="alert alert-light mb-0" id='toma_insignia' role="alert" style='display:none'>
                                                                            <p class="text-center mt-3">
                                                                                <i class="fas fa-check fa-3x text-dark"></i>
                                                                            </p>
                                                                            <h4 class="text-center text-dark">
                                                                                Proceso de afiliación completado
                                                                                <br>
                                                                                <br>
                                                                                Ahora el comercio tiene la insignia <strong>CANACO PREMIUM</strong>
                                                                                <br><br><br>
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

                                                        <div  class="alert alert-light mb-0" id='seSubio' role="alert" style='display:none'>
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
                                            </div>
                                        </form>
                                        <div class="card-body" id='formRec'>
                                            <div class="card-title" style="height: auto; margin-bottom: 10px !important;">
                                                <iframe onload="respuesta()" width="0" height="0" border="0" name="resframe" id="resframe"><input type='hidden' value='<?= $message  ?>' id='info'></iframe>
                                                <form id="form-up-recibo"  action="<?=base_url('app/files/subirReciboAfil/')?>" 
                                                    class="validate-ptp" method="post" enctype="multipart/form-data" target='resframe'>    
                                                    <div class="row">
                                                        <input type="hidden" name="id" id="id"/>
                                                        <input type="file" name="r" id="r" class="form-control required btn btn-info"  accept="application/pdf"required>
                                                        <hr>   
                                                        <div class="form-group col-sm-12 group-cotizacion"  style="display: block;">
                                                            <button  id="btn-recibo" type="submit" class="btn btn-primary default btn-lg">
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


                </div>
                
            </div>
            <!---fin acordeon -->
        </div>
        
    </div>
</div>
</div>

