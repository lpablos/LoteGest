@if(session('message'))
<script>
(function () {

    function mostrarToast() {
        if (typeof toastr !== 'undefined') {
            toastr.options = {
                closeButton: false,
                progressBar: true
            };

            toastr["{{ session('type', 'info') }}"](@json(session('message')));
        }
    }

    // 🔥 Si el DOM ya cargó → ejecuta directo
    if (document.readyState === "complete" || document.readyState === "interactive") {
        mostrarToast();
    } else {
        // 🔥 Si aún no → espera
        document.addEventListener("DOMContentLoaded", mostrarToast);
    }

})();
</script>
@endif