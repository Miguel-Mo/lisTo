<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- FILTER col -->
            <?php //include_once(RUTA_APP . '/views/inicio/componentes/colFiltros.php'); ?>
            <!-- /.FILTER col -->
            <!-- Left col -->
            <?php //include_once(RUTA_APP . '/views/inicio/componentes/colTablaTareas.php'); ?>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <?php //include_once(RUTA_APP . '/views/inicio/componentes/colDonutTareas.php'); ?>
            <!-- right col -->
            <!-- FILTER col -->
            <?php include_once(RUTA_APP . '/views/tareas/componentes/tablaTareas.php'); ?>
            <?php require_once(RUTA_APP . '/views/tareas/modales/addAlimento.php') ?>
            <!-- /.FILTER col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->