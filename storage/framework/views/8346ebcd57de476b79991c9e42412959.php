<?php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
?>

<div class="row g-3 mt-3">
    
    <div class="col-12 text-center mb-2">
        <h5 class="mb-0">Lote asociado</h5>
    </div>

    <?php if(isset($lote) && !empty($lote->plano)): ?>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <img src="<?php echo e(asset('storage/' . $lote->plano)); ?>" alt="Imagen del lote" width="100px" height="150">
            </div>
        </div>
    <?php endif; ?>

    <div class="col-md-10">
        <label for="medidas_m" class="form-label">Medidas (m)</label>
        <input type="text" step="0.01" name="medidas_m" id="medidas_m<?php echo e($lote->id ?? ''); ?>" class="form-control" value="<?php echo e($lote->medidas_m ?? ''); ?>" required <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-2">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->superficie_m2 ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>  

    <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" step="0.01" name="num_lote" id="num_lote<?php echo e($lote->id ?? ''); ?>" class="form-control" value="<?php echo e($lote->num_lote ?? ''); ?>" required <?php echo e($readonly); ?>>
    </div>

    <!-- <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->precio_contado ?? ''); ?>" class="form-control" required <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->precio_credito ?? ''); ?>" class="form-control" required <?php echo e($readonly); ?>>
    </div> -->

    <!-- <div class="col-md-4">
        <label for="plano" class="form-label">Plano (jpg,jpeg,png,webp)</label>
        <input type="file" name="plano" id="plano<?php echo e($lote->id ?? ''); ?>" class="form-control" <?php echo e($disabled); ?>>
    </div> -->

    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <option value="1">Manzana 1</option>
            <option value="2">Manzana 2</option>
            <option value="3">Manzana 3</option>
        </select>
    </div>   

    <div class="col-md-4">
        <label class="form-label">Colinda Norte</label>
        <input type="text" name="colinda_norte" value="<?php echo e($lote->colinda_norte ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Sur</label>
        <input type="text" name="colinda_sur" value="<?php echo e($lote->colinda_sur ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Este</label>
        <input type="text" name="colinda_este" value="<?php echo e($lote->colinda_este ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Oeste</label>
        <input type="text" name="colinda_oeste" value="<?php echo e($lote->colinda_oeste ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <!-- <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones<?php echo e($lote->id ?? ''); ?>" rows="3" class="form-control" <?php echo e($readonly); ?>><?php echo e($lote->observaciones ?? ''); ?></textarea>
    </div> -->
</div>


<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/contratos/formulario/lote.blade.php ENDPATH**/ ?>