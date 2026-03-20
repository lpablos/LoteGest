@if(session('message'))
<script>
document.addEventListener("DOMContentLoaded", function () {

    toastr.options = {
        closeButton: false,
        progressBar: true
    };

    const type = "{{ session('type', 'info') }}";
    const message = @json(session('message'));

    toastr[type](message);

});
</script>
@endif