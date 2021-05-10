<section class="col-12">

    <!-- Default box -->
    <div class="card card-kiki">
        <div class="card-header">
            <h3 class="card-title">Tareas</h3>
            <div class="card-tools">
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-tool btn-choco" data-toggle="modal" data-target="#nuevaTareaModal">
                    <i class="far fa-calendar-plus"></i>
                </button> -->
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-tool btn-choco" data-toggle="modal"
                    data-target="#editarTareaModal">
                    <i class="far fa-calendar-minus"></i>
                </button> -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-striped projects">
                <thead>
                    <tr>
                        <!-- <th style="width: 1%">
                            #
                        </th> -->
                        <th style="width: 30%">
                            Tarea
                        </th>
                        <th style="width: 10%">
                            Fecha
                        </th>
                        <th style="width: 10%">
                            Zona
                        </th>
                        <th style="width: 10%">
                            Tipo
                        </th>
                        <th style="width: 10%" class="text-center">
                            Estado
                        </th>
                        <th style="width: 14%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['tareas_empleado'] as $tarea_empleado) { ?>

                    <tr data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                        <!-- <td>
                            #
                        </td> -->
                        <td>
                            <u>
                                <?php echo $tarea_empleado->nombreTarea; ?>
                            </u>
                            <br>
                            <!-- <small>
                                <?php echo 'Iniciada -'.$tarea_empleado->nombreTarea; ?>
                            </small>
                            <br>
                            <small>
                                <?php echo 'Finalizada -'.$tarea_empleado->nombreTarea; ?>
                            </small>
                            <br>
                            <small>
                                <?php echo 'Finalizada -'.$tarea_empleado->nombreTarea; ?>
                            </small> -->
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($tarea_empleado->fechaTarea)); ?>
                        </td>
                        <td class="project_progress">
                            <span class="badge badge-info ">
                                <?php echo $tarea_empleado->nombreZona; ?>
                            </span>
                        </td>
                        <td class="project_progress">
                            <span class="badge badge-choco ">
                                <?php echo $tarea_empleado->nombreTipo; ?>
                            </span>
                        </td>
                        <td class="project-state estado-tarea">
                            <?php if ((!is_null($tarea_empleado->inicioTarea) || !empty($tarea_empleado->inicioTarea)) &&
                                    (!is_null($tarea_empleado->finTarea) || !empty($tarea_empleado->finTarea))) { ?>
                            <span class="badge badge-success">Completada</span>
                            <?php } elseif ((!is_null($tarea_empleado->inicioTarea) || !empty($tarea_empleado->inicioTarea)) &&
                                    (is_null($tarea_empleado->finTarea) || empty($tarea_empleado->finTarea)) &&
                                    (!is_null($tarea_empleado->idUltimaPausa) || !empty($tarea_empleado->idUltimaPausa))) { ?>
                            <span class="badge badge-warning">Pausada</span>
                            <?php } elseif ((!is_null($tarea_empleado->inicioTarea) || !empty($tarea_empleado->inicioTarea)) &&
                                    (is_null($tarea_empleado->finTarea) || empty($tarea_empleado->finTarea)) &&
                                    (is_null($tarea_empleado->idUltimaPausa) || empty($tarea_empleado->idUltimaPausa))) { ?>
                            <span class="badge badge-primary">En proceso</span>
                            <?php } else { ?>
                            <span class="badge badge-secondary">Pendiente</span>
                            <?php } ?>
                        </td>




                        <?php if ((!empty($tarea_empleado->idUltimaPausa) || !is_null($tarea_empleado->idUltimaPausa))) { ?>
                        <td class="project-actions text-right acciones-tarea text-center"
                            data-id_pausa="<?php echo $tarea_empleado->idUltimaPausa; ?>" data-is_paused="1">
                            <?php } else { ?>
                        <td class="project-actions text-right acciones-tarea text-center">
                            <?php } ?>

                            <?php if ((!is_null($tarea_empleado->inicioTarea) || !empty($tarea_empleado->inicioTarea)) &&
                                    (!is_null($tarea_empleado->finTarea) || !empty($tarea_empleado->finTarea))) { ?>
                            <!-- ==============================================================Completada====================================================== -->

                            <?php } elseif ((!is_null($tarea_empleado->inicioTarea) || !empty($tarea_empleado->inicioTarea)) &&
                                    (is_null($tarea_empleado->finTarea) || empty($tarea_empleado->finTarea)) &&
                                    (!is_null($tarea_empleado->idUltimaPausa) || !empty($tarea_empleado->idUltimaPausa))) { ?>
                            <!-- ===========================================================Pausada========================================================= -->

                            <button class="btn btn-choco btn-lg empezar-tarea"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-play-circle"></i>
                            </button>
                            <button class="btn btn-warning btn-lg pausar-tarea" style="display: none;"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-pause-circle"></i>
                            </button>
                            <button class="btn btn-success btn-lg completar-tarea"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-check-circle"></i>
                            </button>

                            <?php } elseif ((!is_null($tarea_empleado->inicioTarea) || !empty($tarea_empleado->inicioTarea)) &&
                                    (is_null($tarea_empleado->finTarea) || empty($tarea_empleado->finTarea)) &&
                                    (is_null($tarea_empleado->idUltimaPausa) || empty($tarea_empleado->idUltimaPausa))) { ?>
                            <!-- =========================================================En proceso=========================================================== -->

                            <button class="btn btn-choco btn-lg empezar-tarea" style="display: none;"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-play-circle"></i>
                            </button>
                            <button class="btn btn-warning btn-lg pausar-tarea"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-pause-circle"></i>
                            </button>
                            <button class="btn btn-success btn-lg completar-tarea"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-check-circle"></i>
                            </button>

                            <?php } else { ?>
                            <!-- ==============================================================Pendiente====================================================== -->

                            <button class="btn btn-choco btn-lg empezar-tarea"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-play-circle"></i>
                            </button>
                            <button class="btn btn-warning btn-lg pausar-tarea" style="display: none;"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-pause-circle"></i>
                            </button>
                            <button class="btn btn-success btn-lg completar-tarea" style="display: none;"
                                data-id="<?php echo $tarea_empleado->idTareaPersona; ?>">
                                <i class="far fa-check-circle"></i>
                            </button>

                            <?php } ?>



                            

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