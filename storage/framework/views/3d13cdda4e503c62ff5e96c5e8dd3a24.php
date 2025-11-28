 <h3> Datos de Compra </h3>
<section>
    
    <div class="row col-md-12">
        <div>
            <input type="hidden" name="identyCli" id="identyCli">
            <input type="hidden" name="compra" id="compraIdenty">
        </div>
        <div class="col-md-3 mb-4">
            <label for="num_solicitud"> Núm. de Solicitud (*)</label>
            <input type="text" step="0.01" name="num_solicitud" id="num_solicitud" class="form-control form-control-sm" style="text-transform: uppercase;">
        </div>
        <div class="col-md-3 mb-4">
            <label for="corredor"> Corredor (*)</label>
            <select class="form-select form-select-sm" id="corredor" name="corredor" style="cursor: pointer;" required>
                <option value="" selected disabled> Selecciona una opción </option>
                <?php $__currentLoopData = $corredores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corredor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($corredor->id); ?>">- <?php echo e($corredor->full_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3 mb-4">
            <label for="entidad_id"> Estado (*)</label>
            <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                <option value="" selected disabled> Selecciona una opción </option>
                <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($estado->id); ?>" <?php if($estado->id == 16): ?> selected <?php endif; ?> >- <?php echo e($estado->nom_estado); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3 mb-4">
            <label for="mpio_id"> Municipio (*)</label>
            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                <option value="" selected disabled> Selecciona una opción </option>
                <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3 mb-4">
            <label for="fracc_id"> Fraccionamiento (*)</label>
            <select class="form-select form-select-sm" id="fracc_id" name="fracc_id" style="cursor: pointer;" required>
                <option value="" selected disabled> Selecciona una opción </option>
                <?php $__currentLoopData = $fraccionamientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fracci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($fracci->id); ?>">- <?php echo e($fracci->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-2 mb-4">
            <label> Tipo de Venta (*)</label>
            <select id="tipoVentaSelect" class="form-select form-select-sm tipoVentaSelect" name="venta_tp" required style="cursor: pointer;">
                <option value="" selected>Selecciona una opción</option>
                <option value="precio_credito"> Crédito </option>
                <option value="precio_contado"> Contado </option>
            </select>
        </div>
    </div>
    <div class="row col-md-12 text-center">
        <div class="m-1" id="b_add_lote">
            <button type="button" id="btn_add_compra" class="btn btn-sm btn-primary btn-small waves-effect waves-light" disabled>
                Agregar Compra
            </button>
        </div>
    </div>

    <div class="row mb-4">
        <div id="contenedor-compra"></div>
    </div>

    <div class="row mb-1" id="resumen_compra" style="display:none;">
         <div class="row col-md-12 mb-3 lote-item-venta">
            <div class="col-md-3 mb-4">
                <label>Superficie Total (m2)</label>
                <input type="text" name="superficiel_venta" id="superficiel_venta" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-md-3 mb-4">
                <label>Total de Venta (MXN)</label>
                <input type="text" name="total_venta" id="total_venta" class="form-control form-control-sm" readonly>
                
            </div>
            <div class="col-md-3 mb-4">
                <label> % de Enganche </label>
                <select class="form-select form-select-sm engancheVentaSelect" name="enganche_venta_select" id="enganche_venta_select" require style="cursor: pointer;">
                    <option value="" selected>Selecciona una opción</option>                   
                </select>
                
            </div>
            <div class="col-md-3 mb-4">
                <label>Valor del Enganche (MXN)</label>
                <input type="text" name="enganche_venta" id="enganche_venta" class="form-control form-control-sm" required>
            </div>
           
            <div class="col-md-3 mb-4">
                <label>Menualidades</label>
                <select class="form-select form-select-sm mensualidadVentaSelect" id="mensualidades_venta_asc"  name="mensualidad_venta_select" required style="cursor: pointer;">
                    <option value="" selected disabled>Selecciona una opción</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label>Total Mensualidad</label>
                <input type="text" id="pago_mensual_venta" name="pago_mensual_venta" class="form-control form-control-sm" readonly>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div id="contenedor-tablas"></div>
    </div>

</section><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/cliente/pasos/compra.blade.php ENDPATH**/ ?>