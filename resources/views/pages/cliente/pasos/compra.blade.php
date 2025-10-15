 <h3> Datos de Compra </h3>
<section>
    <form>
        <div class="row col-md-12">
            <div class="col-md-3 mb-4">
                <label for="num_solicitud"> Núm. de Solicitud </label>
                <input type="text" step="0.01" name="num_solicitud" class="form-control form-control-sm">
            </div>
            <div class="col-md-3 mb-4">
                <label for="corredor"> Corredor </label>
                <select class="form-select form-select-sm" id="corredor" name="corredor" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    @foreach ($corredores as $corredor)
                        <option value="{{ $corredor->id }}">- {{ $corredor->full_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3 mb-4">
                <label for="entidad_id"> Estado </label>
                <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" @if ($estado->id == 16) selected @endif >- {{ $estado->nom_estado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="mpio_id"> Municipio </label>
                <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    @foreach ($mpios as $mpio)
                        <option value="{{ $mpio->id }}">- {{ $mpio->nom_mpio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="fracc_id"> Fraccionamiento </label>
                <select class="form-select form-select-sm" id="fracc_id" name="fracc_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    @foreach ($fraccionamientos as $fraccionamiento)
                        <option value="{{ $fraccionamiento->id }}">- {{ $fraccionamiento->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="tp_compra_id"> Tipo de compra </label>
                <select class="form-select form-select-sm" id="tp_compra_id" name="tp_compra_id" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <option value="1"> Individual </option>
                    <option value="2"> Grupal </option>
                    <option value="3"> Mixto </option>
                </select>
            </div>
            <hr>
            <div class="col-md-3 mb-4">
                <label for="superficie"> Superficie Total </label>
                <input type="text" name="superficie" class="form-control form-control-sm" readOnly>
            </div>
            <div class="col-md-3 mb-4">
                <label for="enganche"> Enganche </label>
                <select class="form-select form-select-sm" id="enganche" name="enganche" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <option value="1"> 10% </option>
                    <option value="2"> 15%</option>
                    <option value="3"> 20%</option>
                    <option value="4"> 30%</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="mensualidades"> Mensualidades </label>
                <select class="form-select form-select-sm" id="mensualidades" name="mensualidades" style="cursor: pointer;" required>
                    <option value="" selected disabled> Selecciona una opción </option>
                    <option value="1"> 6 Meses </option>
                    <option value="2"> 12 Meses </option>
                    <option value="3"> 18 Meses </option>
                    <option value="4"> 24 Meses  </option>
                    <option value="5"> 30 Meses </option>
                    <option value="6"> 36 Meses </option>
                </select>
            </div>
            <hr>
            <div class="text-end m-1" id="b_add_lote">
                <button type="button" id="btn_add_lote" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                    + Lote
                </button>
            </div>
            <div class="row mb-1">
                <div id="contenedor-lotes"></div>
            </div>
            <hr>
            <div class="text-end m-1">
                <button type="button" id="btn_add_medidas" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                    + Medias y colindancias
                </button>
            </div>
            <div class="row mb-1">
                <div id="contenedor-medidas"></div>
            </div>
            <hr>
        </div>
    </form>
</section>