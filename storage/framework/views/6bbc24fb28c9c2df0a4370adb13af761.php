<?php $__env->startSection('title'); ?>
    Usuarios
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
                                    <h2> Usuarios </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                 <a class="btn btn-success btn-rounded waves-effect waves-light mb-2" href="<?php echo e(route('usuarios.create')); ?>" role="button"><i class="mdi mdi-plus me-1"></i> Agregar </a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    

                    <table id="datatable-usuario" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> Nombre </th>
                                <th> Rol </th>
                                <th> Fecha alta </th>
                                <th> Estatus </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($usuario->nombre); ?></td>
                                    <td><?php echo e($usuario->rol); ?></td>
                                    <td> <?php echo e(Carbon\Carbon::parse($usuario->fecha_registro)->format('d-m-Y')); ?> </td>
                                    <td><?php if($usuario->estatus_id == 1): ?> <span class="badge bg-success font-size-12"> <?php echo e($usuario->estatus); ?> </span> <?php else: ?> <span class="badge bg-success font-size-12"> $usuario->estatus </span><?php endif; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-start">
                                                <li><a href="<?php echo e(route('usuarios.edit', ['usuario' => $usuario->id])); ?>" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar </a></li>
                                                <li><a class="dropdown-item cambiarEstado" style="cursor: pointer;" data-id="<?php echo e($usuario->id); ?>"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Deshabilitar </a></li>
                                            </ul>
                                        </div>
                                    </td>
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
            var table = $('#datatable-usuario').DataTable({
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
        
            table.buttons().container().appendTo('#datatable-usuario_wrapper .col-md-6:eq(0)');
        
            $(".dataTables_length select").addClass('form-select form-select-sm');

            //Ajax
            $('.eliminarSede').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: '¿Seguro de eliminar esta sede?',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: "#556ee6",
                    cancelButtonColor: "#f46a6a",
                    preConfirm: function (email) {
                        return new Promise(function (resolve, reject) {
                            setTimeout(function () {
                            
                                    resolve()
                                
                            }, 2000)
                        })
                    },
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'delete',
                            url: 'sede/'+id,
                            success: function (data) {
                                if (data.code == 200) {
                                    toastr.options = {
                                        "closeButton" : false,
                                        "progressBar" : false
                                    }
                                    toastr.success("Sede eliminada");
                                    setTimeout(function(){
                                        window.location.reload();
                                    }, 2000);
                                }

                            },
                            error: function (data) {
                                // console.log(data);
                            }
                        });
                    }
                })
            });
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/usuario/index.blade.php ENDPATH**/ ?>