<section class="col-12 col-md-8">

    <!-- Default box -->
    <div class="card card-kiki">
        <div class="card-header">
            <h3 class="card-title">Tareas</h3>

            <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-tool btn-choco" data-toggle="modal" data-target="#nuevaTareaModal">
                    <i class="fas fa-list-ol"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-striped tareas" id="tareas-table">
                <thead>
                    <tr>
                        <th style="width: 70%">
                            Tarea
                        </th>
                        <th style="width: 15%">
                            Tipo
                        </th>
                        <th style="width: 15%">
                            Zona
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['tareas'] as $tarea){ ?>
                    <tr data-id="<?php echo $tarea->idTarea; ?>" data-modal="editarTareaModal">
                        <td class="row-link">
                            <?php echo $tarea->nombreTarea; ?>
                        </td>
                        <td>
                            <span class="badge badge-secondary"><?php echo $tarea->nombreTipo; ?></span>
                        </td>
                        <td>
                            <span class="badge badge-warning"><?php echo $tarea->nombreZona; ?></span>
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