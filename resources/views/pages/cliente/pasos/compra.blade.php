 <h3> Datos de Compra </h3>
<section>
    
    <div class="row col-md-12">
        <div class="col-md-3 mb-4">
            <label for="num_solicitud"> Núm. de Solicitud </label>
            <input type="text" step="0.01" name="num_solicitud" class="form-control form-control-sm" style="text-transform: uppercase;">
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
                @foreach ($fraccionamientos as $fracci)
                    <option value="{{ $fracci->id }}">- {{ $fracci->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row col-md-12 text-center">
        <div class="m-1" id="b_add_lote">
            <button type="button" id="btn_add_compra" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                Agregar Comnpra
            </button>
        </div>
    </div>

    <div class="row mb-1">
        <div id="contenedor-compra"></div>
    </div>

    <div class="row mb-1">
         <div class="row col-md-12 mb-3 lote-item">
            <div class="col-md-3 mb-4">
                <label>Superficie Total (m2)</label>
                <input type="text" step="0.01" name="superficiel_venta" class="form-control form-control-sm">
            </div>
            <div class="col-md-3 mb-4">
                <label>Total de Venta</label>
                <input type="text" step="0.01" name="total_venta" id="total_venta" class="form-control form-control-sm">
                
            </div>
            <div class="col-md-3 mb-4">
                <label>Enganche 10%</label>
                <input type="text" step="0.01" name="enganche" class="form-control form-control-sm">
            </div>
           
            <div class="col-md-3 mb-4">
                <label>Menualidades</label>
                <select class="form-select form-select-sm" name="mensualidad" required>
                    <option value="" selected disabled>Selecciona una opción</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label>Total Mensualidad</label>
                <input type="text" step="0.01" name="total_mensualidad" class="form-control form-control-sm">
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div id="contenedor-tablas"></div>
    </div>

</section>