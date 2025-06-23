@php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
@endphp

<div class="row g-3">
    <div>
        <div>
            <div>
                <input type="hidden" name="fraccionamiento_id" value="{{$fracc->id}}" required>
            </div>
        </div>
    </div>

    {{--  @if(isset($lote) && !empty($lote->plano))
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <img src="{{ asset('storage/' . $lote->plano) }}" alt="Imagen del lote" width="100px" height="150">
            </div>
        </div>
    @endif  --}}

    <div class="col-md-10">
        <label for="medidas_m" class="form-label">Medidas (m)</label>
        <input type="text" step="0.01" name="medidas_m" id="medidas_m{{$lote->id ?? ''}}" class="form-control" value="{{ $lote->medidas_m ?? '' }}" required {{ $readonly }}>
    </div>

    <div class="col-md-2">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2{{ $lote->id ?? '' }}" value="{{ $lote->superficie_m2 ?? '' }}" class="form-control" {{ $readonly }}>
    </div>  

    <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" step="0.01" name="num_lote" id="num_lote{{$lote->id ?? ''}}" class="form-control" value="{{ $lote->num_lote ?? '' }}" required {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado{{ $lote->id ?? '' }}" value="{{ $lote->precio_contado ?? '' }}" class="form-control" required {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito{{ $lote->id ?? '' }}" value="{{ $lote->precio_credito ?? '' }}" class="form-control" required {{ $readonly }}>
    </div>

    {{--  <div class="col-md-4">
        <label for="plano" class="form-label">Plano (jpg,jpeg,png,webp)</label>
        <input type="file" name="plano" id="plano{{$lote->id ?? ''}}" class="form-control" {{ $disabled }}>
    </div>  --}}

    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana{{ $lote->id ?? '' }}" class="form-select" required {{ $disabled }}>
            @foreach (range(1, $fracc->manzanas) as $i)
                <option value="{{ $i }}" {{ (isset($lote) && $lote->manzana == $i) ? 'selected' : '' }}>Manzana {{ $i }}</option>
            @endforeach
        </select>
    </div>   

    <div class="col-md-4">
        <label class="form-label">Colinda Norte</label>
        <input type="text" name="colinda_norte" value="{{ $lote->colinda_norte ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Sur</label>
        <input type="text" name="colinda_sur" value="{{ $lote->colinda_sur ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Este</label>
        <input type="text" name="colinda_este" value="{{ $lote->colinda_este ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Oeste</label>
        <input type="text" name="colinda_oeste" value="{{ $lote->colinda_oeste ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones{{ $lote->id ?? '' }}" rows="3" class="form-control" {{ $readonly }}>{{ $lote->observaciones ?? '' }}</textarea>
    </div>
</div>


