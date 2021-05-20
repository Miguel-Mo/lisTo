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
            <?php }  ?>
                <img src="<?php echo LOGO; ?>" alt="CASA KIKI" class="brand-image" style="opacity: 1">
                <span class="brand-text font-weight-bold text-bold text-choco fuenteKiki">Lis<b
                        class="text-kiki">T</b>o</span>
            </a>

    </strong>

    <!-- Sidebar -->
    <div class="sidebar bg-choco">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

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
                    <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Recetas
                            <!-- <span class="right badge badge-danger">5</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo RUTA_URL; ?>/Listas" class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Listas')) ? ' active' : ''; ?>">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Listas
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