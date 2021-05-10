<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <?php if ($_SESSION['rol'] == 1) { ?>
            <a href="<?php echo RUTA_URL; ?>/Inicio" class="nav-link">Inicio</a>
            <?php } else { ?>
            <a href="<?php echo RUTA_URL.'/Empleados/EmpleadosCentro/'.$_SESSION['centro']->idCentro; ?>"
                class="nav-link">
                <?php echo 'Centro '.$_SESSION['centro']->nombreCentro.', '.$_SESSION['centro']->poblacionCentro; ?>
            </a>
            <?php } ?>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <?php if ($_SESSION['rol'] == 1) { ?>
        
        <?php } ?>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" id="fullwidget">
                <i class="fas fa-expand-arrows-alt text-choco"></i>

            </a>
        </li>

        <?php if ($_SESSION['rol'] == 1) { ?>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-list text-choco"></i>
                <span class="badge badge-kiki navbar-badge ">4</span>
            </a>
        </li>
        <?php } ?>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA_URL; ?>/Login/vaciar" role="button">
                <i class="fas fa-sign-out-alt text-danger"></i>

            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->