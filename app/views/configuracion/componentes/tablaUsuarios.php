<section class="col-12 col-md-6">

    <!-- Default box -->
    <div class="card card-kiki">
        <div class="card-header">
            <h3 class="card-title">Usuarios</h3>

            <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-tool btn-choco" data-toggle="modal"
                    data-target="#nuevoUsuarioModal">
                    <i class="fas fa-user-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-striped usuarios" id="usuarios-table">
                <thead>
                    <tr>
                        <th style="width: 30%">
                            Usuario
                        </th>
                        <th style="width: 40%">
                            Email
                        </th>
                        <th style="width: 30%">
                            Rol
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($datos['usuarios'] as $usuario){ ?>
                    <tr data-id="<?php echo $usuario->idUsuario; ?>" data-modal="editarUsuarioModal">
                        <td class="row-link">
                            <?php echo $usuario->nombreUsuario; ?>
                        </td>
                        <td>
                            <?php echo $usuario->emailUsuario; ?>
                        </td>
                        <td>
                            <span class="badge"
                                style="background-color:<?php echo $usuario->colorRol; ?>"><?php echo $usuario->nombreRol; ?></span>
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