@if(isset($pago) && $pago->comprobante_url)
    <iframe 
        src="{{ route('comprobante.documentacion.ver', $pago->id) }}"
        width="100%"
        height="650"
        style="border:0">
    </iframe>
@else
    <div class="p-4 text-center text-muted">
        Sin ningun documento cargado
    </div>
@endif

    