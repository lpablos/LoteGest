 <div class="modal fade" id="editEstatusProyecto({{ $lote->id }})" tabindex="-1" aria-labelledby="editSede" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
           <div class="modal-header align-items-center">
                <h5 class="modal-title mb-0" id="editSede"> 
                    Editar Lote 
                </h5>
                <h4>

                  
                </h4>

                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('lote.update', ['lote' => $lote->id]) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('pages.gestion-lotes.formulario.lote')
                    @php
                        $readonly = (isset($lote) && $lote->disponibilidad->nombre !== 'Disponible') ? 'readonly' : '';
                    @endphp
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        @if(!$readonly)
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        @endif
                        </div>
                </form>
            </div>
        <!-- end modal body -->
    </div>
    <!-- end modal-content -->
</div>
<!-- end modal-dialog -->