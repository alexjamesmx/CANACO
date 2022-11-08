
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Handy Hogar" />
    <meta name="keywords" content="Handy Hogar" />
    <meta name="author" content="Impactos Digitales" />
    <meta name="email" content="contacto@impactosdigitales.com" />
    <meta name="website" content="https://impactosdigitales.com" />
    <meta name="Version" content="v0.2.1" />
    <!-- favicon -->
    <link rel="stylesheet" href="<?=base_url('static/admin/font/iconsmind-s/css/iconsminds.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/font/simple-line-icons/css/simple-line-icons.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/vendor/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/vendor/bootstrap.rtl.only.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/vendor/bootstrap-float-label.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/main.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/css/dore.light.green.css')?>" />    
    <link rel="stylesheet" href="<?=base_url('static/admin/fa-5.7.2/css/all.min.css')?>" />
    <link rel="stylesheet" href="<?=base_url('static/admin/toastr/toastr.min.css')?>" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
</head>

<body style="font-family: Poppins, sans-serif; font-size: 15px; font-weight: 400; color: #0a3356;">
<?php if ( !is_null($token) ){  ?>


    <!-- Hero Start -->
    <div style="margin-top: 50px;">
        <table cellpadding="0" cellspacing="0" style="font-family: Poppins, sans-serif; font-size: 15px; font-weight: 400; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
            <thead>
                <tr style="background-color: #69b800; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
                    <th scope="col">
                        <img src="<?=base_url()?>static/images/canaco imagotipo blanco trans.png" height="85" alt="" style="margin-top:30px">
                    </th>
                </tr>
            </thead>

            <tbody>
               
                <tr>
                    <td style="padding: 24px 24px 0; text-align: center">
                        <img src="https://enlacecanaco.org/static/images/recuperar_pass.png" style="max-height: 400px !important;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="text-align: center;">
                            Codigo para recuperar la contraseña:
                        </p>
                        <strong style="text-align: center;">
                            <?= $token ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a type="button" class="btn btn-primary" href="<?=base_url('Pass_olv/recuperar')?>" >
                                    Validar código
                        </a>   
                    </td>                 
                </tr>
    
                <tr>
                    <td style="padding: 16px 8px; color: #3a3c39; background-color: #f8f9fc; text-align: center;">
                        &copy;
                    </td>
                </tr>
            </tbody> 
        </table>
    </div>
    <!-- Hero End -->
    <?php }?>
</body>
</html>
