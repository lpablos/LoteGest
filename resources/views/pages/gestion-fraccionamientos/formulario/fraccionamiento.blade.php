
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <img src="" alt="Imagen del fraccionamiento" id="imgFracc" width="700" height="400" style="display:none;">
        </div>
    </div>


<div class="row mb-3">
    <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre (*)</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label for="imagen" class="form-label">Imagen (jpg,jpeg,png,webp)</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
    </div>
    <div class="col-md-4">
        <label for="responsable" class="form-label">Responsable (*)</label>
        <input type="text" name="responsable" id="responsable" class="form-control" required>
    </div>
    <div class="col-md-4 mt-4">
        <label for="propietaria" class="form-label"> Propietario(a) *</label>
        <input type="text" name="propietaria" id="propietaria" class="form-control" required>
    </div>
    <div class="col-md-4 mt-4">
        <label for="tipo_predios_id" class="form-label">Tipo de Predio (*)</label>
        <select name="tipo_predios_id" id="tipo_predios_id"  class="form-select" required style="cursor: pointer;">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($tpPredio as $predio)
                <option value="{{ $predio->id }}">{{ $predio->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mt-4">
        <label for="superficie" class="form-label"> Superficie (m²)(*) </label>
        <input type="number" step="0.01" name="superficie" id="superficie" class="form-control" value="" required>
    </div>
    <div class="col-md-4 mt-4">
        <label for="entidad_fed_id" class="form-label">Estado (*)</label>
        <select name="entidad_fed_id" id="entidad_fed_id"  class="form-select" required style="cursor: pointer;">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($catEntidades as $entidad)
                <option value="{{ $entidad->id }}" {{ $entidad->id == 16 ? 'selected' : '' }}>{{ $entidad->nom_estado }}</option>
            @endforeach
        </select>
    </div>
     <div class="col-md-4 mt-4">
        <label for="municipio_id" class="form-label"> Municipio (*)</label>
        <select name="municipio_id" id="municipio_id"  class="form-select" required style="cursor: pointer;">
            <option value="" selected disabled> Selecciona una opción </option>
            @foreach ($catMunicipios as $municipio)
                <option value="{{ $municipio->id }}">{{ $municipio->nom_mpio }}</option>
            @endforeach
        </select>
    </div>
    <!--<div class="col-md-4 mt-4">
        <label for="imagenAdicional" class="form-label"> Imagen Adicional (jpg,jpeg,png,webp)</label>
        <input type="file" name="imagenAdicional" id="imagenAdicional" class="form-control" accept="image/*">
    </div>-->
    <div class="col-md-12 mt-4">
        <label for="ubicacion" class="form-label"> Ubicación (*)</label>
        <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="" required>
    </div>
    <div class="col-md-12 mt-4">
        <label for="datos_propiedad" class="form-label"> Datos de la Propiedad (*)</label>
        <input type="text" name="datos_propiedad" id="datos_propiedad" class="form-control" required>
    </div>
</div>

<hr>
<div class="row mb-2">
    <div class="col-md-12">
        <label for="reponsable" class="form-label">Define los vientos (*)</label>
    </div>
    <div class="col-md-3">
        <input type="text" id="viento1" name="viento1" class="form-control" placeholder="Ejemplo: Norte" value="" required>
    </div>
    <div class="col-md-3">        
        <input type="text" id="viento2" name="viento2" class="form-control" placeholder="Ejemplo: Sur" value="" required>
    </div>
    <div class="col-md-3">
        <input type="text" id="viento3" name="viento3" class="form-control" placeholder="Ejemplo: Oriente" value="" required>
    </div>
    <div class="col-md-3">        
        <input type="text" id="viento4" name="viento4" class="form-control" placeholder="Ejemplo: Poniente" value="" required>
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
    <textarea name="observaciones" id="observaciones" class="form-control" rows="3"></textarea>
</div>

<div> <input type="hidden" name="id" id="fracc_id" value=""></div>


