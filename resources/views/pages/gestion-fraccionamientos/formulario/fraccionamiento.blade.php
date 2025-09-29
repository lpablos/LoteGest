@if(isset($fracc) && !empty($fracc->imagen) )
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="{{ asset('storage/' . $fracc->imagen) }}" alt="Imagen del fraccionamiento" width="700" height="400">
            <p>{{ (isset($fracc) && $fracc->nombre !== ' ') ? $fracc->nombre : '' }}</p>
        </div>
    </div>
@endif

<div class="row mb-3">
    <div class="col-md-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" name="nombre" id="nombre{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->nombre:''}}" required>
    </div>

    <div class="col-md-3">
        <label for="imagen" class="form-label">Imagen (jpg,jpeg,png,webp)</label>
        <input type="file" name="imagen" id="imagen{{isset($fracc)? $fracc->id:''}}" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="reponsable" class="form-label">Responsable *</label>
        <input type="text" name="reponsable" id="reponsable{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->reponsable:''}}" required>
    </div>
    <div class="col-md-3">
        <label for="propietaria" class="form-label"> Propietario(a) *</label>
        <input type="text" name="propietaria" id="propietaria{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->propietaria:''}}" required>
    </div>
</div>

<div class="row mb-2">
    <div class="col-md-4">
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
    <div class="col-md-4">
        <label for="superficie" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie" id="superficie{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->superficie:''}}">
    </div>
    <div class="col-md-4">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion{{isset($fracc)? $fracc->id:''}}" class="form-control" value="{{isset($fracc)? $fracc->ubicacion:''}}">
    </div>
</div>
<hr>
<div class="row mb-2">
    <div class="col-md-12">
        <label for="reponsable" class="form-label">Define los vientos</label>
    </div>
    <div class="col-md-3">
        <input type="text" name="viento1" class="form-control" value="Norte" value="{{isset($fracc)? $fracc->viento1:''}}" required>
    </div>

    <div class="col-md-3">        
        <input type="text" name="viento2" class="form-control" value="Sur" value="{{isset($fracc)? $fracc->viento2:''}}" required>
    </div>
    <div class="col-md-3">
        <input type="text" name="viento3" class="form-control" value="Oriente" value="{{isset($fracc)? $fracc->viento2:''}}" required>
    </div>
    <div class="col-md-3">        
        <input type="text" name="viento4" class="form-control" value="Poniente" value="{{isset($fracc)? $fracc->viento3:''}}" required>
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
    <textarea name="observaciones" id="observaciones{{isset($fracc)? $fracc->id:''}}" class="form-control" rows="3"> {{isset($fracc)? $fracc->observaciones:''}} </textarea>
</div>



<script>
    let contadorManzanas = 0; // lleva la cuenta de cuántas manzanas se han agregado

    document.getElementById('btn-agregar-manzana-btn').addEventListener('click', function () {
        let contenedor = document.getElementById('contenedor-lotes');
        let bloque = `
        <div class="row mb-3 border border-secondary rounded p-2 align-items-end" id="manzana-${contadorManzanas}">
            <div class="col-md-2">
                <label class="form-label">No. Lotes</label>
                <input type="number" name="manzana[${contadorManzanas}][nLote]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Precio Contado</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" name="manzana[${contadorManzanas}][precio_contado]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">Precio Crédito</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" name="manzana[${contadorManzanas}][precio_credito]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">Enganche</label>
                <select name="manzana[${contadorManzanas}][enganche]" class="form-select" required>
                    <option value="">Seleccione...</option>
                    <option value="10">10%</option>
                    <option value="15">15%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                </select>
            </div>
            <div class="col-md-3">
                <div>
                    <label class="form-label">Mensualidades</label>
                    <select name="manzana[${contadorManzanas}][mensualidades]" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="6">6 meses</option>
                        <option value="12">12 meses</option>
                        <option value="18">18 meses</option>
                        <option value="24">24 meses</option>
                        <option value="30">30 meses</option>
                        <option value="36">36 meses</option>
                    </select>
                </div>
              
            </div>
            <div class="col-md-1">
                <div class="m-2">
                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarManzana(${contadorManzanas})">
                        ❌
                    </button>
                </div>
            </div>
        </div>`;

        contenedor.insertAdjacentHTML('beforeend', bloque);

        contadorManzanas++; // aumentar el índice para la siguiente
    });

    // Función para eliminar un bloque específico
    function eliminarManzana(id) {
        let bloque = document.getElementById(`manzana-${id}`);
        if (bloque) {
            bloque.remove();
        }
    }
</script>
