 <div class="row g-3">

    <?php if(isset($lote) && !empty($lote->plano) ): ?>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <img src="<?php echo e(asset('storage/' . $lote->plano)); ?>" alt="Imagen del lote" width="300px">
                <p><?php echo e((isset($lote) && $lote->plano !== ' ') ? $lote->plano : ''); ?></p>
            </div>
        </div>
    <?php endif; ?>
     <div class="col-md-10">
        <label for="medidas_m" class="form-label">Medidas (m)</label>
        <input type="text" step="0.01" name="medidas_m" id="medidas_m<?php echo e($lote->id ?? ''); ?>" class="form-control"  value="<?php echo e(isset($lote)? $lote->medidas_m : ''); ?>" required>
    </div>

    <!-- <div class="col-md-4">
        <label for="frente_m" class="form-label">Frente (m)</label>
        <input type="number" step="0.01" name="frente_m" id="frente_m<?php echo e($lote->id ?? ''); ?>" class="form-control"  value="<?php echo e(isset($lote)? $lote->frente_m : ''); ?>" required>
    </div>

    <div class="col-md-4">
        <label for="fondo_m" class="form-label">Fondo (m)</label>
        <input type="number" step="0.01" name="fondo_m" id="fondo_m<?php echo e($lote->id ?? ''); ?>" class="form-control" value="<?php echo e(isset($lote)? $lote->fondo_m : ''); ?>" required>
    </div> -->
    
    <div class="col-md-2">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2<?php echo e($lote->id ?? ''); ?>" value="<?php echo e(isset($lote)? $lote->superficie_m2 : ''); ?>" class="form-control" <?php echo e(isset($lote) ? 'readonly' : ''); ?>>
    </div>        
    

    <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado<?php echo e($lote->id ?? ''); ?>" value="<?php echo e(isset($lote)? $lote->precio_contado : ''); ?>" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito<?php echo e($lote->id ?? ''); ?>" value="<?php echo e(isset($lote)? $lote->precio_credito : ''); ?>" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="plano" class="form-label">Plano (Archivo)</label>
        <input type="file" name="plano" id="plano<?php echo e($lote->id ?? ''); ?>" value= class="form-control">
    </div>

    <div class="col-md-4">
        <label for="manzana_id" class="form-label">Manzana</label>
        <select name="manzana_id" id="manzana_id<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <?php $__currentLoopData = $fracc->manzanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manzana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($manzana->id); ?>"
                    <?php echo e(isset($lote) && $lote->manzana_id == $manzana->id ? 'selected' : ''); ?>>
                    Manzana <?php echo e($manzana->num_lotes); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="cat_estatus_id" class="form-label">Estatus</label>
        <select name="cat_estatus_id" id="cat_estatus_id<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <?php $__currentLoopData = $estatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estatusItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estatusItem->id); ?>"
                    <?php echo e(isset($lote) && $lote->cat_estatus_id == $estatusItem->id ? 'selected' : ''); ?>>
                    <?php echo e($estatusItem->nombre); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="cat_estatus_disponibilidad_id" class="form-label">Estatus Disponibilidad</label>
        <select name="cat_estatus_disponibilidad_id" id="cat_estatus_disponibilidad_id<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <?php $__currentLoopData = $estatusDisponibilidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estatusItemDispo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estatusItemDispo->id); ?>"
                    <?php echo e(isset($lote) && $lote->cat_estatus_id == $estatusItemDispo->id ? 'selected' : ''); ?>>
                    <?php echo e($estatusItemDispo->nombre); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="user_corredor_id" class="form-label">Corredor(*)</label>
        <select name="user_corredor_id" id="user_corredor_id<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <?php $__currentLoopData = $corredores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corredor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($corredor->id); ?>"
                    <?php echo e(isset($lote) && $lote->user_corredor_id == $corredor->id ? 'selected' : ''); ?>>
                    <?php echo e($corredor->nombre_completo); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones<?php echo e($lote->id ?? ''); ?>" rows="3" class="form-control"></textarea>
    </div>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/formulario/lote.blade.php ENDPATH**/ ?>