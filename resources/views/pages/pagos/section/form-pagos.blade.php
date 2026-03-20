<form method="POST" 
      action="{{ isset($pago)
            ?route('pagos.update', ['solicitud' => $compra->num_solicitud_sistema, 'pago' => $pago->id])
            :route('pagos.store', ['solicitud' => $compra->num_solicitud_sistema]) 
      }}"
      enctype="multipart/form-data">

@csrf

@isset($pago)
    @method('PUT')
@endisset

<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Fecha Pago</label>
            <input type="date" name="fecha_pago" class="form-control"
                value="{{$pago->fecha_pago ?? date('Y-m-d')}}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Concepto</label>
            <select name="concepto" class="form-select" required>
                <option value="apartado" {{ old('concepto', $pago->concepto ?? '') == 'apartado' ? 'selected' : '' }}>Apartado</option>
                <option value="enganche" {{ old('concepto', $pago->concepto ?? '') == 'enganche' ? 'selected' : '' }}>Enganche</option>
                <option value="mensualidad" {{ old('concepto', $pago->concepto ?? '') == 'mensualidad' ? 'selected' : '' }}>Mensualidad</option>
                <option value="abono" {{ old('concepto', $pago->concepto ?? '') == 'abono' ? 'selected' : '' }}>Abono</option>
                <option value="liquidacion" {{ old('concepto', $pago->concepto ?? '') == 'liquidacion' ? 'selected' : '' }}>Liquidación</option>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Método de Pago</label>
            <select name="metodo_pago" class="form-select" required>
                <option value="efectivo" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="transferencia" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                <option value="deposito" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'deposito' ? 'selected' : '' }}>Depósito</option>
                <option value="cheque" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'cheque' ? 'selected' : '' }}>Cheque</option>
                <option value="tarjeta" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Monto</label>
            <input type="number"
                   value="{{ $compra->pago_mensual_venta ?? $pago->monto }}"
                   step="0.01"
                   name="monto"
                   class="form-control">
        </div>
    </div>

    @if (isset($pago) && $pago->saldo_despues)
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Saldo Pendiente</label>
                
                <input type="number"
                    value="{{ $pago->saldo_despues }}"
                    name="saldo_despues"
                    class="form-control"
                    readonly>
            </div>
        </div>        
    @endif

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Referencia</label>
            <input type="text" name="referencia" class="form-control"
                value="{{ $pago->referencia ?? '' }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Registrado por</label>
            <select name="registrado_por" class="form-select">
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}"
                        {{ session('identy') == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->primer_apellido }} {{ $usuario->segundo_apellido }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            
            <label class="form-label">Comprobantes</label>
          
            <input type="file" 
                name="documentos[]" 
                class="form-control"
                accept="image/png,image/jpeg,image/jpg,application/pdf"
                multiple>
            <small class="text-muted d-block">
                Puedes subir uno o varios documentos (imágenes o PDF)
            </small>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $pago->observaciones ?? '' }}</textarea>
        </div>
    </div>
</div>

<div class="text-end">
    <a href="{{ route('pagos.index', ['solicitud' => $compra->num_solicitud_sistema]) }}"
        class="btn text-muted d-none d-sm-inline-block btn-link">
        <i class="mdi mdi-arrow-left me-1"></i> Cancelar
    </a>

    <button type="submit" class="btn btn-success">
        Guardar Pago
    </button>
</div>

</form>