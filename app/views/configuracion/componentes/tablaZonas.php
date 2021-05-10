<section class="col-12 col-md-4">

    <!-- Default box -->
    <div class="card card-kiki">
        <div class="card-header">
            <h3 class="card-title">Zonas</h3>

            <div class="card-tools">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-tool btn-choco" data-toggle="modal" data-target="#nuevaZonaModal">
                    <i class="fas fa-list-ol"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-sm table-striped zonas" id="zonas-table">
                <thead>
                    <tr>
                        <th style="width: 80%">
                            Zona
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['zonas'] as $zona){ ?>
                    <tr data-id="<?php echo $zona->idZona; ?>" data-modal="editarZonaModal">                        
                        <td class="row-link">
                            <?php echo $zona->nombreZona; ?>
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