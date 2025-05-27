<?php $__env->startSection('title'); ?> Proyecto <?php $__env->stopSection(); ?>

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

                    <h4 class="card-title">Creación de Fraccionamiento</h4>
                    <?php echo $__env->make('pages.gestion-fraccionamiento.mensajes.alertas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="text-end">
                        <a href="<?php echo e(url()->previous()); ?>"
                        class="btn btn-info rounded-pill mb-2"
                        data-bs-toggle="tooltip"
                        title="Volver a la página anterior">
                            <i class="bx bx-rotate-left"></i>
                        </a>
                    </div>
                    <form action="<?php echo e(route('fraccionamiento.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <?php echo $__env->make('pages.gestion-fraccionamiento.formulario.inputs-fraccionamiento', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <!-- Botón de enviar -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
   
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamiento/create.blade.php ENDPATH**/ ?>