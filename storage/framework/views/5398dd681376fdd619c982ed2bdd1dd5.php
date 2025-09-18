<?php if(isset($fracc) && !empty($fracc->imagen) ): ?>
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="<?php echo e(asset('storage/' . $fracc->imagen)); ?>" alt="Imagen del fraccionamiento" width="700" height="400">
            <p><?php echo e((isset($fracc) && $fracc->nombre !== ' ') ? $fracc->nombre : ''); ?></p>
        </div>
    </div>
<?php endif; ?>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" name="nombre" id="nombre<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->nombre:''); ?>" required>
    </div>

    <div class="col-md-6">
        <label for="imagen" class="form-label">Imagen (jpg,jpeg,png,webp)</label>
        <input type="file" name="imagen" id="imagen<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="reponsable" class="form-label">Responsable *</label>
        <input type="text" name="reponsable" id="reponsable<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->reponsable:''); ?>" required>
    </div>

    <div class="col-md-6">
        <label for="propietaria" class="form-label"> Propietario(a) *</label>
        <input type="text" name="propietaria" id="propietaria<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->propietaria:''); ?>" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="tipo_predios_id" class="form-label">Tipo de Predio</label>
        <select name="tipo_predios_id" id="tipo_predios_id<?php echo e(isset($fracc)? $fracc->id:''); ?>"  class="form-select" required>
            <option value="" selected disabled> Selecciona una opción </option>
            <?php if(isset($fracc)): ?>
                <?php
                    $selectedValue = old('tipo_predios_id', $fracc->tipo_predios_id);
                ?>
            <?php else: ?>
                <?php
                    $selectedValue = old('tipo_predios_id');
                ?>
            <?php endif; ?>
            <?php $__currentLoopData = $tpPredio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $predio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($predio->id); ?>"  
                  <?php echo e($selectedValue == $predio->id ? 'selected' : ''); ?>                
                ><?php echo e($predio->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="superficie" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie" id="superficie<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->superficie:''); ?>">
    </div>
</div>
<hr>
<div class="row mb-3">
    <div class="col-md-12">
        <label for="reponsable" class="form-label">Define los vientos</label>
    </div>
    <div class="col-md-3">
        <input type="text" name="viento1" class="form-control" value="Norte" required>
    </div>

    <div class="col-md-3">        
        <input type="text" name="viento2" class="form-control" value="Sur" required>
    </div>
    <div class="col-md-3">
        <input type="text" name="viento3" class="form-control" value="Oriente" required>
    </div>
    <div class="col-md-3">        
        <input type="text" name="viento4" class="form-control" value="Poniente" required>
    </div>
</div>
<hr>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->ubicacion:''); ?>">
    </div>

     <div class="col-md-6">
        <label for="manzanas" class="form-label">Manzanas *</label>
        <input type="number" min="1" name="manzanas" min="1" id="manzanas<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" value="<?php echo e(isset($fracc)? $fracc->manzanas:0); ?>" required>
    </div>
</div>

<div id="contenedor-lotes"></div>

<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea name="observaciones" id="observaciones<?php echo e(isset($fracc)? $fracc->id:''); ?>" class="form-control" rows="3"> <?php echo e(isset($fracc)? $fracc->observaciones:''); ?> </textarea>
</div>


<script>
    document.getElementById('manzanas').addEventListener('input', function () {
        let cantidad = parseInt(this.value) || 0; // número ingresado
        let contenedor = document.getElementById('contenedor-lotes');
        contenedor.innerHTML = ""; // limpiar antes de regenerar

        for (let i = 0; i < cantidad; i++) {
            let bloque = `
            <div class="row mb-3 border border-secondary rounded p-2">
                <div class="col-md-2">
                    <label class="form-label">Manzana</label>
                    <input type="number" name="manzana[${i}][manzana]" class="form-control" value="${i+1}" readonly>
                </div>
                <div class="col-md-2">
                    <label class="form-label">No. Lotes</label>
                    <input type="number" name="manzana[${i}][nLote]" class="form-control" value="" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Precio Contado</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="manzana[${i}][precio_contado]" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Precio Crédito</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" name="manzana[${i}][precio_credito]" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Enganche</label>
                    <select name="manzana[${i}][enganche]" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Mensualidades</label>
                    <select name="manzana[${i}][mensualidades]" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="6">6 meses</option>
                        <option value="12">12 meses</option>
                        <option value="18">18 meses</option>
                        <option value="24">24 meses</option>
                        <option value="30">30 meses</option>
                        <option value="36">36 meses</option>
                    </select>
                </div>
            </div>`;
            
            contenedor.insertAdjacentHTML('beforeend', bloque);
        }
    });
</script>
<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamientos/formulario/fraccionamiento.blade.php ENDPATH**/ ?>