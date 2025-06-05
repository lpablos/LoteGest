 <div class="modal fade" id="editEstatusProyecto({{ $fracc->id }})" tabindex="-1" aria-labelledby="editSede" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSede"> Editar Fraccionamiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('fraccionamiento.update', ['fraccionamiento' => $fracc->id]) }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('pages.gestion-fraccionamientos.formulario.fraccionamiento')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        <!-- end modal body -->
    </div>
    <!-- end modal-content -->
</div>
<!-- end modal-dialog -->