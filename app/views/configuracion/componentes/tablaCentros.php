<section class="col-12 col-md-6">

    <!-- Default box -->
    <div class="card card-kiki">
        <div class="card-header">
            <h3 class="card-title">Centros</h3>

            <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-tool btn-choco" data-toggle="modal"
                    data-target="#nuevoCentroModal">
                    <i class="fas fa-cart-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-striped centros" id="centros-table">
                <thead>
                    <tr>
                        <th style="width: 40%">
                            Nombre
                        </th>
                        <th style="width: 40%">
                            Email
                        </th>
                        <th style="width: 20%">
                            Teléfono
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['centros'] as $centro){ ?>
                    <tr data-id="<?php echo $centro->idCentro; ?>" data-modal="editarCentroModal">
                        <td class="row-link">
                            <?php echo $centro->nombreCentro; ?>
                        </td>
                        <td>
                            <?php echo $centro->emailAdministracionCentro; ?>
                        </td>
                        <td>
                            <?php echo $centro->telefonoCentro; ?>
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