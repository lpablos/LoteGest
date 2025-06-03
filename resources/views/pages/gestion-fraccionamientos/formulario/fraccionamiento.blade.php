@if(isset($fracc) && !empty($fracc->imagen) )
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="{{ asset('storage/' . $fracc->imagen) }}" alt="Imagen del fraccionamiento" width="700">
            <p>{{ (isset($fracc) && $fracc->imagen !== ' ') ? $fracc->imagen : '' }}</p>
        </div>
    </div>
@endif

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre{{isset($fracc)? $fracc->id:''}}" class="form-control" required value="{{isset($fracc)? $fracc->nombre:''}}">
    </div>

    <div class="col-md-6">
        <label for="imagen" class="form-label">Imagen </label>
        <input type="file" name="imagen" id="imagen{{isset($fracc)? $fracc->id:''}}" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="reponsable" class="form-label">Responsable</label>
        <input type="text" name="reponsable" id="reponsable{{isset($fracc)? $fracc->id:''}}" class="form-control" required value="{{isset($fracc)? $fracc->reponsable:''}}">
    </div>

    <div class="col-md-6">
        <label for="propietaria" class="form-label">Propietaria</label>
        <input type="text" name="propietaria" id="propietaria{{isset($fracc)? $fracc->id:''}}" class="form-control" required value="{{isset($fracc)? $fracc->propietaria:''}}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="predio_urbano" class="form-label">Predio Urbano</label>
        <input type="text" name="predio_urbano" id="predio_urbano{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->predio_urbano:''}}">
    </div>

    <div class="col-md-6">
        <label for="superficie" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie" id="superficie{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->superficie:''}}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->ubicacion:''}}">
    </div>

    <div class="col-md-6">
        <label for="proyecto_id" class="form-label">Proyecto</label>
        <select name="proyecto_id" id="proyecto_id{{isset($fracc)? $fracc->id:''}}" class="form-select">
            @foreach ($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="mb-3">
    <label class="form-label">Manzanas</label>

   @php
        $fraccId = $fracc->id ?? 'nuevo';
        $manzanas = old('manzanas', $fracc->manzanas ?? []);
    @endphp

    <div id="manzanas-container-{{ $fraccId }}">
        @php $index = 0; @endphp
        @foreach(old('manzanas', $fracc->manzanas ?? []) as $manzana)
            <div class="card p-3 mb-3 border rounded position-relative">
                <button type="button" class="btn-close position-absolute end-0 top-0 m-2" onclick="this.parentElement.remove()" aria-label="Eliminar"></button>
                <div class="row">
                    <div class="col-md-2">
                        <label class="form-label"># Manzana</label>
                        <input type="number" name="manzanas[{{ $index }}][num_lotes]" class="form-control" value="{{ $manzana['num_lotes'] ?? '' }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Norte</label>
                        <input type="text" name="manzanas[{{ $index }}][colinda_norte]" class="form-control" value="{{ $manzana['colinda_norte'] ?? '' }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Sur</label>
                        <input type="text" name="manzanas[{{ $index }}][colinda_sur]" class="form-control" value="{{ $manzana['colinda_sur'] ?? '' }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Este</label>
                        <input type="text" name="manzanas[{{ $index }}][colinda_este]" class="form-control" value="{{ $manzana['colinda_este'] ?? '' }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Colinda Oeste</label>
                        <input type="text" name="manzanas[{{ $index }}][colinda_oeste]" class="form-control" value="{{ $manzana['colinda_oeste'] ?? '' }}">
                    </div>
                </div>
            </div>
            @php $index++; @endphp
        @endforeach
    </div>


    <div class="col-12 text-center mt-2">
       <button type="button" class="btn btn-sm btn-primary"
            onclick="agregarManzana('{{ isset($fracc) ? $fracc->id : 'nuevo' }}')">
            Agregar Manzana
        </button>
    </div>
</div>


<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea name="observaciones" id="observaciones{{isset($fracc)? $fracc->id:''}}" class="form-control" rows="3"> {{isset($fracc)? $fracc->observaciones:''}} </textarea>
</div>

@push('scripts')
    <script>
        window.manzanaIndexes = window.manzanaIndexes || {};
        window.manzanaIndexes["{{ $fraccId }}"] = {{ count(old('manzanas', $fracc->manzanas ?? [])) }};
    </script>
@endpush

