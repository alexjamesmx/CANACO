<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?=app_name()?> | Control - Panel | <?=$_APP_TITLE?></title>
    <link rel="shortcut icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
    <link rel="icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
</head>

<body>
    <?php if(isset($cservice_id)) : ?>
        <input type="hidden"  value="<?=$cservice_id?>" id="cservice_id" />
    <?php endif; ?>
    <?php if(isset($folio)) : ?>
        <input type="hidden"  value="<?=$folio?>" id="folio" />
        <input type="hidden"  value="<?=$file_name?>" id="file_name" />
        <input type="hidden"  value="<?=$file_type?>" id="file_type" />
    <?php endif; ?>
    <?php if(isset($file_field)) : ?>
        <input type="hidden"  value="<?=$file_field?>" id="file_field" />
        <input type="hidden"  value="<?=$client_id?>" id="client_id" />
        <input type="hidden"  value="<?=$archivo?>" id="archivo" />
        <input type="hidden"  value="<?=$client_count_files?>" id="client_count_files">
    <?php endif; ?>
    <script type="text/javascript"> function base_url(complement = '') { return "<?=base_url()?>"+complement } </script>
    <script type="text/javascript" src="<?=base_url('static/js/vendor/jquery-3.3.1.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('static/js/vendor/bootstrap.bundle.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('static/toastr/toastr.min.js')?>"></script>
    <?php if (isset($scripts)) : 
        foreach($scripts as $script) : ?>
            <script type="text/javascript" src="<?=base_url('static/js/'.$script.'.js')?>"></script>
        <?php endforeach; 
    endif; ?>
    <script type="text/javascript" src="<?=base_url('static/js/app/private/apphelper.js')?>"></script>
</body>
</html>
