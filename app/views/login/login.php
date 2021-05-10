<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LisTo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="public/vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
    <!-- ESPECIAL KIKI -->
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/public/css/cardkiki.css">

    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo RUTA_URL; ?>/public/img/apple-touch-icon.png?v=alJ7x0266R">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo RUTA_URL; ?>/public/img/favicon-32x32.png?v=alJ7x0266R">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo RUTA_URL; ?>/public/img/android-chrome-192x192.png?v=alJ7x0266R">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo RUTA_URL; ?>/public/img/favicon-16x16.png?v=alJ7x0266R">
    <link rel="manifest" href="<?php echo RUTA_URL; ?>/public/img/site.webmanifest?v=alJ7x0266R">
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/public/img/favicon.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo RUTA_URL; ?>/public/img/browserconfig.xml?v=alJ7x0266R">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="hold-transition login-page h-100 mt-4">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?php echo RUTA_URL; ?>/public/img/logo_transparent.png" class="img-fluid"
                alt="Responsive image">
        </div>
        <!-- /.login-logo -->
        <?php include_once 'componentes/formulario.php';?>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="public/vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
    <?php require_once(RUTA_APP . '/views/login/componentes/modalNuevoUsuario.php'); ?>
    <script src="public/js/login/autoPlaces.js"></script>

    

</body>

</html>