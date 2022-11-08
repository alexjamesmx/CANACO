<!-- La siguiente vista es la plantilla correspondiente a la notificacion con id 16 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=app_name()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Handy Hogar" />
    <meta name="keywords" content="Handy Hogar" />
    <meta name="author" content="Impactos Digitales" />
    <meta name="email" content="contacto@impactosdigitales.com" />
    <meta name="website" content="https://impactosdigitales.com" />
    <meta name="Version" content="v0.2.1" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
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
                        <img src="https://enlacecanaco.org/static/images/GRAFICO.jpg" >
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <h1 style="text-align: center;"><?=$mail->titulo?></h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0; text-align: center">
                        <img src="<?=base_url()?>static/images/Online report_Two Color.png" height="400" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                        <p style="text-align: justify;">
                            <?=$mail->subtitulo?>
                        </p>
                    </td>
                </tr>
                <tr>                    
                    <td style="padding: 24px 24px 0;">
                        <table cellpadding="3" cellspacing="0" style="border: none;">
                            <tbody>  
                                
                            
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;"><b>Se busca: </b></td>
                                    <td style="color: #3a3c39; min-width: 130px; padding-bottom: 8px;"><?=$requerimiento["busq_nec"]?></td>
                                </tr>
                            
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;"><b>Especificaciones: </b></td>
                                    <td style="color: #3a3c39; min-width: 130px; padding-bottom: 8px;"><?=$requerimiento["especificaciones"]?></td>
                                </tr>
                                
                                                                  
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;"><b>Cantidad: </b></td>
                                    <td style="color: #3a3c39; min-width: 130px; padding-bottom: 8px;"><?=$requerimiento["qty"]?></td>
                                </tr>

                                                                
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;"><b>Usuario: </b></td>
                                    <td style="color: #3a3c39; min-width: 130px; padding-bottom: 8px;"><?=$usuarios["usuarios"]?></td>
                                </tr>

                                <?php
                                    if($requerimiento["entrega"]=="1"){
                                        $urge="Urgente";
                                    }else if($requerimiento["entrega"]=="2"){
                                        $urge="Prioritario";
                                    }else if($requerimiento["entrega"]=="3"){
                                        $urge="Estandares de mercado";

                                    }

                                ?>
                            
                                <tr>
                                    <td style="min-width: 130px; padding-bottom: 8px;"><b>Fecha Requerida: <b></td>
                                    <td style="color: #3a3c39; min-width: 130px; padding-bottom: 8px;"><?=$urge?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 24px 24px 0;">
                            <p style="text-align: justify;">
                                <?=$mail->info_general?>
                            </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 24px 24px 0;">
                            <p style="text-align: justify;">
                                <?=$mail->llamado_accion?>
                            </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 16px 8px; color: #3a3c39; background-color: #f8f9fc; text-align: center;">
                        &copy; <?=date('Y')?> <?=app_name()?>.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Hero End -->
</body>
</html>
