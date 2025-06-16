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
                                    <h2> Lotes </h2>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($fracc)): ?>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <button type="button" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#add_proyecto"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                            <i class="mdi mdi-plus me-1"></i> Agregar
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if(isset($fracc)): ?>
                        <?php echo $__env->make('pages.gestion-lotes.modal.add', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>

                   <div class="container d-flex justify-content-center mt-5">
                        <div class="col-md-6">
                            <form method="GET" action="<?php echo e(route('lote.index')); ?>">
                                <div class="mb-3">
                                    <label for="fraccionamiento" class="form-label">Fraccionamiento</label>
                                    <select class="form-select" id="fraccionamiento" name="identy" required>
                                        <option value="" disabled <?php echo e(old('identy', $identy ?? '') == '' ? 'selected' : ''); ?>>Selecciona un fraccionamiento</option>
                                        <?php $__currentLoopData = $fraccionamientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fraccc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($fraccc->id); ?>" <?php echo e((old('identy', $identy ?? '') == $fraccc->id) ? 'selected' : ''); ?>>
                                                <?php echo e($fraccc->nombre); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                           
                           

                    <table id="datatable-estatus-proyecto" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> num_lote</th>
                                <th> Superficie (m2) </th>
                                <th> Precio Contado </th>
                                <th> Precio Credito </th>
                                <th> Manzana </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>    
                            <?php $__currentLoopData = $fracc->lotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($lote->num_lote); ?></td>
                                    <td><?php echo e($lote->superficie_m2); ?></td>
                                    <td><?php echo e($lote->precio_contado); ?></td>      
                                    <td><?php echo e($lote->precio_credito); ?></td>   
                                    <td>Manzana <?php echo e($lote->manzana); ?></td>      
                                    <td>
                                    <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="#editEstatusProyecto(<?php echo e($lote->id); ?>)" data-bs-toggle="modal" class="dropdown-item" data-edit-id="<?php echo e($lote->id); ?>">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td> 
                                <?php if(isset($fracc)): ?>
                                    <?php echo $__env->make('pages.gestion-lotes.modal.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>                                    
                                <?php endif; ?>
                                </tr>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                           
                        </tbody>
                    </table>
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

    <!-- toastr init -->
    <script src="<?php echo e(URL::asset('build/js/pages/toastr.init.js')); ?>"></script>
    <!-- Datatable init js -->
    <script>
        $(document).ready(function() {

            // Se declara el token global para las peticiones que se vayan a realizar
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
        
            //Buttons examples
            var table = $('#datatable-estatus-proyecto').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Sin resultados",
                    "info": "Mostrando 10 registros de _MAX_ en total | Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros disponibles",
                    "infoFiltered": "(filtrando de _MAX_ registros en total)",
                    "search": 'Buscar:',
                    "paginate": {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    }
                },
                lengthChange: true
            });
        
            table.buttons().container().appendTo('#datatable-estatus-proyecto_wrapper .col-md-6:eq(0)');
        
            $(".dataTables_length select").addClass('form-select form-select-sm');
        });
    </script>
    <?php if(Session::has('success')): ?>
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            }
            toastr.success("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            }
            toastr.warning("<?php echo e(session('error')); ?>");
        </script>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            };
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/index.blade.php ENDPATH**/ ?>