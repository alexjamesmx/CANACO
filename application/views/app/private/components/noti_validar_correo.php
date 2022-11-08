<!-- Esta vista es la plantilla para la mayoria de las notificaciones -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= app_name() ?> | <?= $notification->notificacion ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Handy Hogar" />
    <meta name="keywords" content="Handy Hogar" />
    <meta name="author" content="Impactos Digitales" />
    <meta name="email" content="contacto@impactosdigitales.com" />
    <meta name="website" content="https://impactosdigitales.com" />
    <meta name="Version" content="v0.2.1" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

</head>

<body style="font-family: Poppins, sans-serif; font-size: 15px; font-weight: 400; color: #0a3356;">


    <!-- Hero Start -->
    <div style="margin-top: 50px;">
        <table cellpadding="0" cellspacing="0" style="font-family: Poppins, sans-serif; font-size: 15px; font-weight: 400; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
            <thead>
                <tr style="background-color: #69b800; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
                    <th scope="col">
                        <img src="https://enlacecanaco.org/static/images/canaco_imagotipo_blanco_trans.png" height="85" alt="" style="margin-top:30px">
                    </th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td style="padding: 24px 24px 0; text-align: center">
                        <img src="https://enlacecanaco.org/static/images/GRAFICO.jpg">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <p style="text-align: justify;">
                            Para completar tu registro debes confirmar haciendo click en el botón debajo de este texto.
                        </p>

                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <div style="text-align: justify;justify-content:center;margin:0 auto">
                            <a rel="noopener" target="_blank" href="<?= base_url() ?>signup/confirmarEmail/<?= $reg_user ?>" style="background-color: #69b800;margin:0 auto; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-decoration: none; padding: 14px 20px; color: #ffffff; border-radius: 5px; display: inline-block; mso-padding-alt: 0;">&rarr; Confirmar registro
                                <a>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <p style="text-align: justify;">

                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <p style="text-align: justify;">
                            Si desea mayor información sobre nuestros servicios, soluciones, herramientas y propuesta de valor,<a href="https://wa.me/524422198567" target="_blank"> escríbanos aquí</a> y un afiliador le atenderá personalmente.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <p style="text-align: justify;">

                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 16px 8px; color: #3a3c39; background-color: #f8f9fc; text-align: center;">
                        &copy; <?= date('Y') ?> <?= app_name() ?>.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Hero End -->

</body>

</html>