 <div class="modal fade" id="editEstatusProyecto(<?php echo e($lote->id); ?>)" tabindex="-1" aria-labelledby="editSede" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
           <div class="modal-header align-items-center">
                <h5 class="modal-title mb-0" id="editSede"> 
                    Editar Lote 
                </h5>
                <h4>

                    <span class="badge ms-3" style="background-color: <?php echo e($lote->disponibilidad->color); ?>; color: white;">
                        <?php echo e($lote->disponibilidad->nombre); ?>

                    </span>
                </h4>

                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('lote.update', ['lote' => $lote->id])); ?>" autocomplete="off" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <?php echo $__env->make('pages.gestion-lotes.formulario.lote', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php
                        $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <?php if(!$readonly): ?>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        <?php endif; ?>
                        </div>
                </form>
            </div>
        <!-- end modal body -->
    </div>
    <!-- end modal-content -->
</div>
<!-- end modal-dialog --><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/modal/edit.blade.php ENDPATH**/ ?>