 <div class="row g-3">

    @if(isset($lote) && !empty($lote->plano) )
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <img src="{{ asset('storage/' . $lote->plano) }}" alt="Imagen del lote" width="300px">
                <p>{{ (isset($lote) && $lote->plano !== ' ') ? $lote->plano : '' }}</p>
            </div>
        </div>
    @endif
     <div class="col-md-10">
        <label for="medidas_m" class="form-label">Medidas (m)</label>
        <input type="text" step="0.01" name="medidas_m" id="medidas_m{{$lote->id ?? ''}}" class="form-control"  value="{{ isset($lote)? $lote->medidas_m : ''}}" required>
    </div>
     <div class="col-md-2">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2{{ $lote->id ?? ''}}" value="{{ isset($lote)? $lote->superficie_m2 : ''}}" class="form-control" {{ isset($lote) ? 'readonly' : '' }}>
    </div>  

    <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" step="0.01" name="num_lote" id="num_lote{{$lote->id ?? ''}}" class="form-control"  value="{{ isset($lote)? $lote->num_lote : ''}}" required>
    </div>
    

    <!-- <div class="col-md-4">
        <label for="frente_m" class="form-label">Frente (m)</label>
        <input type="number" step="0.01" name="frente_m" id="frente_m{{$lote->id ?? ''}}" class="form-control"  value="{{ isset($lote)? $lote->frente_m : ''}}" required>
    </div>

    <div class="col-md-4">
        <label for="fondo_m" class="form-label">Fondo (m)</label>
        <input type="number" step="0.01" name="fondo_m" id="fondo_m{{$lote->id ?? ''}}" class="form-control" value="{{ isset($lote)? $lote->fondo_m : ''}}" required>
    </div> -->
    
         
    

    <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <input type="number" step="0.01" name="precio_contado" id="precio_contado{{ $lote->id ?? '' }}" value="{{ isset($lote)? $lote->precio_contado : ''}}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Crédito</label>
        <input type="number" step="0.01" name="precio_credito" id="precio_credito{{ $lote->id ?? '' }}" value="{{ isset($lote)? $lote->precio_credito : ''}}" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="plano" class="form-label">Plano (Archivo)</label>
        <input type="file" name="plano" id="plano{{$lote->id ?? ''}}" value= class="form-control">
    </div>

    <!-- <div class="col-md-4">
        <label for="manzana_id" class="form-label">Manzana</label>
        <select name="manzana_id" id="manzana_id{{ $lote->id ?? '' }}" class="form-select" required>
            @foreach($fracc->manzanas as $manzana)
                <option value="{{ $manzana->id }}"
                    {{ isset($lote) && $lote->manzana_id == $manzana->id ? 'selected' : '' }}>
                    Manzana {{ $manzana->num_manzana }}
                </option>
            @endforeach
        </select>
    </div> -->

    <!-- <div class="col-md-4">
        <label for="cat_estatus_id" class="form-label">Estatus</label>
        <select name="cat_estatus_id" id="cat_estatus_id{{ $lote->id ?? '' }}" class="form-select" required>
            @foreach($estatus as $estatusItem)
                <option value="{{ $estatusItem->id }}"
                    {{ isset($lote) && $lote->cat_estatus_id == $estatusItem->id ? 'selected' : '' }}>
                    {{ $estatusItem->nombre }}
                </option>
            @endforeach
        </select>
    </div> -->
    <div class="col-md-4">
        <label for="cat_estatus_disponibilidad_id" class="form-label">Estatus Disponibilidad</label>
        <select name="cat_estatus_disponibilidad_id" id="cat_estatus_disponibilidad_id{{ $lote->id ?? '' }}" class="form-select" required>
            @foreach($estatusDisponibilidad as $estatusItemDispo)
                <option value="{{ $estatusItemDispo->id }}"
                    {{ isset($lote) && $lote->cat_estatus_id == $estatusItemDispo->id ? 'selected' : '' }}>
                    {{ $estatusItemDispo->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana{{ $lote->id ?? '' }}" class="form-select" required>
            <option value="1">Manazna 1</option>
            <option value="2">Manazna 2</option>
            <option value="3">Manazna 3</option>
            <option value="2">Manazna 4</option>
            <option value="3">Manazna 5</option>
        </select>
    </div>
    <!-- <div class="col-md-6">
        <label for="user_corredor_id" class="form-label">Corredor(*)</label>
        <select name="user_corredor_id" id="user_corredor_id{{ $lote->id ?? '' }}" class="form-select" required>
            @foreach($corredores as $corredor)
                <option value="{{ $corredor->id }}"
                    {{ isset($lote) && $lote->user_corredor_id == $corredor->id ? 'selected' : '' }}>
                    {{ $corredor->nombre_completo }}
                </option>
            @endforeach
        </select>
    </div> -->


    <div class="col-md-4">
        <label class="form-label">Colinda Norte</label>
        <input type="text" name="colinda_norte" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Colinda Sur</label>
        <input type="text" name="colinda_sur" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Colinda Este</label>
        <input type="text" name="colinda_este" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Colinda Oeste</label>
        <input type="text" name="colinda_oeste" class="form-control">
    </div>

    
    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones{{ $lote->id ?? '' }}" rows="3" class="form-control">{{ $lote->observaciones ?? '' }}</textarea>
    </div>
</div>