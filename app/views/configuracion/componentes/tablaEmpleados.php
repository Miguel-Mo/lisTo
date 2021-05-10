<section class="col-12 col-md-12">

    <!-- Default box -->
    <div class="card card-kiki">
        <div class="card-header">
            <h3 class="card-title">Empleados</h3>

            <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-tool btn-choco" data-toggle="modal"
                    data-target="#nuevoEmpleadoModal">
                    <i class="fas fa-user-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-striped empleados" id="empleados-table">
                <thead>
                    <tr>
                        <th style="width: 30%">
                            Nombre
                        </th>
                        <th style="width: 10%">
                            Teléfono
                        </th>
                        <th style="width: 20%">
                            Email
                        </th>
                        <th style="width: 30%">
                            Centro
                        </th>
                        <th style="width: 10%">
                            Rol
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['empleados'] as $empleado){ ?>
                    <tr data-id="<?php echo $empleado->idPersona; ?>" data-modal="editarEmpleadoModal">
                        <td class="row-link">
                            <?php echo $empleado->nombrePersona; ?>
                        </td>
                        <td>
                            <?php echo 'tel: '.$empleado->telefonoPersona; ?>
                            <br>
                            <?php echo 'mov: '.$empleado->movilPersona; ?>
                        </td>
                        <td>
                            <?php echo $empleado->emailPersona; ?>
                        </td>
                        <td>
                            <?php echo $empleado->nombreCentro; ?>
                        </td>
                        <td>
                            <span class="badge"
                                style="background-color:<?php echo $empleado->colorRol; ?>"><?php echo $empleado->nombreRol; ?></span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>