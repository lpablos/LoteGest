 <div class="modal fade" id="editEstatusProyecto(<?php echo e($fracc->id); ?>)" tabindex="-1" aria-labelledby="editSede" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSede"> Editar Fraccionamiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('fraccionamiento.update', ['fraccionamiento' => $fracc->id])); ?>" autocomplete="off"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <?php echo $__env->make('pages.gestion-fraccionamientos.formulario.fraccionamiento', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        <!-- end modal body -->
    </div>
    <!-- end modal-content -->
</div>
<!-- end modal-dialog --><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamientos/modal/edit.blade.php ENDPATH**/ ?>