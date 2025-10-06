<?php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
?>

<input type="hidden" name="fraccionamiento_id" value="<?php echo e($fracc->id); ?>" required>

<!-- Fila 1 -->
<div class="row mb-3">
    <div class="col-md-3">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" name="num_lote" id="num_lote<?php echo e($lote->id ?? ''); ?>"
               class="form-control"
               value="<?php echo e($lote->num_lote ?? ''); ?>" readonly>
    </div>   

    <div class="col-md-3">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01"
                   name="precio_contado"
                   id="precio_contado<?php echo e($lote->id ?? ''); ?>"
                   value="<?php echo e($lote->manzana->precio_contado ?? ''); ?>"
                   class="form-control" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01"
                   name="precio_credito"
                   id="precio_credito<?php echo e($lote->id ?? ''); ?>"
                   value="<?php echo e($lote->manzana->precio_credito ?? ''); ?>"
                   class="form-control" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <label class="form-label">Mensualidades</label>
        <input type="text" name="mensualidades"
               value="<?php echo e($lote->manzana->mensualidades ?? ''); ?>"
               class="form-control" readonly>
    </div>
</div>

<!-- Fila 2 -->
<div class="row mb-3">
    <div class="col-md-3">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <input type="number" step="0.01"
               name="manzana"
               id="manzana<?php echo e($lote->id ?? ''); ?>"
               value="<?php echo e($lote->manzana->num_manzana ?? ''); ?>"
               class="form-control" readonly>
    </div>

    <div class="col-md-3">
        <label class="form-label">Enganche</label>
       
         <div class="input-group">
            <span class="input-group-text">%</span>
            <input type="text" 
                   name="enganche"
                   id="enganche<?php echo e($lote->id ?? ''); ?>"
                   value="<?php echo e($lote->manzana->enganche ?? ''); ?>"
                   class="form-control" readonly>
        </div>
    </div>

    <!-- Aquí puedes agregar dos campos más en la misma fila -->
    <div class="col-md-3">
        <label class="form-label">Diponibilidad</label>
        <input type="text" 
            name="disponibilidad" 
            id="disponibilidad<?php echo e($lote->id ?? ''); ?>"
            class="form-control" 
            value="<?php echo e($lote->disponibilidad->nombre ?? ''); ?>"
            readonly>
    </div>

    <div class="col-md-3">
        <!-- <label class="form-label">Campo Extra 2</label>
        <input type="text" name="extra2" class="form-control" readonly> -->
    </div>
</div>

<!-- Observaciones ocupa todo -->
<div class="row mb-3">
    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones"
                  id="observaciones<?php echo e($lote->id ?? ''); ?>"
                  rows="3"
                  class="form-control" <?php echo e($readonly); ?>><?php echo e($lote->observaciones ?? ''); ?></textarea>
    </div>
</div>
<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/formulario/lote.blade.php ENDPATH**/ ?>