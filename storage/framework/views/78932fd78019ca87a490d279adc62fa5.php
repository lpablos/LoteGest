<?php
    $servicios_old = old('servicios_disponibles');
    $servicios = is_array($servicios_old) ? $servicios_old :
                 (isset($fraccionamiento) && is_array($fraccionamiento->servicios_disponibles) ? $fraccionamiento->servicios_disponibles : []);
?>

<div class="row mb-3 mt-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre del Fraccionamiento *</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Fracc. Las Villas" value="<?php echo e(old('nombre', isset($fraccionamiento) ? $fraccionamiento->nombre : '')); ?>"  required>
    </div>
    <div class="col-md-6">
        <label for="superficie_m2" class="form-label">Superficie (m²) *</label>
        <input type="number" step="0.01" class="form-control" id="superficie_m2" name="superficie_m2" placeholder="Ej. 15400.50" value="<?php echo e(old('superficie_m2', isset($fraccionamiento) ? $fraccionamiento->superficie_m2 : '')); ?>"  required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="cantidad_lotes" class="form-label">Cantidad de Lotes *</label>
        <input type="number" class="form-control" id="cantidad_lotes" name="cantidad_lotes" value="1" min="1" value="<?php echo e(old('cantidad_lotes', isset($fraccionamiento) ? $fraccionamiento->cantidad_lotes : '')); ?>"  required>
    </div>
    <div class="col-md-6">
        <label for="uso_predominante" class="form-label">Uso Predominante *</label>
        <select class="form-select" id="uso_predominante" name="uso_predominante" required>
            <option value="">Seleccione uso</option>
            <option value="Habitacional" <?php echo e(old('uso_predominante', isset($fraccionamiento) ? $fraccionamiento->uso_predominante : '') == 'Habitacional' ? 'selected' : ''); ?>>Habitacional</option>
            <option value="Comercial" <?php echo e(old('uso_predominante', isset($fraccionamiento) ? $fraccionamiento->uso_predominante : '') == 'Comercial' ? 'selected' : ''); ?>>Comercial</option>
            <option value="Mixto" <?php echo e(old('uso_predominante', isset($fraccionamiento) ? $fraccionamiento->uso_predominante : '') == 'Mixto' ? 'selected' : ''); ?>>Mixto</option>
        </select>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="etapa" class="form-label">Etapa</label>
        <input type="text" class="form-control" id="etapa" name="etapa" placeholder="Ej. Etapa 1" value="<?php echo e(old('etapa', isset($fraccionamiento) ? $fraccionamiento->etapa : '')); ?>"  >
    </div>
    <div class="col-md-6">
        <label class="form-label">Servicios Disponibles</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios_disponibles[]" value="Agua" id="servicioAgua" <?php echo e(in_array('Agua', $servicios) ? 'checked' : ''); ?>>
            <label class="form-check-label" for="servicioAgua">Agua</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios_disponibles[]" value="Luz" id="servicioLuz" <?php echo e(in_array('Luz', $servicios) ? 'checked' : ''); ?>>
            <label class="form-check-label" for="servicioLuz">Luz</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="servicios_disponibles[]" value="Drenaje" id="servicioDrenaje" <?php echo e(in_array('Drenaje', $servicios) ? 'checked' : ''); ?>>
            <label class="form-check-label" for="servicioDrenaje">Drenaje</label>
        </div>
        <!-- Puedes agregar más opciones si es necesario -->
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Notas o comentarios adicionales..."> <?php echo e(old('observaciones', isset($fraccionamiento) ? $fraccionamiento->observaciones : '')); ?>  </textarea>
    </div>
</div>


<div>
    <div>
        <input type="hidden" name="proyecto" value="<?php echo e(old('observaciones', isset($fraccionamiento) ? $fraccionamiento->proyecto_id : $proyecto_id)); ?>">
    </div>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamiento/formulario/inputs-fraccionamiento.blade.php ENDPATH**/ ?>