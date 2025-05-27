<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Preloader'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<body data-sidebar="dark">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
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
                                    <h4> Proyecto </h4>
                                    <h4>"<?php echo e($proyecto->nombre); ?>"</h4>
                                    <h5> Fraccionamiento </h5>
                                    <h5>"<?php echo e($fraccionamiento->nombre); ?>"</h5>
                                    <h6>lotes Asociados</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a class="btn btn-success btn-rounded waves-effect waves-light mb-2" href="" role="button"><i
                                    class="mdi mdi-plus me-1"></i> Agregar </a>
                                <a href="<?php echo e(route('proyectos.index')); ?>" class="btn btn-info rounded-pill mb-2" data-bs-toggle="tooltip" title="Volver a los proyectos"> <i class="bx bx-rotate-left"></i></a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    
                    <?php echo $__env->make('pages.gestion-fraccionamiento.mensajes.alertas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php if($lotes->isEmpty()): ?>
                        <p>No hay proyectos registrados.</p>
                    <?php else: ?>
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 text-center">
                            <thead>
                                <tr>
                                    <th># Lote</th>
                                    <th>Superficie m²</th>
                                    <th>disponible</th>
                                    <th>Uso</th>
                                    <th>Estado legal</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $lotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                         <td><?php echo e($lote->numero_lote); ?></td>
                                        <td><?php echo e($lote->superficie_m2); ?></td>
                                        <td><?php echo e($lote->disponible); ?></td>
                                        <td><?php echo e($lote->uso); ?></td>
                                        <td><?php echo e($lote->estado_legal); ?></td>                                       
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light">
                                                Editar
                                            </a>
                                            <form action="" method="POST" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar este lote?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>                                       
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard.init.js')); ?>"></script>
     <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamiento/lotes.blade.php ENDPATH**/ ?>