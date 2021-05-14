<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-kiki elevation-4 bg-light">
    <!-- Brand Logo -->
    <strong>
        <?php if ($_SESSION['rol'] == 1) { ?>
        <a href="<?php echo RUTA_URL; ?>/Inicio" class="brand-link">
            <?php } else { ?>
            <a href="<?php echo RUTA_URL.'/Empleados/EmpleadosCentro/'.$_SESSION['centro']->idCentro; ?>"
                class="brand-link">
                <?php } ?>
                <img src="<?php echo LOGO; ?>" alt="CASA KIKI" class="brand-image" style="opacity: 1">
                <span class="brand-text font-weight-bold text-bold text-choco fuenteKiki">Lis<b
                        class="text-kiki">T</b>o</span>
            </a>

    </strong>

    <!-- Sidebar -->
    <div class="sidebar bg-choco">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if ($_SESSION['rol'] == 1) { ?>
                <!-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo RUTA_URL; ?>/Inicio" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <?php //echo (str_contains($_SERVER['REQUEST_URI'], '/Inicio'))?' active':'';?>
                <li class="nav-item">
                    <a href="<?php echo RUTA_URL; ?>/Inicio" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Inicio')) ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Resumen
                            <!-- <span class="right badge badge-danger">50</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo RUTA_URL; ?>/Alimentos" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Alimentos')) ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Alimentos
                            <!-- <span class="right badge badge-danger">50</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo RUTA_URL; ?>/Recetas" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Recetas')) ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Recetas
                            <!-- <span class="right badge badge-danger">5</span> -->
                        </p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?php echo RUTA_URL; ?>/Empleados" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Empleados')) ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-user-ninja"></i>
                        <p>
                            Empleados
                            <!-- <span class="right badge badge-danger">60</span> -->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>