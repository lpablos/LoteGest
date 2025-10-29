<?php $__env->startSection('title'); ?>
    Estatus de Proyectos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('build/libs/toastr/build/toastr.min.css')); ?>">
    <!-- Sweet Alert-->
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h2> Fraccionamientos </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                 <?php echo $__env->make('pages.gestion-fraccionamientos.modal.add', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <!-- <button type="button" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#add_fraccionamiento"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                        <i class="mdi mdi-plus me-1"></i> Agregar
                                </button> -->
                                <button type="button" 
                                        id="btn-nuevo-fracc"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                    <i class="mdi mdi-plus me-1"></i> Agregar
                                </button>

                            </div>
                        </div>
                    </div>
                   
                    <table id="datatable-estatus-proyecto" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> Fraccionamiento </th>
                                <th> Responsable </th>
                                <th> Propietaria </th>
                                <th> Superficie </th>
                                <th> # Manzanas </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php $__currentLoopData = $fraccionamientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fracc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($fracc->nombre); ?></td>
                                        <td><?php echo e($fracc->responsable); ?></td>
                                        <td><?php echo e($fracc->propietaria); ?></td>
                                        <td><?php echo e($fracc->superficie); ?></td>  
                                        <td><?php echo e($fracc->manzanas->count()); ?></td>  
                                        <td>
                                            <div class="dropdown">
                                                <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-start">
                                                    <li>
                                                        <a  href="javascript:void(0);" 
                                                            class="dropdown-item btn-detalle-fracc"
                                                            data-id="<?php echo e($fracc->id); ?>"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#add_fraccionamiento">
                                                            <i class="mdi mdi-plus font-size-16 text-success me-1"></i> Detalle
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td> 
                                                                
                                    </tr>
                                   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
                        </tbody>
                    </table>

                    <form id="formDuplicarFraccionamiento" method="POST" action="<?php echo e(route('duplicar.fraccionamiento')); ?>" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="inputDuplicarFraccionamientoId">
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- toastr plugin -->
    <script src="<?php echo e(URL::asset('build/libs/toastr/build/toastr.min.js')); ?>"></script>
    <!-- Sweet Alerts js -->
    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <!-- Datatable + Toastr init -->
    <script>
        $(document).ready(function () {
            // CSRF token global para peticiones
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Inicializar DataTable
            var table = $('#datatable-estatus-proyecto').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Sin resultados",
                    "info": "Mostrando 10 registros de _MAX_ en total | Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros disponibles",
                    "infoFiltered": "(filtrando de _MAX_ registros en total)",
                    "search": 'Buscar:',
                    "paginate": { previous: 'Anterior', next: 'Siguiente' }
                },
                lengthChange: true
            });

            table.buttons().container().appendTo('#datatable-estatus-proyecto_wrapper .col-md-6:eq(0)');
            $(".dataTables_length select").addClass('form-select form-select-sm');

            // --- Validación antes de enviar el formulario ---
            document.getElementById('form-fraccionamiento').addEventListener('submit', function (e) {
                const container = document.getElementById('contenedor-lotes');
                if (container.children.length === 0) {
                    e.preventDefault();
                    toastr.options = {
                        "closeButton": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "3000"
                    };
                    toastr.warning("Debes agregar al menos una manzana antes de guardar.");
                }
            });
        });
        // Manejo dinámico de manzanas

        let contadorManzanas = 0;

        // Botón para agregar nuevas manzanas
        document.getElementById('btn-agregar-manzana-btn').addEventListener('click', function () {
            agregarManzana({});
        });

        // Función para agregar una manzana (vacía o con datos)
        function agregarManzana(m) {
            let contenedor = document.getElementById('contenedor-lotes');
            let bloque = `
                <div class="row mb-3 border border-secondary rounded p-2 align-items-end" id="manzana-${contadorManzanas}">
                    ${m.id ? `<input type="hidden" name="manzana[${contadorManzanas}][id]" value="${m.id}">` : ''}
                    <div class="col-md-2">
                        <label class="form-label">No. Lotes</label>
                        <input type="number" name="manzana[${contadorManzanas}][num_lotes]" class="form-control" value="${m.num_lotes || ''}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Precio Contado</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" name="manzana[${contadorManzanas}][precio_contado]" class="form-control" value="${m.precio_contado || ''}" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Precio Crédito</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" name="manzana[${contadorManzanas}][precio_credito]" class="form-control" value="${m.precio_credito || ''}" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Enganche</label>
                        <select name="manzana[${contadorManzanas}][enganche]" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <option value="10" ${m.enganche == "10" ? 'selected' : ''}>10%</option>
                            <option value="15" ${m.enganche == "15" ? 'selected' : ''}>15%</option>
                            <option value="20" ${m.enganche == "20" ? 'selected' : ''}>20%</option>
                            <option value="30" ${m.enganche == "30" ? 'selected' : ''}>30%</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Mensualidades</label>
                        <select name="manzana[${contadorManzanas}][mensualidades]" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <option value="6" ${m.mensualidades == "6" ? 'selected' : ''}>6 meses</option>
                            <option value="12" ${m.mensualidades == "12" ? 'selected' : ''}>12 meses</option>
                            <option value="18" ${m.mensualidades == "18" ? 'selected' : ''}>18 meses</option>
                            <option value="24" ${m.mensualidades == "24" ? 'selected' : ''}>24 meses</option>
                            <option value="30" ${m.mensualidades == "30" ? 'selected' : ''}>30 meses</option>
                            <option value="36" ${m.mensualidades == "36" ? 'selected' : ''}>36 meses</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <div class="m-2">
                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarManzana(${contadorManzanas})">❌</button>
                        </div>
                    </div>
                </div>`;
            contenedor.insertAdjacentHTML('beforeend', bloque);
            contadorManzanas++;
        }

        // Función para eliminar manzana
        function eliminarManzana(id) {
            let bloque = document.getElementById(`manzana-${id}`);
            if (bloque) bloque.remove();
        }

        // Cargar manzanas existentes desde AJAX
        $(document).on('click', '.btn-detalle-fracc', function () {
            let fraccId = $(this).data('id');
            let url = "<?php echo e(route('fraccionamiento.show', ':id')); ?>".replace(':id', fraccId);           
            let urlUpdate = "<?php echo e(route('fraccionamiento.update', ':id')); ?>".replace(':id', fraccId);


            $.get(url, function (data) {
                $('#fracc_id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#responsable').val(data.responsable);
                $('#propietaria').val(data.propietaria);
                $('#superficie').val(data.superficie);
                $('#ubicacion').val(data.ubicacion);
                $('#viento1').val(data.viento1);
                $('#viento2').val(data.viento2);
                $('#viento3').val(data.viento3);
                $('#viento4').val(data.viento4);
                $('#tipo_predios_id').val(data.tipo_predios_id);
                $('#observaciones').val(data.observaciones);

                //Aqui hacermos el update del form
                $('#form-fraccionamiento').attr('action', urlUpdate);
                $('#form_method').val('PUT'); // importantísimo

                let contenedor = $('#contenedor-lotes');
                contenedor.empty();
                contadorManzanas = 0;

                data.manzanas.forEach(m => agregarManzana(m));

                $('#add_fraccionamiento').modal('show');
            });
        });

        // ----------------------
        // Confirmación duplicar con SweetAlert
        function duplica(FraccionamientoId) {
            Swal.fire({
                title: '¿Duplicar Fraccionamiento?',
                text: 'Esta Acción Creará Una Copia Del Fraccionamiento Seleccionado.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, duplicar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('inputDuplicarFraccionamientoId').value = FraccionamientoId;
                    document.getElementById('formDuplicarFraccionamiento').submit();
                }
            });
        }

        $('#btn-nuevo-fracc').click(function() {
            $('#form-fraccionamiento')[0].reset();
            $('#fracc_id').val('');
            $('#form_method').val('POST');
            $('#form-fraccionamiento').attr('action', "<?php echo e(route('fraccionamiento.store')); ?>");
            $('#contenedor-lotes').empty();
            contadorManzanas = 0; 
            $('#add_fraccionamiento').modal('show');
        });


    </script>

    
    <?php if(Session::has('success')): ?>
        <script> toastr.success("<?php echo e(session('success')); ?>"); </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script> toastr.warning("<?php echo e(session('error')); ?>"); </script>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <script>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamientos/index.blade.php ENDPATH**/ ?>