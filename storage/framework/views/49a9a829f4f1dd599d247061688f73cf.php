<?php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
?>

<div class="row g-3">
    <div>
        <div>
            <div>
                <input type="hidden" name="fraccionamiento_id" value="<?php echo e($fracc->id); ?>" required>
            </div>
        </div>
    </div>

    

    <div class="col-md-10">
        <label for="medidas_m" class="form-label">Medidas (m)</label>
        <input type="text" step="0.01" name="medidas_m" id="medidas_m<?php echo e($lote->id ?? ''); ?>" class="form-control" value="<?php echo e($lote->medidas_m ?? ''); ?>" required <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-2">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2<?php echo e($lote->id ?? ''); ?>" value="<?php echo e($lote->superficie_m2 ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>  

    <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" step="0.01" name="num_lote" id="num_lote<?php echo e($lote->id ?? ''); ?>" class="form-control" value="<?php echo e($lote->num_lote ?? ''); ?>" required <?php echo e($readonly); ?>>
    </div>

  
    <div class="col-md-4 mb-4">
        <label for="precio_contado">Precio Contado</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="precioContadoPrepend">$</span>
            </div>
            <input type="text" step="0.01" name="precio_contado" id="precio_contado<?php echo e($lote->id ?? ''); ?>"
                class="form-control precio-input"
                placeholder="0.00"
                value="<?php echo e(isset($lote->precio_contado) ? number_format($lote->precio_contado, 2) : ''); ?>"
                aria-describedby="precioContadoPrepend">
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <label for="precio_credito">Precio Crédito</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="precioCreditoPrepend">$</span>
            </div>
            <input type="text" step="0.01" name="precio_credito" id="precio_credito<?php echo e($lote->id ?? ''); ?>"
                class="form-control precio-input"
                placeholder="0.00"
                value="<?php echo e(isset($lote->precio_credito) ? number_format($lote->precio_credito, 2) : ''); ?>"
                aria-describedby="precioCreditoPrepend">
        </div>
    </div>

    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana<?php echo e($lote->id ?? ''); ?>" class="form-select" required <?php echo e($disabled); ?>>
            <?php $__currentLoopData = range(1, $fracc->manzanas); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($i); ?>" <?php echo e((isset($lote) && $lote->manzana == $i) ? 'selected' : ''); ?>>Manzana <?php echo e($i); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>   

    <div class="col-md-4">
        <label class="form-label">Colinda Norte</label>
        <input type="text" name="colinda_norte" value="<?php echo e($lote->colinda_norte ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Sur</label>
        <input type="text" name="colinda_sur" value="<?php echo e($lote->colinda_sur ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Este</label>
        <input type="text" name="colinda_oriente" value="<?php echo e($lote->colinda_oriente ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Oeste</label>
        <input type="text" name="colinda_poniente" value="<?php echo e($lote->colinda_poniente ?? ''); ?>" class="form-control" <?php echo e($readonly); ?>>
    </div>

    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones<?php echo e($lote->id ?? ''); ?>" rows="3" class="form-control" <?php echo e($readonly); ?>><?php echo e($lote->observaciones ?? ''); ?></textarea>
    </div>
</div>

<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.precio-input');

        inputs.forEach(input => {
            // Al escribir
            input.addEventListener('input', function () {
                const cleaned = this.value.replace(/[^0-9.]/g, '');
                if (!cleaned) {
                    this.value = '';
                    return;
                }

                let [entero, decimal] = cleaned.split('.');
                entero = entero.replace(/^0+(?!$)/, ''); // Quitar ceros a la izquierda

                // Formatear con comas
                entero = parseInt(entero || '0').toLocaleString('en-US');

                // Limitar a 2 decimales
                if (decimal !== undefined) {
                    decimal = decimal.substring(0, 2);
                    this.value = `${entero}.${decimal}`;
                } else {
                    this.value = entero;
                }
            });

            // Al salir del input: no hacer nada extra (ya no agregamos $)
            input.addEventListener('blur', function () {
                // Sin formato adicional
            });

            // Al enfocar: opcionalmente limpiar comas si deseas
            input.addEventListener('focus', function () {
                // O puedes dejar las comas para seguir editando
                // this.value = this.value.replace(/,/g, '');
            });
        });

        // Limpiar antes de enviar el formulario
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function () {
                inputs.forEach(input => {
                    input.value = input.value.replace(/[^0-9.]/g, '');
                });
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-lotes/formulario/lote.blade.php ENDPATH**/ ?>