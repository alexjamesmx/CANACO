<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>
    <style>
        .box {
            padding: 12px;
            border-style: solid;
            border-width: 4px;
            border-radius: 6px;
            border-color: 'green';
            font-size: 32px;
            position: absolute;
            left: 35%;
            top: 50%;
            width: 20%;
            height: fit-content;
            margin-left: -15px;
            margin-top: -10px;
        }
    </style>
    <div class='box'>!Bienvenido <?php echo $user[0]['nombre'] ?>! Ya puedes iniciar sesión</div>
</body>

</html>