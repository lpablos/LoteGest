<div class="row mb-3 mt-3">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre del Fraccionamiento *</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Fracc. Las Villas" required>
        </div>
        <div class="col-md-6">
            <label for="superficie_m2" class="form-label">Superficie (m²) *</label>
            <input type="number" step="0.01" class="form-control" id="superficie_m2" name="superficie_m2" placeholder="Ej. 15400.50" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="cantidad_lotes" class="form-label">Cantidad de Lotes *</label>
            <input type="number" class="form-control" id="cantidad_lotes" name="cantidad_lotes" value="1" min="1" required>
        </div>
        <div class="col-md-6">
            <label for="uso_predominante" class="form-label">Uso Predominante *</label>
            <select class="form-select" id="uso_predominante" name="uso_predominante" required>
                <option value="">Seleccione uso</option>
                <option value="Habitacional">Habitacional</option>
                <option value="Comercial">Comercial</option>
                <option value="Mixto">Mixto</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="etapa" class="form-label">Etapa</label>
            <input type="text" class="form-control" id="etapa" name="etapa" placeholder="Ej. Etapa 1">
        </div>
        <div class="col-md-6">
            <label class="form-label">Servicios Disponibles</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="servicios_disponibles[]" value="Agua" id="servicioAgua">
                <label class="form-check-label" for="servicioAgua">Agua</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="servicios_disponibles[]" value="Luz" id="servicioLuz">
                <label class="form-check-label" for="servicioLuz">Luz</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="servicios_disponibles[]" value="Drenaje" id="servicioDrenaje">
                <label class="form-check-label" for="servicioDrenaje">Drenaje</label>
            </div>
            <!-- Puedes agregar más opciones si es necesario -->
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Notas o comentarios adicionales..."></textarea>
        </div>
    </div>

   
    <div>
        <div>
            <input type="hidden" name="proyecto" value="<?php echo e($proyecto); ?>">
        </div>
    </div><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/gestion-fraccionamiento/formulario/inputs-fraccionamiento.blade.php ENDPATH**/ ?>