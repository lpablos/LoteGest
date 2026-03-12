
@if(isset($pago) && $pago->comprobante_url)

    <iframe 
        src="{{ asset('storage/'.$pago->comprobante_url) }}"
        width="100%"
        height="650"
        style="border:0">
    </iframe>

@else

    <div class="p-4 text-center text-muted">
        Sin documento cargado
    </div>

@endif
    