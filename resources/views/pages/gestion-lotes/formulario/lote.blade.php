 <div class="row g-3">

    <div class="col-md-4">
        <label for="frente_m" class="form-label">Frente (m)</label>
        <input type="number" step="0.01" name="frente_m" id="frente_m{{$lote->id ?? ''}}" class="form-control"  value="{{ isset($lote)? $lote->frente_m : ''}}" required>
    </div>

    <div class="col-md-4">
        <label for="fondo_m" class="form-label">Fondo (m)</label>
        <input type="number" step="0.01" name="fondo_m" id="fondo_m{{$lote->id ?? ''}}" class="form-control" value="{{ isset($lote)? $lote->fondo_m : ''}}" required>
    </div>
    @if (isset($lote))
        <div class="col-md-4">
            <label for="superficie_m2" class="form-label">Superficie (m²)</label>
            <input type="number" step="0.01" name="superficie_m2" id="superficie_m2{{ $lote->id ?? ''}}" value="{{ isset($lote)? $lote->superficie_m2 : ''}}" class="form-control" {{ isset($lote) ? 'readonly' : '' }}>
        </div>        
    @endif

    <div class="col-md-6">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado{{ $lote->id ?? '' }}" value="{{ isset($lote)? $lote->precio_contado : ''}}" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito{{ $lote->id ?? '' }}" value="{{ isset($lote)? $lote->precio_credito : ''}}" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="plano" class="form-label">Plano (Archivo)</label>
        <input type="file" name="plano" id="plano{{$lote->id ?? ''}}" value="{{ isset($lote)? $lote->plano : null}}" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="manzana_id" class="form-label">Manzana</label>
        <select name="manzana_id" id="manzana_id{{ $lote->id ?? '' }}" class="form-select" required>
            <option value="" selected disabled>Selecciona una manzana</option>
            @foreach($fracc->manzanas as $manzana)
                <option value="{{ $manzana->id }}"
                    {{ isset($lote) && $lote->manzana_id == $manzana->id ? 'selected' : '' }}>
                    Manzana {{ $manzana->num_lotes }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="cat_estatus_id" class="form-label">Estatus</label>
        <select name="cat_estatus_id" id="cat_estatus_id{{ $lote->id ?? '' }}" class="form-select" required>
            <option value="" selected disabled>Selecciona un estatus</option>
            @foreach($estatus as $estatusItem)
                <option value="{{ $estatusItem->id }}"
                    {{ isset($lote) && $lote->cat_estatus_id == $estatusItem->id ? 'selected' : '' }}>
                    {{ $estatusItem->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones{{ $lote->id ?? '' }}" rows="3" class="form-control"></textarea>
    </div>
</div>