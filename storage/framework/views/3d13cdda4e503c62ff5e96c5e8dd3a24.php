 <h3> Datos de Compra </h3>
<section>
    <form>
        <div class="row col-md-12">
            <div class="col-md-3 mb-4">
                <label for="num_solicitud"> Núm. de Solicitud </label>
                <input type="text" step="0.01" name="num_solicitud" class="form-control form-control-sm">
            </div>
            <div class="col-md-3 mb-4">
                <label for="corredor"> Corredor </label>
                <select class="form-select form-select-sm" id="corredor" name="corredor" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <?php $__currentLoopData = $corredores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corredor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($corredor->id); ?>">- <?php echo e($corredor->full_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3 mb-4">
                <label for="entidad_id"> Estado </label>
                <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($estado->id); ?>" <?php if($estado->id == 16): ?> selected <?php endif; ?> >- <?php echo e($estado->nom_estado); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="mpio_id"> Municipio </label>
                <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="fracc_id"> Fraccionamiento </label>
                <select class="form-select form-select-sm" id="fracc_id" name="fracc_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <?php $__currentLoopData = $fraccionamientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fraccionamiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fraccionamiento->id); ?>">- <?php echo e($fraccionamiento->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="tp_compra_id"> Tipo de compra </label>
                <select class="form-select form-select-sm" id="tp_compra_id" name="tp_compra_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <option value="1"> Individual </option>
                    <option value="2"> Grupal </option>
                    <option value="3"> Mixto </option>
                </select>
            </div>
            <hr>
            <div class="col-md-3 mb-4">
                <label for="superficie"> Superficie Total </label>
                <input type="text" name="superficie" class="form-control form-control-sm" readOnly>
            </div>
            <div class="col-md-3 mb-4">
                <label for="enganche"> Enganche </label>
                <select class="form-select form-select-sm" id="enganche" name="enganche" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <option value="1"> 10% </option>
                    <option value="2"> 15%</option>
                    <option value="3"> 20%</option>
                    <option value="4"> 30%</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="mensualidades"> Mensualidades </label>
                <select class="form-select form-select-sm" id="mensualidades" name="mensualidades" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <option value="1"> 6 Meses </option>
                    <option value="2"> 12 Meses </option>
                    <option value="3"> 18 Meses </option>
                    <option value="4"> 24 Meses  </option>
                    <option value="5"> 30 Meses </option>
                    <option value="6"> 36 Meses </option>
                </select>
            </div>
            <hr>
            <div class="text-end m-1" id="b_add_lote">
                <button type="button" id="btn_add_lote" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                    + Lote
                </button>
            </div>
            <div class="row mb-1">
                <div id="contenedor-lotes"></div>
            </div>
            <hr>
            <div class="text-end m-1">
                <button type="button" id="btn_add_medidas" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                    + Medias y colindancias
                </button>
            </div>
            <div class="row mb-1">
                <div id="contenedor-medidas"></div>
            </div>
            <hr>
        </div>
    </form>
</section><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/cliente/pasos/compra.blade.php ENDPATH**/ ?>