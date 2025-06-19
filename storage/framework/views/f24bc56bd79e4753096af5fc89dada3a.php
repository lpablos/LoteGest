<?php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
?>

<div class="row g-3 mt-3">
    
   
    <div>
        <div>
            <div>
                <input type="hidden" name="fraccionamiento_id" required>
            </div>
        </div>
    </div>

    <?php if(isset($lote) && !empty($lote->plano)): ?>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <img src="<?php echo e(asset('storage/' . $lote->plano)); ?>" alt="Imagen del lote" width="100px" height="150">
            </div>
        </div>
    <?php endif; ?>

    <div class="col-12 text-center mb-2">
        <h5 class="mb-0">Detalle de Compra</h5>
    </div>

 

    <div class="col-md-4">
        <label for="num_compra" class="form-label">Num de Compra</label>
        <input type="number" step="0.01" name="num_compra" id="num_compra<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->superficie_m2 ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>  

    <div class="col-md-4">
        <label for="manzana" class="form-label">Corredor Asociado</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <option value="ARQ-JUAN-PEREZ">Arq. Juan Pérez Ramírez</option>
            <option value="ING-MARIA-GOMEZ">Ing. María Gómez Torres</option>
            <option value="LIC-CARLOS-HERNANDEZ">Lic. Carlos Hernández López</option>
        </select>
    </div> 
    
    <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->precio_contado ?? ''); ?>" class="form-control" required <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->precio_credito ?? ''); ?>" class="form-control" required <?php echo e($readonly); ?>>
    </div>

     <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Venta Acordado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->precio_contado ?? ''); ?>" class="form-control" required <?php echo e($readonly); ?>>
    </div>

    <!-- <div class="col-md-4">
        <label for="manzana" class="form-label">Esquema de compra</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <option value="" selected disabled>Selecciona un esquema de compra</option>
            <option value="contado">Contado</option>
            <option value="credito_bancario">Crédito bancario</option>
            <option value="financiamiento_directo">Financiamiento directo</option>
            <option value="infonavit">Infonavit</option>
            <option value="fovissste">FOVISSSTE</option>
            <option value="leasing">Arrendamiento financiero (leasing)</option>
            <option value="apartado">Apartado con pagos</option>
        </select>
    </div>    -->
    <div class="col-md-4">
        <label for="manzana" class="form-label">Acuerdo de pago</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <option value="apartado">Apartado con pagos parciales</option>
            <option value="contado">Pago de contado</option>
            <option value="credito_bancario">Crédito bancario</option>
            <option value="financiamiento_directo">Financiamiento directo</option>
            <option value="infonavit">Crédito Infonavit</option>
            <option value="fovissste">Crédito FOVISSSTE</option>
            <option value="leasing">Arrendamiento financiero (Leasing)</option>
            <option value="acuerdo_pago">Acuerdo de pago personalizado</option>
            <option value="plan_mensualidades">Plan de mensualidades</option>
            <option value="convenio_especial">Convenio especial</option>
        </select>
    </div>   

     <div class="col-md-4">
        <label for="manzana" class="form-label">Plasos de pagos</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <option value="6">6 meses</option>
            <option value="12">12 meses</option>
            <option value="18">18 meses</option>
            <option value="24">24 meses</option>
            <option value="36">36 meses</option>
            <option value="48">48 meses</option>
            <option value="60">60 meses</option>
        </select>
    </div>   
    <!-- <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->precio_credito ?? ''); ?>" class="form-control" required <?php echo e($readonly); ?>>
    </div> -->

    <!-- <div class="col-md-4">
        <label for="plano" class="form-label">Plano (jpg,jpeg,png,webp)</label>
        <input type="file" name="plano" id="plano<?php echo e($lote->id ?? ''); ?>" class="form-control" <?php echo e($disabled); ?>>
    </div> -->

    <!-- <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <option value="1">Manzana 1</option>
            <option value="2">Manzana 2</option>
            <option value="3">Manzana 3</option>
        </select>
    </div>    -->

    <!-- <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones<?php echo e($lote->id ?? ''); ?>" rows="3" class="form-control" <?php echo e($readonly); ?>><?php echo e($lote->observaciones ?? ''); ?></textarea>
    </div> -->
</div>


<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/contratos/formulario/compra.blade.php ENDPATH**/ ?>