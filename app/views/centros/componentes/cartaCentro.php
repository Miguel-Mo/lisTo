<?php foreach($datos['centros'] as $centro){ ?>
<div class="col">
    <div class="card text-white mb-3">
        <div class="card-header bg-choco">
            
            <div class="widget-user-image ">
                <img class="img-md" src="<?php echo LOGO; ?>" alt="User Avatar"><h3 class="card-tittle text-center text-kiki fuenteKiki"><?php echo $centro->nombreCentro; ?></h3>
            </div>
                

        </div>
        <div class="card-body text-choco">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Empleados
                    <span class="badge badge-kiki badge-pill"><?php echo $centro->Empleados; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Tareas Hoy
                    <span class="badge badge-kiki badge-pill"><?php echo $centro->TareasHoy; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Tareas Realizadas Hoy
                    <span class="badge badge-kiki badge-pill"><?php echo $centro->TareasTerminadasHoy; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Tareas
                    <span class="badge badge-kiki badge-pill"><?php echo $centro->TareasTotal; ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Tareas Realizadas
                    <span class="badge badge-kiki badge-pill"><?php echo $centro->TareasTerminadasTotal; ?></span>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center">
            <a href="<?php echo RUTA_URL; ?>/Empleados/EmpleadosCentro/<?php echo $centro->idCentro; ?>" class="btn btn-md btn-kiki">Tareas por Empleado</a>
        </div>
    </div>
</div>

<?php } ?>