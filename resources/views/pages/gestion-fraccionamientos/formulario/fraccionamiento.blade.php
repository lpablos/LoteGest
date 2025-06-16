@if(isset($fracc) && !empty($fracc->imagen) )
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="{{ asset('storage/' . $fracc->imagen) }}" alt="Imagen del fraccionamiento" width="700" height="400">
            <p>{{ (isset($fracc) && $fracc->imagen !== ' ') ? $fracc->imagen : '' }}</p>
        </div>
    </div>
@endif

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" name="nombre" id="nombre{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->nombre:''}}" required>
    </div>

    <div class="col-md-6">
        <label for="imagen" class="form-label">Imagen (jpg,jpeg,png,webp)</label>
        <input type="file" name="imagen" id="imagen{{isset($fracc)? $fracc->id:''}}" class="form-control">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="reponsable" class="form-label">Responsable *</label>
        <input type="text" name="reponsable" id="reponsable{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->reponsable:''}}" required>
    </div>

    <div class="col-md-6">
        <label for="propietaria" class="form-label"> Propietario(a) *</label>
        <input type="text" name="propietaria" id="propietaria{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->propietaria:''}}" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="tipo_predios_id" class="form-label">Tipo de Predio</label>
        <select name="tipo_predios_id" id="tipo_predios_id{{isset($fracc)? $fracc->id:''}}"  class="form-select" required>
            <option value="" selected disabled> Selecciona una opción </option>
            @isset($fracc)
                @php
                    $selectedValue = old('tipo_predios_id', $fracc->tipo_predios_id);
                @endphp
            @else
                @php
                    $selectedValue = old('tipo_predios_id');
                @endphp
            @endisset
            @foreach ($tpPredio as $predio)
                <option value="{{ $predio->id }}"  
                  {{ $selectedValue == $predio->id ? 'selected' : '' }}                
                >{{ $predio->nombre }}</option>
            @endforeach
        </select>
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
        <label for="manzanas" class="form-label">Manzanas *</label>
        <input type="number" name="manzanas" min="1" id="manzanas{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->manzanas:1}}" required>
    </div>

</div>

<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea name="observaciones" id="observaciones{{isset($fracc)? $fracc->id:''}}" class="form-control" rows="3"> {{isset($fracc)? $fracc->observaciones:''}} </textarea>
</div>