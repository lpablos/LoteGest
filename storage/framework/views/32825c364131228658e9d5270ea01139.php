<select class="form-select form-select-sm" name="manzana[]" style="cursor: pointer;" required>
    <option value="" selected disabled> Selecciona una opción </option>
    <?php $__currentLoopData = $corredores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corredor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($corredor->id); ?>">- <?php echo e($corredor->full_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/partials/opciones_corredores.blade.php ENDPATH**/ ?>