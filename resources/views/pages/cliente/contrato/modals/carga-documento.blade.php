<!-- MODAL -->
<div class="modal fade" id="modalDocumento" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-file-document-outline me-1"></i>
                    Carga y Visualización de Contrato Firmado
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <!-- IZQUIERDA: FILEPOND -->
                    <div class="col-md-4 border-end">

                        <form id="formContrato" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="contrato_id" value="1">
                            <label class="form-label fw-bold">
                                Subir Fotografías (múltiples) o 1 PDF
                            </label>

                            <input type="file"
                                   class="filepond"
                                   name="documentos[]"
                                   multiple>

                            <div class="d-grid mt-3">
                                <button type="button"
                                        onclick="enviarImagenes(1)"
                                        id="btnGenerar"
                                        class="btn btn-primary">
                                    <i class="mdi mdi-file-pdf-box me-1"></i>
                                    Cargar Documentación
                                </button>
                            </div>

                        </form>

                    </div>

                    <!-- DERECHA: VISOR -->
                    <div class="col-md-8 text-center">  
                        
                        <div class="spinner-border text-primary m-1" role="status" id="loa-load" style="display:none;">
                            <span class="sr-only">Loading...</span>
                        </div>

                        <div class="alert alert-info mb-0" role="alert" id="pendiente-carga-digital" style="display:none;">
                            Aun no se ha anexado el documento digital
                        </div>
                        <iframe id="iframeDocumentoDigital" style="width:100%; height:500px; border-radius:8px;" frameborder="0">
                        </iframe>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>



<script>
    document.getElementById('modalDocumento')
    .addEventListener('shown.bs.modal', function (event) {

        // 🔥 Botón que abrió el modal
        const button = event.relatedTarget;

        // 🔥 Obtener data-registro
        const contratoId = button ? button.getAttribute('data-registro') : null;

        // 🔥 Reset FilePond
        if (typeof pond !== "undefined" && pond) {
            pond.removeFiles();
        }

        // 🔥 Ocultar mensaje pendiente
        const alerta = document.getElementById('pendiente-carga-digital');
        if (alerta) alerta.style.display = 'none';

        // 🔥 Limpiar iframe
        const iframe = document.getElementById('iframeDocumentoDigital');
        if (iframe) iframe.src = '';

        // 🔥 Cargar documento si existe ID
        if (contratoId) {
            cargarDocumentoExistente(contratoId);
        }

    });

    const routeDocumentoFirmado = "{{ route('contratos.documento.obtener.firmado', ':id') }}";

    function cargarDocumentoExistente(id) {

        const loader = document.getElementById('loa-load');
        const iframe = document.getElementById('iframeDocumentoDigital');
        const alerta = document.getElementById('pendiente-carga-digital');

        if (loader) loader.style.display = 'inline-block';

        let url = routeDocumentoFirmado.replace(':id', id);

        fetch(url)
        .then(response => response.json())
        .then(data => {

            if (data.success && data.url) {

                if (iframe) {
                    iframe.src = data.url + "?v=" + Date.now();
                }

            } else {

                if (alerta) {
                    alerta.style.display = 'block';
                }

            }

        })
        .finally(() => {
            if (loader) loader.style.display = 'none';
        });
    }
</script>



<script>
    let pond;

    document.addEventListener('DOMContentLoaded', function () {

        const input = document.querySelector('.filepond');

        if (input) {

            pond = FilePond.create(input, {
                allowMultiple: true,
                instantUpload: false,
                maxFiles: 10,
                name: 'documentos[]', // 👈 importante

                acceptedFileTypes: [
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                    'application/pdf'
                ],

                labelIdle: 'Arrastra fotografías o PDF <span class="filepond--label-action">Buscar</span>',
                labelButtonRemoveItem: 'Eliminar'
            });

        }

    });

    function enviarImagenes(contratoId) {
        $("#loa-load").show();
        const boton = document.getElementById('btnGenerar');
        const iframe = document.getElementById('iframeDocumentoDigital');

        if (!iframe) {
            console.error("No existe iframeDocumento en el DOM");
            return;
        }

        boton.disabled = true;
        boton.innerHTML = '<i class="mdi mdi-loading mdi-spin me-1"></i> Generando...';

        const formData = new FormData();
        formData.append('contrato_id', contratoId);

        pond.getFiles().forEach(fileItem => {
            formData.append('documentos[]', fileItem.file);
        });

        fetch("{{ route('contratos.upload.firmado') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => {

            if (!response.ok) {
                throw new Error("Error al generar el documento");
            }
            $("#loa-load").hide();
            return response.json(); // 🔥 USAMOS JSON
        })
        .then(data => {

            console.log("Respuesta del backend:", data);

            if (data.success && data.url) {

                // 🔥 AQUÍ SE ASIGNA DIRECTO
                iframe.src = data.url + "?v=" + Date.now();
                resetFilePond();

            } else {
                console.error("La respuesta no tiene success o url");
            }
            $("#loa-load").hide();
        })
        .catch(error => {
            $("#loa-load").hide();
            console.error(error);
            alert(error.message);

        })
        .finally(() => {
            $("#loa-load").hide();
            boton.disabled = false;
            boton.innerHTML = '<i class="mdi mdi-file-pdf-box me-1"></i> Generar PDF';

        });
    }

    function resetFilePond() {
        if (pond) {
            pond.removeFiles();
        }
    }

    function cargarDocumentoVacio() {

        const iframe = document.getElementById('iframeDocumento');
        iframe.src = "";
    }

   
</script>








