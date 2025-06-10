
<div class="row mb-3">

    <div class="col-md-8">
        <label for="nombre" class="form-label">Nombre del Proyecto *</label>
        <input type="text" class="form-control" id="nombre" name="nombre" style="text-transform:lowercase" value="<?php echo e(isset($proy) ? $proy->nombre : ''); ?>" required>
    </div>

    <div class="col-md-4">
        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo e(isset($proy) ? $proy->fecha_inicio : ''); ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <label for="responsable_proyecto" class="form-label">Responsable del Proyecto</label>
        <input type="text" class="form-control" id="responsable_proyecto" name="responsable_proyecto" style="text-transform:lowercase" value="<?php echo e(isset($proy) ? $proy->responsable_proyecto : ''); ?>">
    </div>

  
</div>


<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea class="form-control" id="observaciones" name="observaciones" rows="4"><?php echo e(isset($proy) ? $proy->observaciones : ''); ?></textarea>
</div>
<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-proyectos/formulario/proyecto.blade.php ENDPATH**/ ?>