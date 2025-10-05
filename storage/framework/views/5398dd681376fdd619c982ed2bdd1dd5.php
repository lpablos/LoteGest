
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="" alt="Imagen del fraccionamiento" width="700" height="400">
        </div>
    </div>


<div class="row mb-3">
    <div class="col-md-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="" required>
    </div>

    <div class="col-md-3">
        <label for="imagen" class="form-label">Imagen (jpg,jpeg,png,webp)</label>
        <input type="file" name="imagen" id="imagen" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="responsable" class="form-label">Responsable *</label>
        <input type="text" name="responsable" id="responsable" class="form-control" value="" required>
    </div>
    <div class="col-md-3">
        <label for="propietaria" class="form-label"> Propietario(a) *</label>
        <input type="text" name="propietaria" id="propietaria" class="form-control" value="" required>
    </div>
</div>

<div class="row mb-2">
    <div class="col-md-4">
        <label for="tipo_predios_id" class="form-label">Tipo de Predio</label>
        <select name="tipo_predios_id" id="tipo_predios_id"  class="form-select" required>
            <option value="" selected disabled> Selecciona una opción </option>
            <?php $__currentLoopData = $tpPredio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $predio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($predio->id); ?>"><?php echo e($predio->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="superficie" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie" id="superficie" class="form-control" value="">
    </div>
    <div class="col-md-4">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="">
    </div>
</div>
<hr>
<div class="row mb-2">
    <div class="col-md-12">
        <label for="reponsable" class="form-label">Define los vientos</label>
    </div>
    <div class="col-md-3">
        <input type="text" id="viento1" name="viento1" class="form-control" placeholder="Ejemplo: Norte" value="" required>
    </div>
    <div class="col-md-3">        
        <input type="text" id="viento2" name="viento2" class="form-control" placeholder="Ejemplo: Sur" value="" required>
    </div>
    <div class="col-md-3">
        <input type="text" id="viento3" name="viento3" class="form-control" placeholder="Ejemplo: Oriente" value="" required>
    </div>
    <div class="col-md-3">        
        <input type="text" id="viento4" name="viento4" class="form-control" placeholder="Ejemplo: Poniente" value="" required>
    </div>
</div>
<hr>


<div class="text-end m-1">
    <button type="button" id="btn-agregar-manzana-btn" class="btn btn-sm btn-primary btn-small waves-effect waves-light btn-agregar-manzana-btn">
        + Manzana
    </button>
</div>

<div class="row mb-1">
    <div id="contenedor-lotes"></div>
</div>


<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea name="observaciones" id="observaciones" class="form-control" rows="3"></textarea>
</div>

<div> <input type="hidden" name="id" id="fracc_id" value=""></div>


<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamientos/formulario/fraccionamiento.blade.php ENDPATH**/ ?>