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
        </div>
    </div>
</section>
