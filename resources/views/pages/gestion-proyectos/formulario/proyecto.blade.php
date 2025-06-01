<div class="row mb-3">
    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre del Proyecto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="col-md-6">
        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="responsable_proyecto" class="form-label">Responsable del Proyecto</label>
        <input type="text" class="form-control" id="responsable_proyecto" name="responsable_proyecto">
    </div>

    <div class="col-md-6">
        <label for="clave" class="form-label">Clave del Proyecto</label>
        <input type="text" class="form-control" id="clave" name="clave" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="estatus_proyecto_id" class="form-label">Estatus del Proyecto</label>
        <select class="form-select" id="estatus_proyecto_id" name="estatus_proyecto_id" required>
            <option value="">-- Selecciona --</option>
            @foreach($estatus as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
</div>
