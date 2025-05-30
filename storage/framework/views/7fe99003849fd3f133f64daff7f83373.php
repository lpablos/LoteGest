 <!-- Nombre -->
<div class="col-md-6">
    <label for="nombre" class="form-label">Nombre *</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre', isset($proyecto) ? $proyecto->nombre : '')); ?>" required>
</div>

<!-- Ubicación -->
<div class="col-md-6">
    <label for="ubicacion" class="form-label">Ubicación *</label>
    <input type="text" class="form-control" id="ubicacion" name="ubicacion"  value="<?php echo e(old('ubicacion', isset($proyecto) ? $proyecto->ubicacion : '')); ?>" required>
</div>

<!-- Latitud -->
<div class="col-md-6">
    <label for="latitud" class="form-label">Latitud</label>
    <input type="number" step="0.0000001" class="form-control" id="latitud" value="<?php echo e(old('latitud', isset($proyecto) ? $proyecto->latitud : '')); ?>" name="latitud">
</div>

<!-- Longitud -->
<div class="col-md-6">
    <label for="longitud" class="form-label">Longitud</label>
    <input type="number" step="0.0000001" class="form-control" id="longitud" value="<?php echo e(old('longitud', isset($proyecto) ? $proyecto->longitud : '')); ?>" name="longitud">
</div>

<!-- Superficie Total -->
<div class="col-md-6">
    <label for="superficie_total_m2" class="form-label">Superficie Total (m²) *</label>
    <input type="number" step="0.01" class="form-control" id="superficie_total_m2" name="superficie_total_m2" value="<?php echo e(old('superficie_total_m2', isset($proyecto) ? $proyecto->superficie_total_m2 : '')); ?>" required>
</div>

<!-- Cantidad de Fraccionamientos -->
<div class="col-md-6">
    <label for="cantidad_fraccionamientos" class="form-label">Cantidad de Fraccionamientos *</label>
    <input type="number" class="form-control" id="cantidad_fraccionamientos" name="cantidad_fraccionamientos" value="<?php echo e(old('cantidad_fraccionamientos', isset($proyecto) ? $proyecto->cantidad_fraccionamientos : '1')); ?>" min="1" required>
</div>

<!-- Estado Actual -->
<div class="col-md-6">
    <label for="estado_actual" class="form-label">Estado Actual</label>
    <select class="form-select" id="estado_actual" name="estado_actual" required>
        <option value="Planificado" <?php echo e(old('estado_actual', isset($proyecto) ? $proyecto->estado_actual : '') == 'Planificado' ? 'selected' : ''); ?>>Planificado</option>
        <option value="Planificado" <?php echo e(old('estado_actual', isset($proyecto) ? $proyecto->estado_actual : '') == 'En desarrollo' ? 'selected' : ''); ?>>En desarrollo</option>
        <option value="Planificado" <?php echo e(old('estado_actual', isset($proyecto) ? $proyecto->estado_actual : '') == 'Finalizado' ? 'selected' : ''); ?>>Finalizado</option>
    </select>
</div>

<!-- Fecha de Inicio -->
<div class="col-md-6">
    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
    <input type="date" class="form-control" id="fecha_inicio" value="<?php echo e(old('fecha_inicio', isset($proyecto) ? $proyecto->fecha_inicio : '')); ?>" name="fecha_inicio">
</div>

<!-- Fecha Fin Estimada -->
<div class="col-md-6">
    <label for="fecha_fin_estimada" class="form-label">Fecha Fin Estimada</label>
    <!-- <input type="date" class="form-control" id="fecha_fin_estimada" name="fecha_fin_estimada"> -->
    <input type="date" class="form-control" id="fecha_fin_estimada" name="fecha_fin_estimada" value="<?php echo e(old('fecha_fin_estimada', isset($proyecto) ? $proyecto->fecha_fin_estimada : '')); ?>">
    <?php $__errorArgs = ['fecha_fin_estimada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="text-danger"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<!-- Responsable del Proyecto -->
<div class="col-md-6">
    <label for="responsable_proyecto" class="form-label">Responsable del Proyecto</label>
    <input type="text" class="form-control" id="responsable_proyecto" name="responsable_proyecto" value="<?php echo e(old('responsable_proyecto', isset($proyecto) ? $proyecto->responsable_proyecto : '')); ?>">
</div>

<!-- Observaciones -->
<div class="col-12">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"><?php echo e(old('observaciones', isset($proyecto) ? $proyecto->observaciones : '')); ?></textarea>
</div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-proyectos/formulario/inputs-proyectos.blade.php ENDPATH**/ ?>