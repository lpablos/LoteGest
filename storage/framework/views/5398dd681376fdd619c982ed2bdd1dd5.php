 <div class="row mb-3">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required value="<?php echo e(isset($fracc)? $fracc->nombre:''); ?>">
        </div>

        <div class="col-md-6">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="reponsable" class="form-label">Responsable</label>
            <input type="text" name="reponsable" id="reponsable" class="form-control" required value="<?php echo e(isset($fracc)? $fracc->reponsable:''); ?>">
        </div>

        <div class="col-md-6">
            <label for="propietaria" class="form-label">Propietaria</label>
            <input type="text" name="propietaria" id="propietaria" class="form-control" required value="<?php echo e(isset($fracc)? $fracc->propietaria:''); ?>">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="predio_urbano" class="form-label">Predio Urbano</label>
            <input type="text" name="predio_urbano" id="predio_urbano" class="form-control" value="<?php echo e(isset($fracc)? $fracc->predio_urbano:''); ?>">
        </div>

        <div class="col-md-6">
            <label for="superficie" class="form-label">Superficie (m²)</label>
            <input type="number" step="0.01" name="superficie" id="superficie" class="form-control" value="<?php echo e(isset($fracc)? $fracc->superficie:''); ?>">
        </div>
    </div>

   <div class="row mb-3">
    <div class="col-md-6">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="<?php echo e(isset($fracc)? $fracc->ubicacion:''); ?>">
    </div>

    <div class="col-md-6">
        <label for="proyecto_id" class="form-label">Proyecto</label>
        <select name="proyecto_id" id="proyecto_id" class="form-select">
            <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($proyecto->id); ?>"><?php echo e($proyecto->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
    <div class="mb-3">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones" class="form-control" rows="3"> <?php echo e(isset($fracc)? $fracc->observaciones:''); ?> </textarea>
    </div>

   <?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamientos/formulario/fraccionamiento.blade.php ENDPATH**/ ?>