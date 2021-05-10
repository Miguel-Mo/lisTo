<?php include_once 'webfooter.php'; ?>
<?php include_once 'controlSidebar.php'; ?>

</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js">
</script>
<!-- Sparkline -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- daterangepicker -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js">
</script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.min.js">
</script>
<!-- overlayScrollbars -->
<script
    src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<!-- <script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script> -->

<!-- SELECT 2 -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/select2/js/select2.full.min.js">
</script>

<!-- SWEETALERT 2 -->
<script src="<?php echo RUTA_URL; ?>/public/vendor/almasaeed2010/adminlte/plugins/sweetalert2/sweetalert2.all.min.js">
</script>

<!-- C3 js -->
<script src="<?php echo RUTA_URL; ?>/public/libs/c3-0.7.20/docs/js/d3-5.8.2.min.js"></script>
<script src="<?php echo RUTA_URL; ?>/public/libs/c3-0.7.20/c3.min.js"></script>

<script src="<?php echo RUTA_URL; ?>/public/js/inicio/graficos/chart_donut.js"></script>
<script src="<?php echo RUTA_URL; ?>/public/js/inicio/graficos/chart_gauge.js"></script>
<script src="<?php echo RUTA_URL; ?>/public/js/inicio/graficos/chart_pie.js"></script>

<!-- MAIN -->
<script src="<?php echo RUTA_URL; ?>/public/js/main.js"></script>

<!-- AdminLTE EXTRA UTILITIES -->
<script src="<?php echo RUTA_URL; ?>/public/js/adminlteUtilities.js"></script>

<!-- CRUDS CONFIGURACION -->
<script src="<?php echo RUTA_URL; ?>/public/js/configuracion/cargaForms.js"></script>
<script src="<?php echo RUTA_URL; ?>/public/js/configuracion/configuracion.js"></script>

<!-- tareas_persona -->
<script src="<?php echo RUTA_URL; ?>/public/js/tareas/timer.js"></script>

<!-- <script>
$(window).resize(function() {
    let iconFull = $('#fullwidget > i').hasClass('fa-expand-arrows-alt');
    console.log(iconFull);
    if (screen.width < 1024 && iconFull == true) {
        $('#fullwidget',document).click();
    } else if (screen.width < 1280 && iconFull == true) {
        $('#fullwidget',document).click();
    } else if (screen.width > 1280 && iconFull == false) {
        $('#fullwidget',document).click();
    }
});
</script> -->

</body>

</html>