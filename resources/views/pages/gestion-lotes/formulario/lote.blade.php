@php
    $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
    $disabled = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'disabled' : '';
@endphp

<div class="row g-3">
    <div>
        <div>
            <div>
                <input type="hidden" name="fraccionamiento_id" value="{{$fracc->id}}" required>
            </div>
        </div>
    </div>

    {{--  @if(isset($lote) && !empty($lote->plano))
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <img src="{{ asset('storage/' . $lote->plano) }}" alt="Imagen del lote" width="100px" height="150">
            </div>
        </div>
    @endif  --}}

    <!-- <div class="col-md-10">
        <label for="medidas_m" class="form-label">Medidas (m)</label>
        <input type="text" step="0.01" name="medidas_m" id="medidas_m{{$lote->id ?? ''}}" class="form-control" value="{{ $lote->medidas_m ?? '' }}" required {{ $readonly }}>
    </div> -->
     <div class="col-md-4">
        <label for="num_lote" class="form-label"># Lote</label>
        <input type="number" step="0.01" name="num_lote" id="num_lote{{$lote->id ?? ''}}" class="form-control" value="{{ $lote->num_lote ?? '' }}" required readonly>
    </div>
    <div class="col-md-4">
        <label for="superficie_m2" class="form-label">Superficie (m²)</label>
        <input type="number" step="0.01" name="superficie_m2" id="superficie_m2{{ $lote->id ?? '' }}" value="{{ $lote->superficie_m2 ?? '' }}" class="form-control" >
    </div>  

    <div class="col-md-4">
        <label for="precio_contado" class="form-label">Precio Contado</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01" 
                name="precio_contado" 
                id="precio_contado{{ $lote->id ?? '' }}" 
                value="{{ $lote->precio_contado ?? '' }}" 
                class="form-control" 
                readonly>
        </div>

        <!-- <input type="number" step="0.01" name="precio_contado" id="precio_contado{{ $lote->id ?? '' }}" value="{{ $lote->precio_contado ?? '' }}" class="form-control" readonly> -->
    </div>  
    <div class="col-md-4">
        <label for="precio_credito" class="form-label">Precio Credito</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01" 
                name="precio_credito" 
                id="precio_credito{{ $lote->id ?? '' }}" 
                value="{{ $lote->precio_credito ?? '' }}" 
                class="form-control" 
                readonly>
        </div>

        <!-- <input type="number" step="0.01" name="precio_credito" id="precio_credito{{ $lote->id ?? '' }}" value="{{ $lote->precio_credito ?? '' }}" class="form-control" readonly> -->
    </div>  

   

  
    <!-- <div class="col-md-4 mb-4">
        <label for="precio_contado">Precio Contado</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="precioContadoPrepend">$</span>
            </div>
            <input type="text" step="0.01" name="precio_contado" id="precio_contado{{ $lote->id ?? '' }}"
                class="form-control precio-input"
                placeholder="0.00"
                value="{{ isset($lote->precio_contado) ? number_format($lote->precio_contado, 2) : '' }}"
                aria-describedby="precioContadoPrepend">
        </div>
    </div> -->

    <!-- <div class="col-md-4 mb-4">
        <label for="precio_credito">Precio Crédito</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="precioCreditoPrepend">$</span>
            </div>
            <input type="text" step="0.01" name="precio_credito" id="precio_credito{{ $lote->id ?? '' }}"
                class="form-control precio-input"
                placeholder="0.00"
                value="{{ isset($lote->precio_credito) ? number_format($lote->precio_credito, 2) : '' }}"
                aria-describedby="precioCreditoPrepend">
        </div>
    </div> -->

    <div class="col-md-4">
        <label for="manzana" class="form-label">Manzana Pertenece</label>
        <select name="manzana" id="manzana{{ $lote->id ?? '' }}" class="form-select" readonly disabled>
            @foreach (range(1, $fracc->manzanas) as $i)
                <option value="{{ $i }}" {{ (isset($lote) && $lote->manzana == $i) ? 'selected' : '' }}>Manzana {{ $i }}</option>
            @endforeach
        </select>
    </div>   

    <!-- <div class="col-md-4">
        <label class="form-label">Colinda Norte</label>
        <input type="text" name="colinda_norte" value="{{ $lote->colinda_norte ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Sur</label>
        <input type="text" name="colinda_sur" value="{{ $lote->colinda_sur ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Oriente</label>
        <input type="text" name="colinda_oriente" value="{{ $lote->colinda_oriente ?? '' }}" class="form-control" {{ $readonly }}>
    </div>

    <div class="col-md-4">
        <label class="form-label">Colinda Poniente</label>
        <input type="text" name="colinda_poniente" value="{{ $lote->colinda_poniente ?? '' }}" class="form-control" {{ $readonly }}>
    </div> -->

    <div class="col-md-4">
        <label class="form-label">Enganche</label>
        <input type="text" name="enganche" value="{{ $lote->enganche ?? '' }}" class="form-control" readonly>
    </div>

     <div class="col-md-4">
        <label class="form-label">Mensualidades</label>
        <input type="text" name="mensualidades" value="{{ $lote->mensualidades ?? '' }}" class="form-control" readonly>
    </div>

    <div class="col-md-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea name="observaciones" id="observaciones{{ $lote->id ?? '' }}" rows="3" class="form-control" {{ $readonly }}>{{ $lote->observaciones ?? '' }}</textarea>
    </div>
</div>

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.precio-input');

        inputs.forEach(input => {
            // Al escribir
            input.addEventListener('input', function () {
                const cleaned = this.value.replace(/[^0-9.]/g, '');
                if (!cleaned) {
                    this.value = '';
                    return;
                }

                let [entero, decimal] = cleaned.split('.');
                entero = entero.replace(/^0+(?!$)/, ''); // Quitar ceros a la izquierda

                // Formatear con comas
                entero = parseInt(entero || '0').toLocaleString('en-US');

                // Limitar a 2 decimales
                if (decimal !== undefined) {
                    decimal = decimal.substring(0, 2);
                    this.value = `${entero}.${decimal}`;
                } else {
                    this.value = entero;
                }
            });

            // Al salir del input: no hacer nada extra (ya no agregamos $)
            input.addEventListener('blur', function () {
                // Sin formato adicional
            });

            // Al enfocar: opcionalmente limpiar comas si deseas
            input.addEventListener('focus', function () {
                // O puedes dejar las comas para seguir editando
                // this.value = this.value.replace(/,/g, '');
            });
        });

        // Limpiar antes de enviar el formulario
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function () {
                inputs.forEach(input => {
                    input.value = input.value.replace(/[^0-9.]/g, '');
                });
            });
        }
    });
</script>

@endsection
