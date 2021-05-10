<?php require(RUTA_APP . '/views/includes/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php include_once(RUTA_APP . '/views/configuracion/componentes/contentHeader.php'); ?>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php include_once(RUTA_APP . '/views/configuracion/componentes/contentBody.php'); ?>
    <!-- /.content -->
</div>

<!-- Modales -->
<?php
    foreach (glob(RUTA_APP.'/views/configuracion/modales/*') as $modal) {
        require_once $modal;
    }
?>
<?php require(RUTA_APP . '/views/includes/footer.php'); ?>