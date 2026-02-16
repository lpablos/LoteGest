<style>
    #vista-contrato-load {
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
<h3>Contrato</h3>

<section>
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <a href="{{ route('cliente.index') }}" target="_blank" class="btn btn-secondary mb-4 btn-parpadeo">Listado de Clientes</a>
        </div>
        <div class="col-lg-8">
            <div class="mb-4" id="vista-contrato-load">
                 <img src="{{ asset('images/leaves-6625_128.gif') }}" alt="Cargando..." width="128">
            </div>
            <div class="mb-4" id="vista-contrato" style="display:none">
                <iframe 
                    id="contrato"
                    src="{{ url('vista-contrato/*') }}" 
                    style="width: 100%; height: 600px; border:1px solid #ccc;" 
                    frameborder="0">
                </iframe>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes parpadeo {
        0% { opacity: 1; }
        50% { opacity: 0.4; }
        100% { opacity: 1; }
    }

    .btn-parpadeo {
        animation: parpadeo 1s infinite;
    }
</style>
