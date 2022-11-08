<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Rick | INFO Rick y morty |</title>
    <link rel="shortcut icon" href="<?= base_url(
    'static/admin/img/logit.jpg'
    ) ?>"
    type="image/x-icon">
    <link rel="icon" href="<?= base_url(
    'static/admin/img/logit.jpg'
    ) ?>" type="image/x-icon">
    <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet"
    href="<?= base_url(
    'static/admin/font/iconsmind-s/css/iconsminds.css'
    ) ?>" />
    <link rel="stylesheet"
    href="<?= base_url(
    'static/admin/font/simple-line-icons/css/simple-line-icons.css'
    ) ?>" />
    <link rel="stylesheet" href="<?= base_url(
    'static/admin/css/vendor/bootstrap.min.css'
    ) ?>" />
    <link rel="stylesheet"
    href="<?= base_url(
    'static/admin/css/vendor/bootstrap.rtl.only.min.css'
    ) ?>" />
    
    <link rel="stylesheet"
    href="<?= base_url(
    'static/admin/css/responsive.css'
    ) ?>" />
    

    <link rel="stylesheet"
    href="<?= base_url(
    'static/admin/css/vendor/bootstrap-float-label.min.css'
    ) ?>" />
    <link rel="stylesheet"
    href="<?= base_url(
    'static/admin/css/vendor/component-custom-switch.min.css'
    ) ?>" />
    <link rel="stylesheet"
    href="<?= base_url('static/admin/css/vendor/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url(
    'static/admin/css/main.css'
    ) ?>" />
    <link rel="stylesheet" href="<?= base_url(
    'static/admin/css/dore.light.green.min.css'
    ) ?>" />
    <link rel="stylesheet" href="<?= base_url(
    'static/admin/fa-5.15.3/css/all.min.css'
    ) ?>" />
    <link rel="stylesheet" href="<?= base_url(
    'static/admin/toastr/toastr.min.css'
    ) ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"/>
    
    <?php if (isset($styles)):
        foreach ($styles as $style): ?>
            <link rel="stylesheet" href="<?= base_url(
            'static/admin/css/' . $style . '.css'
            ) ?>" />
        <?php endforeach;
    endif; ?>
    <?php if (isset($stylescdn)):
        foreach ($stylescdn as $stylecdn): ?>
            <link rel="stylesheet" href="<?= $stylecdn ?>" />
        <?php endforeach;
    endif; ?>
    <link rel="stylesheet" href="<?= base_url(
    'static/admin/css/vendor/no-more-tables.css'
    ) ?>" />
    <style type="text/css">
        form.validate-ptp label.error {
            display: none !important;
        }

        input.err,
        input.error,
        textarea.err,
        textarea.error,
        select.err,
        select.error {
            border: #bf6464 2px dashed !important;
            background-color: #fdfbfb !important;

            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }


        /*
        Form Validation
        */
        form.validate label.error {
            position: absolute;
            background-color: #ff0000;
            color: #fff;
            left: 0;
            z-index: 10;
            bottom: -26px;
            left: 36px;
            font-size: 11px;
            font-weight: 400;
            padding: 3px;
            display: none !important;
        }

    </style>
</head>

<body id="app-container" class="menu-sub-hidden rounded show-spinner">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block"
                    aria-label="breadcrumb">
                  
            </nav>
            <div class="separator mb-5"></div>
        </div>
    </div>



<?= $_APP_FRAGMENT ?>
</div>

<footer class="page-footer" style="opacity: 1; border-top: 1px solid #576a3d !important; padding-top: 2.2rem;margin-top: 2.2rem; height: 90px;">
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p class="mb-0 text-muted"><strong>Arquitectura de Software &reg; <?=date('Y')?>. Ingeniería en Desarrollo y Gestión de Software </strong></p>
                </div>
            </div>
        </div>
    </div>
</footer>

</main>


<script type="text/javascript">
    function base_url(complement = '') {
        return "<?= base_url() ?>" + complement
    }
</script>
<script type="text/javascript"
src="<?= base_url('static/admin/js/vendor/jquery-3.3.1.min.js') ?>"></script>
<script type="text/javascript"
src="<?= base_url(
'static/admin/js/vendor/bootstrap.bundle.min.js'
) ?>"></script>
<script type="text/javascript"
src="<?= base_url(
'static/admin/js/vendor/perfect-scrollbar.min.js'
) ?>"></script>
<script type="text/javascript"
src="<?= base_url('static/admin/js/vendor/mousetrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url(
'static/admin/toastr/toastr.min.js'
) ?>">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">

<script type="text/javascript" src="<?= base_url(
'static/admin/app/private/modules/controladortabla.js'
) ?>">

</script>
<script type="text/javascript" src="<?= base_url(
'static/admin/js/dore.script.js'
) ?>">
</script>
<?php if (isset($scripts)):
    foreach ($scripts as $script): ?>
        <script type="text/javascript" src="<?= base_url(
        'static/admin/js/' . $script . '.js'
        ) ?>">
    </script>
<?php endforeach;
endif; ?>
<?php if (isset($scriptscdn)):
    foreach ($scriptscdn as $scriptcdn): ?>
        <script type="text/javascript" src="<?= $scriptcdn ?>">
        </script>
    <?php endforeach;
endif; ?>

<script type="text/javascript"
src="<?= base_url('static/admin/js/scripts.single.theme.js') ?>"></script>
<script type="text/javascript"
src="<?= base_url('static/admin/js/vendor/jquery.form.min.js') ?>"></script>
<script type="text/javascript"
src="<?= base_url(
'static/admin/js/vendor/jquery.validation.min.js'
) ?>"></script>

<script type="text/javascript"
src="<?= base_url('static/admin/js/app/private/apphelper.js') ?>"></script>

<script type="text/javascript"
src="<?= base_url(
'static/admin/js/vendor/bootstrap-datepicker.js'
) ?>"></script>


</body>

</html>
