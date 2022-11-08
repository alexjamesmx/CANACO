<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=app_name()?> | <?=$_APP['title']?></title>
    <link rel="shortcut icon" href="<?=base_url('static/images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?=base_url('static/images/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="<?=base_url('static/admin/font/iconsmind-s/css/iconsminds.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/font/simple-line-icons/css/simple-line-icons.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/vendor/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/vendor/bootstrap.rtl.only.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/vendor/bootstrap-float-label.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/main.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/dore.light.green.css')?>" />    
    <link rel="stylesheet" href="<?=base_url('static/admin/fa-5.7.2/css/all.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/toastr/toastr.min.css')?>" />
</head>

<body class="background show-spinner">
    <div class="fixed-background" style="opacity: 1; background: url(<?=$bg?>) repeat 50% fixed; filter: blur(7px);"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card" style="border-radius: 25px !important;">
                        <div class="position-relative image-side" style="background: url(<?=$bg_img_side?>) no-repeat center">

                            <p class=" text-white h2">BIENVENIDO</p>

                            <p class="white mb-0">
                                Ingresa tus credenciales para iniciar sesión.
                                <br>
                                ¿Tiene problemas para iniciar sesión?, contacta a 
                                <a href="#" class="white"><u>soporte</u></a>.
                            </p>

                            <h3 class="mt-5 pt-5">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-guide" class="white">
                                    <u>
                                        ¿Nuevo en nuestra plataforma?
                                        <br>
                                        mira nuestra guía interactiva
                                    </u>
                                </a>
                            </h3>
                        </div>
                        <div class="form-side">                            
                            <?php if ($this->session->flashdata('message')) : ?>
                                <div class="alert alert-<?=$this->session->flashdata('message_type')?> alert-dismissible fade show  mb-3" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <?=$this->session->flashdata('message')?>
                                </div>
                            <?php endif; ?>

                            <img src="<?=base_url('static/admin/img/main-logo.png')?>" class="img-fluid d-block mx-auto mb-4" style="max-height: 150px">
                            

                            <h6 class="mb-4">Iniciar sesión</h6>
                            <form id="form-login" method="post" autocomplete="off">
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="username" id="username" required maxlength="70" placeholder="Ingresa tu e-mail registrado para iniciar sesión" />
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Ingresa tu contraseña" required maxlength="35" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                <a href="javascript:void(0)" data-toggle="modal" 
                                data-target="#modal-pass_olv" >   
                                    ¿Olvidaste tu contraseña? 
                                </a>
                                    <button id="form-login-btn-sbmt" type="submit" class="btn btn-primary btn-lg btn-shadow" type="submit">Acceder</button>
                                </div>                                
                                <div class="d-flex justify-content-end mt-5 pt-5">
                                    <a href="<?=base_url('signup')?>" id="form-login-btn-sbmt" type="submit" class="btn btn-primary btn-lg btn-shadow">¿No tienes una cuenta?, Regístrate, ¡es gratis!.</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>

    <!-- #modal-video-support -->
    <div id="modal-guide" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="javascript:void(0);" class="modal-content" method="post">
                <div class="modal-header">
                    <h5 class="modal-title"> GUÍA DE USO ENALCE - CANACO / CONTROL-PANEL </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fas fa-times"></i> </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/N_YskcXmVqU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>                        
                    </div>                   

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <i class="iconsminds-back"> </i> Regresar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /#modal-video-support -->
                            <!-- #modal-video-support -->
            <div id="modal-pass_olv" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="javascript:void(0);" class="modal-content" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title"> Recuperar contraseña </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="far fa-times"></i> </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="correo2" name="correo2"  >
                                    <img src="<?=base_url('static/images/pass.png')?>" class="img-fluid d-block mx-auto mb-4" style="max-height: 150px">
                                        <div class="col-12" >
                                        <label class="form-group has-float-label mb-4">
                                    
                                        <input class="form-control" name="correo" id="correo" required maxlength="70" placeholder="" />
                                            <span>E-mail a recuperar</span>
                                        </label>
                                        </div>                        
                                </div>                   
            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                         Regresar
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="olv_passw()" >
                                        Recuperar
                                    </button>
                               
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
                <!-- /#modal-video-support -->   



    <script type="text/javascript"> function base_url() { return "<?=base_url()?>" } </script>
    <script src="<?=base_url('static/admin/js/vendor/jquery-3.3.1.min.js')?>"></script>
    <script src="<?=base_url('static/admin/js/vendor/bootstrap.bundle.min.js')?>"></script>    
    <script src="<?=base_url('static/admin/toastr/toastr.min.js')?>"></script>
    <script src="<?=base_url('static/admin/js/dore.script.js')?>"></script>
    <script src="<?=base_url('static/admin/js/scripts.single.theme.js')?>"></script>        
    <script src="<?=base_url('static/admin/js/app/public/login.js')?>"></script>   
    <script src="<?=base_url('static/admin/js/app/public/olv_pass.js')?>"></script> 
</body>

</html>
 