<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['token_control'] != 1) {
    redireccionar('/Login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" type="image/png" href="<?php echo ICON; ?>"> -->

    <!-- <link href="<?php echo ICON; ?>" rel="apple-touch-icon" />
    <link href="<?php echo ICON; ?>" rel="icon" sizes="192x192" />
    <link href="<?php echo ICON; ?>" rel="icon" sizes="128x128" /> -->
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_URL; ?>/public/img/apple-touch-icon.png?v=alJ7x0266R">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_URL; ?>/public/img/favicon-32x32.png?v=alJ7x0266R">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo RUTA_URL; ?>/public/img/android-chrome-192x192.png?v=alJ7x0266R">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_URL; ?>/public/img/favicon.png">
    <link rel="manifest" href="<?php echo RUTA_URL; ?>/public/img/site.webmanifest?v=alJ7x0266R">
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/public/img/favicon.ico?v=alJ7x0266R">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo RUTA_URL; ?>/public/img/browserconfig.xml?v=alJ7x0266R">
    <meta name="theme-color" content="#ffffff">

    <!-- /FAVICON -->
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <title><?php echo NOMBRE_SITIO; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.min.css">
    <!-- SELECT 2 -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/select2/css/select2.min.css">
    <!-- SELECT 2 BOOTSTRAP 4 -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- SWEETALERT 2 -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- C3js -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/libs/c3-0.7.20/c3.min.css">

    <!-- ESPECIAL KIKI -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/cardkiki.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/cardchoco.css">


</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed text-choco">
    <div class="wrapper">

        <?php include_once 'navbar.php'; ?>
        <?php include_once 'sidebar.php'; ?>

        <!-- <input type="hidden" id="controlador-actual" value="<?php //echo $datos['pagina'];
                                                                    ?>"> -->
        <input type="hidden" id="RUTA-URL" value="<?php echo RUTA_URL; ?>">