@php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
@endphp

<input type="hidden" name="fraccionamiento_id" value="{{ $fracc->id }}" required>

<!-- Fila 1 -->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" name="num_lote" id="num_lote{{ $lote->id ?? '' }}"
               class="form-control"
               value="{{ $lote->num_lote ?? '' }}" required readonly>
    </div>
    <div class="col-md-4">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01"
               name="superficie_m2"
               id="superficie_m2{{ $lote->id ?? '' }}"
               value="{{ $lote->superficie_m2 ?? '' }}"
               class="form-control">
    </div>
    <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01"
                   name="precio_contado"
                   id="precio_contado{{ $lote->id ?? '' }}"
                   value="{{ $lote->manzana->precio_contado ?? '' }}"
                   class="form-control" readonly>
        </div>
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01"
                   name="precio_credito"
                   id="precio_credito{{ $lote->id ?? '' }}"
                   value="{{ $lote->manzana->precio_credito ?? '' }}"
                   class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
         <input type="number" step="0.01"
                   name="manzana"
                   id="manzana{{ $lote->id ?? '' }}"
                   value="{{ $lote->manzana->num_manzana  ?? '' }}"
                   class="form-control" readonly>
    </div>
    <div class="col-md-4">
        <label class="form-label">Enganche</label>
        <input type="text" name="enganche"
               value="{{ $lote->manzana->enganche ?? '' }}"
               class="form-control" readonly>
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-4">
        <label class="form-label">Mensualidades</label>
        <input type="text" name="mensualidades"
               value="{{ $lote->manzana->mensualidades ?? '' }}"
               class="form-control" readonly>
    </div>
    <div class="col-md-4">
        <!-- espacio vacío para mantener alineación -->
    </div>
    <div class="col-md-4">
        <!-- espacio vacío -->
    </div>
</div>


<div class="row mb-3">
    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones"
                  id="observaciones{{ $lote->id ?? '' }}"
                  rows="3"
                  class="form-control" {{ $readonly }}>{{ $lote->observaciones ?? '' }}</textarea>
    </div>
</div>
