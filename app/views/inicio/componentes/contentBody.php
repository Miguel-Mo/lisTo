<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
            <!-- FILTER col -->
            <?php include_once(RUTA_APP . '/views/inicio/componentes/colFiltros.php'); ?>
            <!-- /.FILTER col -->
            <!-- Left col -->
            <?php include_once(RUTA_APP . '/views/inicio/componentes/colTablaTareas.php'); ?>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <?php include_once(RUTA_APP . '/views/inicio/componentes/colDonutTareas.php'); ?>
            <!-- right col -->
            <section class="col-12">

                <!-- Default box -->
                <div class="card card-kiki">
                    <div class="card-header">
                        <h3 class="card-title">Tareas Por Persona</h3>

                        <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-sm table-striped projects" id="tareas-personas-table">
                            <thead>
                                <tr>
                                    <!-- <th style="width: 1%">
                            #
                        </th> -->
                                    <th style="width: 20%">
                                        Empleado
                                    </th>
                                    <th style="width: 20%">
                                        Centro
                                    </th>
                                    <th style="width: 10%">
                                        Terminadas
                                    </th>
                                    <th style="width: 10%">
                                        Pendientes
                                    </th>
                                    <th style="width: 20%">
                                        Tiempo Empleado
                                    </th>
                                    <th style="width: 20%">
                                        Tiempo Previsto
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="45" data-modal="editarTareaModal" class="">

                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Mª José
                                                    Brescia</strong>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Gaucín</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">40</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">20</span>

                                    <td>
                                        <span class="badge badge-info text-lg">7 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="61" data-modal="editarTareaModal" class="">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Jose Antonio
                                                    Perea</strong>
                                            </li>
                                        </ul>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Fuengirola</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">50</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">10</span>

                                    <td>
                                        <span class="badge badge-info text-lg">6,5 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="60" data-modal="editarTareaModal" class="">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Antonia Benitez Rando</strong>
                                            </li>
                                        </ul>
                                    </td>                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Gaucín</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">30</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">30</span>

                                    <td>
                                        <span class="badge badge-info text-lg">5,25 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="52" data-modal="editarTareaModal" class="">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Veronica Villa Blanca</strong>
                                            </li>
                                        </ul>
                                    </td>                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Coín</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">45</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">15</span>

                                    <td>
                                        <span class="badge badge-info text-lg">8 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="44" data-modal="editarTareaModal">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Reme Moreno</strong>
                                            </li>
                                        </ul>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Coín</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">35</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">25</span>

                                    <td>
                                        <span class="badge badge-info text-lg">4 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="59" data-modal="editarTareaModal">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Julio González Pérez</strong>
                                            </li>
                                        </ul>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Gaucín</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">20</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">40</span>

                                    <td>
                                        <span class="badge badge-info text-lg">6,75 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="43" data-modal="editarTareaModal">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Andrés Moreno</strong>
                                            </li>
                                        </ul>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Coín</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">55</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">5</span>

                                    <td>
                                        <span class="badge badge-info text-lg">8 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>
                                <tr data-id="51" data-modal="editarTareaModal">
                                    <!-- <td>
                            #
                        </td> -->
                                    <td>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item">
                                                <img class="table-avatar bg-light"
                                                    src="https://casakiki.dataleanmakers.com.es/public/img/iconoPast1.png"
                                                    alt="Avatar">
                                                <strong class="text-bold text-center text-choco text-md">Ángeles Bonilla</strong>
                                            </li>
                                        </ul>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-kiki text-md text-choco">Torremolinos</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-kiki text-lg">59</span>

                                    </td>
                                    <td>
                                        <span class="badge badge-choco text-lg">1</span>

                                    <td>
                                        <span class="badge badge-info text-lg">8,25 h</span>
                                    </td>

                                    <td>
                                        <span class="badge badge-warning text-lg">8,5 h</span>
                                    </td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->