@if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function () {
    toastr.options = {
        closeButton: false,
        progressBar: true
    };
    toastr.success(@json(session('success')));
});
</script>
@endif

@if(session('error'))
<script>
document.addEventListener("DOMContentLoaded", function () {
    toastr.options = {
        closeButton: false,
        progressBar: true
    };
    toastr.error(@json(session('error')));
});
</script>
@endif