<div class="row g-3">
     <div class="col-12 text-center mb-2">
        <h5 class="mb-0">Busqueda de cliente</h5>
    </div>
    <div class="col-md-6">
        <label for="clientes" class="form-label">Cliente</label>
        <select name="clientes" id="clientes{{ $lote->id ?? '' }}" class="form-select" required >
            <option value="" selected disabled>Selecciona un cliente</option>
            <option value="1">Juan Carlos Pérez Ramírez</option>
            <option value="2">María Fernanda López Salazar</option>
            <option value="3">Luis Antonio Herrera Gómez</option>
            <option value="4">Ana Sofía Martínez Cruz</option>
            <option value="5">Carlos Eduardo Sánchez León</option>
        </select>
    </div>   
      <div class="col-md-6">
        <label for="clavesAsc" class="form-label">Clave de Compra</label>
        <select name="clavesAsc" id="clientes{{ $lote->id ?? '' }}" class="form-select" required >
            <option value="" selected disabled>Selecciona una clave de compra</option>
            <option value="CL-20250619-130501">CL-20250619-130501</option>
            <option value="CL-20250619-130732">CL-20250619-130732</option>
        </select>
    </div>  
</div>