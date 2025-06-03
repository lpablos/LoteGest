<?php if(isset($fracc) && !empty($fracc->imagen) ): ?>
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="<?php echo e(asset('storage/' . $fracc->imagen)); ?>" alt="Imagen del fraccionamiento" width="700">
            <p><?php echo e((isset($fracc) && $fracc->imagen !== ' ') ? $fracc->imagen : ''); ?></p>
        </div>
    </div>
<?php endif; ?>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" required value="<?php echo e(isset($fracc)? $fracc->nombre:''); ?>">
    </div>

    <div class="col-md-6">
        <label for="imagen" class="form-label">Imagen </label>
        <input type="file" name="imagen" id="imagen<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="reponsable" class="form-label">Responsable</label>
        <input type="text" name="reponsable" id="reponsable<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" required value="<?php echo e(isset($fracc)? $fracc->reponsable:''); ?>">
    </div>

    <div class="col-md-6">
        <label for="propietaria" class="form-label">Propietaria</label>
        <input type="text" name="propietaria" id="propietaria<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" required value="<?php echo e(isset($fracc)? $fracc->propietaria:''); ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="predio_urbano" class="form-label">Predio Urbano</label>
        <input type="text" name="predio_urbano" id="predio_urbano<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->predio_urbano:''); ?>">
    </div>

    <div class="col-md-6">
        <label for="superficie" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie" id="superficie<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->superficie:''); ?>">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->ubicacion:''); ?>">
    </div>

    <div class="col-md-6">
        <label for="proyecto_id" class="form-label">Proyecto</label>
        <select name="proyecto_id" id="proyecto_id<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-select">
            <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($proyecto->id); ?>"><?php echo e($proyecto->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>


<div class="mb-3">
    <label class="form-label">Manzanas</label>

   <?php
        $fraccId = $fracc->id ?? 'nuevo';
        $manzanas = old('manzanas', $fracc->manzanas ?? []);
    ?>

    <div id="manzanas-container-<?php echo e($fraccId); ?>">
        <?php $index = 0; ?>
        <?php $__currentLoopData = old('manzanas', $fracc->manzanas ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manzana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card p-3 mb-3 border rounded position-relative">
                <button type="button" class="btn-close position-absolute end-0 top-0 m-2" onclick="this.parentElement.remove()" aria-label="Eliminar"></button>
                <div class="row">
                    <div class="col-md-2">
                        <label class="form-label"># Manzana</label>
                        <input type="number" name="manzanas[<?php echo e($index); ?>][num_lotes]" class="form-control" value="<?php echo e($manzana['num_lotes'] ?? ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Norte</label>
                        <input type="text" name="manzanas[<?php echo e($index); ?>][colinda_norte]" class="form-control" value="<?php echo e($manzana['colinda_norte'] ?? ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Sur</label>
                        <input type="text" name="manzanas[<?php echo e($index); ?>][colinda_sur]" class="form-control" value="<?php echo e($manzana['colinda_sur'] ?? ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Este</label>
                        <input type="text" name="manzanas[<?php echo e($index); ?>][colinda_este]" class="form-control" value="<?php echo e($manzana['colinda_este'] ?? ''); ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Oeste</label>
                        <input type="text" name="manzanas[<?php echo e($index); ?>][colinda_oeste]" class="form-control" value="<?php echo e($manzana['colinda_oeste'] ?? ''); ?>">
                    </div>
                </div>
            </div>
            <?php $index++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <div class="col-12 text-center mt-2">
       <button type="button" class="btn btn-sm btn-primary"
            onclick="agregarManzana('<?php echo e(isset($fracc) ? $fracc->id : 'nuevo'); ?>')">
            Agregar Manzana
        </button>
    </div>
</div>


<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea name="observaciones" id="observaciones<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" rows="3"> <?php echo e(isset($fracc)? $fracc->observaciones:''); ?> </textarea>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        window.manzanaIndexes = window.manzanaIndexes || {};
        window.manzanaIndexes["<?php echo e($fraccId); ?>"] = <?php echo e(count(old('manzanas', $fracc->manzanas ?? []))); ?>;
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamientos/formulario/fraccionamiento.blade.php ENDPATH**/ ?>