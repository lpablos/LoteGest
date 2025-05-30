@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/toastr/build/toastr.min.css') }}">
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('build/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('build/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@chenfengyuan/datepicker/datepicker.min.css') }}">
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('usuarios.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="card">
                    <div class="card-body">
                       <div class="row col-md-12">
                            <h4 class="card-title text-center"> Datos Personales </h4>
                            <p class="card-title-desc"> Todos los campos marcados con * son obligatorios </p>
                            <div class="col-md-3 mb-4">
                                <label for="nombre"> Nombre(s)(*) </label>
                                <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Ingresa el nombre" style="text-transform:lowercase" required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="primer_apellido"> Primer Apellido (*) </label>
                                <input type="text" class="form-control form-control-sm" name="primer_apellido" placeholder="Ingresa el primer apellido" style="text-transform:lowercase" required>
                            </div>
                            <div class="col-md-3 b-4">
                                <label for="segundo_apellido"> Segundo Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="segundo_apellido" placeholder="Ingresa el segundo apellido" style="text-transform:lowercase">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="email"> Correo Electrónico </label>
                                <input type="email" class="form-control form-control-sm" name="email" placeholder="Ingresa el correo electrónico">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="rol_id"> Rol </label>
                                <select class="form-select form-select-sm" name="rol_id" style="cursor: pointer;">
                                    <option value="" selected disabled> Selecciona una opción </option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">- {{ $rol->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                       <div class="row col-md-12">
                            <h4 class="card-title text-center mb-4"> Configuración de Permisos </h4>
                            <h4 class="card-title mb-4"> Usuarios </h4>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Crear
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Editar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Cambiar estado
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Imprimir
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4"> Proyectos </h4>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Crear
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Editar
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check form-check-success mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" checked>
                                        <label class="form-check-label" for="formCheckcolor2">
                                            Cambiar estado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('usuarios.index') }}" class="btn text-muted d-none d-sm-inline-block btn-link"><i class="mdi mdi-arrow-left me-1"></i> Cancelar </a>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success"><i class="mdi mdi-check me-1"></i> Guardar </button>
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <!-- toastr plugin -->
    <script src="{{ URL::asset('build/libs/toastr/build/toastr.min.js') }}"></script>
    <!-- toastr init -->
    <script src="{{ URL::asset('build/js/pages/toastr.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>
    <!-- form repeater js -->
    <script src="{{ URL::asset('build/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-repeater.int.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>

    <!-- Form file upload init js -->
    <script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
    <script>
        // Validación personalizada para asegurarse de que al menos una casilla esté marcada
        document.getElementById('formCliente').addEventListener('submit', function(event) {
            const checkboxes = document.querySelectorAll('input[name="genero"]:checked');
            if (checkboxes.length === 0) {
                toastr.error("¡Debes seleccionar un género!");
                event.preventDefault();  // Evita el envío del formulario
            }
        });
    </script>
    
@endsection


