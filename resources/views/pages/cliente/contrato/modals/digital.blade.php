

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contrato Generado en Sistema</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <iframe id="iframeDocumentoSistema" width="100%" height="450px" style="border: none;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

@section('script')

<script>
    let url = "{{ route('constrato.sistema.digital', ['id' => ':id']) }}"

    $('#exampleModalScrollable').on('shown.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const contratoId = button.data('registro');
        url = url.replace(':id', contratoId);
        $('#iframeDocumentoSistema').attr('src', url);
    });
</script>

@endsection

