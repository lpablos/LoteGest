<div class="modal fade" id="add_rol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('perfiles.store')); ?>" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div class="row col-md-12">
                        <div class="col-md-12 mb-3">
                            <label for="nombre" class="col-form-label"> Nombre </label>
                            <input type="text" class="form-control form-control-sm" name="nombre" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/roles/add.blade.php ENDPATH**/ ?>