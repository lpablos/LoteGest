 <div class="row g-3">

    <div class="col-md-4">
        <label for="frente_m" class="form-label">Frente (m)</label>
        <input type="number" step="0.01" name="frente_m" id="frente_m<?php echo e($lote->id ?? ''); ?>" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="fondo_m" class="form-label">Fondo (m)</label>
        <input type="number" step="0.01" name="fondo_m" id="fondo_m<?php echo e($lote->id ?? ''); ?>" class="form-control" required>
    </div>
    <?php if(isset($lote)): ?>
        <div class="col-md-4">
            <label for="superficie_m2" class="form-label">Superficie (m²)</label>
            <input type="number" step="0.01" name="superficie_m2" id="superficie_m2<?php echo e($lote->id ?? ''); ?>" class="form-control">
        </div>        
    <?php endif; ?>

    <div class="col-md-6">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado<?php echo e($lote->id ?? ''); ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito<?php echo e($lote->id ?? ''); ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="plano" class="form-label">Plano (Archivo)</label>
        <input type="file" name="plano" id="plano<?php echo e($lote->id ?? ''); ?>" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="manzana_id" class="form-label">Manzana</label>
        <select name="manzana_id" id="manzana_id<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <option value="" selected disabled>Selecciona una manzana</option>
            <?php $__currentLoopData = $fracc->manzanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manzana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($manzana->id); ?>">Manzana <?php echo e($manzana->num_lotes); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="cat_estatus_id" class="form-label">Estatus</label>
        <select name="cat_estatus_id" id="cat_estatus_id<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <option value="" selected disabled>Selecciona un estatus</option>
            <?php $__currentLoopData = $estatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estatusItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estatusItem->id); ?>"><?php echo e($estatusItem->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones<?php echo e($lote->id ?? ''); ?>" rows="3" class="form-control"></textarea>
    </div>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/formulario/lote.blade.php ENDPATH**/ ?>