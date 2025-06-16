 <div class="row g-3">
    <div>
        <div>
            <div><input type="hidden" name="fraccionamiento_id" value="<?php echo e($fracc->id); ?>" required></div>
        </div>
    </div>
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
     <div class="col-md-2">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2<?php echo e($lote->id ?? ''); ?>" value="<?php echo e(isset($lote)? $lote->superficie_m2 : ''); ?>" class="form-control" <?php echo e(isset($lote) ? 'readonly' : ''); ?>>
    </div>  

    <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" step="0.01" name="num_lote" id="num_lote<?php echo e($lote->id ?? ''); ?>" class="form-control"  value="<?php echo e(isset($lote)? $lote->num_lote : ''); ?>" required>
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
        <input type="file" name="plano" id="plano<?php echo e($lote->id ?? ''); ?>" value="" class="form-control">
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

    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required>
            <?php $__currentLoopData = range(1, $fracc->manzanas); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($i); ?>">Manazna <?php echo e($i); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>   
    <div class="col-md-4">
        <label class="form-label">Colinda Norte</label>
        <input type="text" name="colinda_norte" value="<?php echo e(isset($lote)? $lote->colinda_norte : ''); ?>" class="form-control">
    </div>
    <div  class="col-md-4">
        <label  class="form-label">Colinda Sur</label>
        <input type="text" name="colinda_sur" value="<?php echo e(isset($lote)? $lote->colinda_sur : ''); ?>" class="form-control">
    </div>
    <div  class="col-md-4">
        <label class="form-label">Colinda Este</label>
        <input type="text" name="colinda_este" value="<?php echo e(isset($lote)? $lote->colinda_este : ''); ?>" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Colinda Oeste</label>
        <input type="text" name="colinda_oeste" value="<?php echo e(isset($lote)? $lote->colinda_oeste : ''); ?>" class="form-control">
    </div>
    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones<?php echo e($lote->id ?? ''); ?>" rows="3" class="form-control"><?php echo e($lote->observaciones ?? ''); ?></textarea>
    </div>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/formulario/lote.blade.php ENDPATH**/ ?>