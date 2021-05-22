<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
            <!-- FILTER col -->
            <?php include_once(RUTA_APP . '/views/inicio/componentes/listaActual.php'); ?>

            <!-- /.FILTER col -->
            <!-- Left col -->
            <?php include_once(RUTA_APP . '/views/inicio/componentes/colTablaTareas.php'); ?>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <?php include_once(RUTA_APP . '/views/inicio/componentes/colDonutTareas.php'); ?>
            <!-- right col -->
        </div>


        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->