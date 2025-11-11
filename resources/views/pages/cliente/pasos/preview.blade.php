<style>
    #preview-section-load {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 110%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(255,255,255,0.8); /* opcional: fondo translúcido */
    z-index: 9999; /* para que quede encima */
}
</style>
<h3>Vista Previa</h3>

<section>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4" id="preview-section-load">
                 <img src="{{ asset('images/leaves-6625_128.gif') }}" alt="Cargando..." width="128">
            </div>
            <div class="mb-4" id="preview-section" style="display:none">
                <iframe 
                    id="preview"
                    src="{{ url('vista-previa-contrato/*') }}" 
                    style="width: 100%; height: 600px; border:1px solid #ccc;" 
                    frameborder="0">
                </iframe>
            </div>
            <!-- Card de confirmación -->
            <div id="cardConfirmacion" class="card shadow-lg border-primary" style="display: none;">
                <div class="card-body p-5">
                    <div class="text-center">
                        <div class="avatar-md mx-auto mb-4">
                            <div class="avatar-title bg-light rounded-circle text-primary h1">
                                <i class="mdi mdi-shield-check"></i>
                            </div>
                        </div>

                        <h4 class="text-primary">Generar registro oficial</h4>
                        <p class="text-muted font-size-15 mb-4">
                            Al continuar, se <strong>creará el registro en el sistema</strong>, y se asignará un
                            <strong>folio único</strong> y un <strong>código de seguridad</strong> al contrato.<br>
                            ¿Deseas continuar?
                        </p>

                        <div class="d-flex justify-content-center gap-3">
                            <button id="btnCancelarGenerar" class="btn btn-light px-4">
                                <i class="mdi mdi-close"></i> Cancelar
                            </button>
                            <button id="btnConfirmarGenerar" class="btn btn-primary px-4">
                                <i class="mdi mdi-check"></i> Sí, generar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
