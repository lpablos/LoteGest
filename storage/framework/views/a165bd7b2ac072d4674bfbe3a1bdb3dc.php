  <div class="row mb-3">
    <div class="col-md-4">
    <label for="numero_lote" class="form-label">Número de Lote *</label>
    <input type="text" class="form-control" id="numero_lote" name="numero_lote" value="<?php echo e(old('numero_lote', isset($lote) ? $lote->numero_lote : '')); ?>" required>
    </div>
    <div class="col-md-4">
    <label for="superficie_m2" class="form-label">Superficie (m²) *</label>
    <input type="number" class="form-control" id="superficie_m2" name="superficie_m2" min="1" step="0.01" value="<?php echo e(old('superficie_m2', isset($lote) ? $lote->superficie_m2 : '')); ?>" required>
    </div>
    <div class="col-md-2">
    <label for="frente_m" class="form-label">Frente (m) *</label>
    <input type="number" class="form-control" id="frente_m" name="frente_m" step="0.01" min="1" value="<?php echo e(old('frente_m', isset($lote) ? $lote->frente_m : '')); ?>" required>
    </div>
    <div class="col-md-2">
    <label for="fondo_m" class="form-label">Fondo (m) *</label>
    <input type="number" class="form-control" id="fondo_m" name="fondo_m" step="0.01" min="1" value="<?php echo e(old('fondo_m', isset($lote) ? $lote->fondo_m : '')); ?>" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
    <label for="orientacion" class="form-label">Orientación</label>
    <input type="text" class="form-control" id="orientacion" name="orientacion" value="<?php echo e(old('orientacion', isset($lote) ? $lote->orientacion : '')); ?>">
    </div>
    <div class="col-md-4">
    <label for="precio_m2" class="form-label">Precio por m²</label>
    <input type="number" class="form-control" id="precio_m2" name="precio_m2"  value="<?php echo e(old('precio_m2', isset($lote) ? $lote->precio_m2 : '')); ?>" step="0.01">
    </div>
    <div class="col-md-4">
    <label for="precio_total" class="form-label">Precio Total</label>
    <input type="number" class="form-control" id="precio_total" name="precio_total" value="<?php echo e(old('precio_total', isset($lote) ? $lote->precio_total : '')); ?>" step="0.01">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
    <label for="uso" class="form-label">Uso :: <?php echo e($lote->uso); ?></label>
    <select class="form-select" id="uso" name="uso" required>
        <option value="Habitacional" selected>Habitacional</option>
        <option value="Comercial" <?php echo e(old('uso', isset($lote) ? $lote->uso : '') == 'Comercial' ? 'selected' : ''); ?>>Comercial</option>
        <option value="Mixto" <?php echo e(old('uso', isset($lote) ? $lote->uso : '') == 'Mixto' ? 'selected' : ''); ?>>Mixto</option>
        <option value="Otro" <?php echo e(old('uso', isset($lote) ? $lote->uso : '') == 'Otro' ? 'selected' : ''); ?>>Otro</option>
    </select>
    </div>
    <div class="col-md-6">
    <label for="estado_legal" class="form-label">Estado Legal * :: <?php echo e($lote->estado_legal); ?></label>
    <select class="form-select" id="estado_legal" name="estado_legal" required>
        <option value="Escriturado" <?php echo e(old('estado_legal', isset($lote) ? $lote->estado_legal : '') == 'Escriturado' ? 'selected' : ''); ?>>Escriturado</option>
        <option value="En proceso" <?php echo e(old('estado_legal', isset($lote) ? $lote->estado_legal : '') == 'En proceso' ? 'selected' : ''); ?>>En proceso</option>
        <option value="Reservado" <?php echo e(old('estado_legal', isset($lote) ? $lote->estado_legal : '') == 'Reservado' ? 'selected' : ''); ?>>Reservado</option>
        <option value="En trámite" <?php echo e(old('estado_legal', isset($lote) ? $lote->estado_legal : '') == 'En trámite' ? 'selected' : ''); ?>>En trámite</option>
    </select>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"><?php echo e(old('observaciones', isset($lote) ? $lote->observaciones : '')); ?></textarea>
    </div>
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" value="1" id="disponible" name="disponible" <?php echo e(old('disponible', isset($lote) ? $lote->disponible : false) ? 'checked' : ''); ?>>
    <label class="form-check-label" for="disponible">
        Disponible
    </label>
</div>

<div>
    <div><input type="hidden" name="fraccionamiento_id" value="<?php echo e(old('fraccionamiento_id', isset($lote) ? $lote->fraccionamiento_id : $fraccionamiento_id)); ?>" ></div>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/formulario/inputs-lote.blade.php ENDPATH**/ ?>