@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/toastr/build/toastr.min.css') }}">
<link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
<div class="col-12">

<form method="POST" enctype="multipart/form-data" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
@method('PUT')
@csrf

<div class="card shadow-sm">
<div class="card-body">

<h4 class="text-center mb-3">Datos Personales</h4>
<p class="text-muted text-center">Campos con * son obligatorios</p>

<div class="row">

    <div class="col-md-6 mb-3">
        <label>Nombre(s) *</label>
        <input type="text" class="form-control form-control-sm"
               name="nombre" value="{{ $cliente->nombre }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Primer Apellido *</label>
        <input type="text" class="form-control form-control-sm"
               name="primer_apellido" value="{{ $cliente->primer_apellido }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Segundo Apellido</label>
        <input type="text" class="form-control form-control-sm"
               name="segundo_apellido" value="{{ $cliente->segundo_apellido }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Teléfono</label>
        <input type="number" class="form-control form-control-sm"
               name="telefono" value="{{ $cliente->telefono }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Fecha de nacimiento *</label>
        <input type="date" class="form-control form-control-sm"
               name="fecha_nacimiento"
               value="{{ $cliente->fecha_nacimiento->format('Y-m-d') }}"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" class="form-control form-control-sm"
               name="email" value="{{ $cliente->email }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Número de contacto</label>
        <input type="number" class="form-control form-control-sm"
               name="num_contacto" value="{{ $cliente->num_contacto }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Parentesco</label>
        <input type="text" class="form-control form-control-sm"
               name="parentesco" value="{{ $cliente->parentesco }}">
    </div>

    <div class="col-md-12 mb-3">
        <label>Identificación INE</label>
        <input type="file" class="form-control"
               name="fileIne" accept="image/*,application/pdf">
        <small class="text-danger">
            Suba archivo solo si desea actualizar
        </small>
    </div>

    <!-- BOTÓN VER DOCUMENTO -->
    @if ($cliente->url_ine)
        <div class="col-md-12 text-center mt-2">
            <a href="{{ route('cliente.documento.ine', $cliente->id) }}" 
            target="_blank" 
            class="btn btn-primary btn-parpadeo">
                📄 Ver documento cargado
            </a>
        </div>
    @endif

</div>
</div>
</div>

<!-- BOTONES -->
<div class="row mt-3">
    <div class="col-sm-6">
        <a href="{{ route('cliente.index') }}" class="btn btn-link text-muted">
            ← Cancelar
        </a>
    </div>

    <div class="col-sm-6 text-end">
        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </div>
</div>

</form>
</div>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('build/libs/toastr/build/toastr.min.js') }}"></script>

@if(Session::has('success'))
<script>
toastr.success("{{ session('success') }}");
</script>
@endif

@if(Session::has('error'))
<script>
toastr.warning("{{ session('error') }}");
</script>
@endif

@endsection

<style>
/* BOTÓN PARPADEO SUAVE */
.btn-parpadeo {
    animation: parpadeo 1.3s infinite;
}

@keyframes parpadeo {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}
</style>