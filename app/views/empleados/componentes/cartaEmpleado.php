<?php foreach ($datos['empleados'] as $empleado) { ?>
<div class="col">
    <div class="card card-widget widget-user-2 shadow-sm">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-choco">
            <div class="widget-user-image ">
                <img class="img-circle elevation-2 bg-light" src="<?php echo RUTA_URL; ?>/public/img/iconoPast1.png" alt="User Avatar">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username fuenteKiki"><?php echo $empleado->nombrePersona; ?></h3>
            <h5 class="widget-user-desc"><?php echo $empleado->nombreRol; ?></h5>
        </div>
        <div class="card-footer p-0">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <strong><a href="<?php echo RUTA_URL.'/TareasEmpleado/'.$empleado->idPersona; ?>" class="nav-link bg-kiki text-choco">
                        VER TAREAS DE HOY <span class="float-right badge bg-choco"><?php echo $empleado->TareasHoy; ?></span>
                    </a></strong>
                </li>
                <li class="nav-item">
                    <a href="<?php echo RUTA_URL.'/TareasEmpleado/verTodasTareas/'.$empleado->idPersona; ?>" class="nav-link text-choco">
                        TOTAL TAREAS<span class="float-right badge bg-kiki"><?php echo $empleado->TareasTotal; ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-choco">
                        Tareas Completadas Hoy <span class="float-right badge bg-kiki"><?php echo $empleado->TareasTerminadasHoy; ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-choco">
                        Total Completadas <span class="float-right badge bg-kiki"><?php echo $empleado->TareasTerminadasTotal; ?></span>
                    </a>
                </li>
                <li class="nav-item bg-secondary">
                    <a href="<?php echo RUTA_URL; ?>/Centros" class="nav-link text-choco">
                        CENTRO: <span class="float-right text-kiki"><?php echo $empleado->nombreCentro; ?></span></a>
                    
                </li>
            </ul>
        </div>
    </div>
</div>

<?php } ?>