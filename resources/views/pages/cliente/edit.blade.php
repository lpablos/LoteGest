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
            <form method="POST" enctype="multipart/form-data" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
                @method('PUT')
                @csrf
                <div class="card">
    <div class="card-body">
        <div class="row">

            <!-- FORMULARIO (60%) -->
            <div class="col-md-6">
                <h4 class="text-center mb-3">Datos Personales</h4>
                <p class="text-muted">Todos los campos marcados con * son obligatorios</p>

                <div class="row">

                    <!-- Nombre -->
                    <div class="col-md-6 mb-3">
                        <label>Nombre(s) (*)</label>
                        <input type="text" 
                               class="form-control form-control-sm" 
                               name="nombre"
                               value="{{ $cliente->nombre }}" 
                               style="text-transform:lowercase" 
                               required>
                    </div>

                    <!-- Primer apellido -->
                    <div class="col-md-6 mb-3">
                        <label>Primer Apellido (*)</label>
                        <input type="text" 
                               class="form-control form-control-sm" 
                               name="primer_apellido"
                               value="{{ $cliente->primer_apellido }}" 
                               style="text-transform:lowercase" 
                               required>
                    </div>

                    <!-- Segundo apellido -->
                    <div class="col-md-6 mb-3">
                        <label>Segundo Apellido</label>
                        <input type="text" 
                               class="form-control form-control-sm" 
                               name="segundo_apellido"
                               value="{{ $cliente->segundo_apellido }}" 
                               style="text-transform:lowercase">
                    </div>

                    <!-- Teléfono -->
                    <div class="col-md-6 mb-3">
                        <label>Teléfono</label>
                        <input type="number" 
                               class="form-control form-control-sm" 
                               name="telefono"
                               value="{{ $cliente->telefono }}"
                               oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)">
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div class="col-md-6 mb-3">
                        <label>Fecha de nacimiento (*)</label>
                        <input type="date" 
                               class="form-control form-control-sm"
                               name="fecha_nacimiento"
                               value="{{ $cliente->fecha_nacimiento->format('Y-m-d') }}" 
                               required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label>Correo Electrónico</label>
                        <input type="email" 
                               class="form-control form-control-sm" 
                               name="email"
                               value="{{ $cliente->email }}" 
                               style="text-transform:lowercase">
                    </div>

                    <!-- Número de contacto -->
                    <div class="col-md-6 mb-3">
                        <label>Número de contacto</label>
                        <input type="number" 
                               class="form-control form-control-sm" 
                               name="num_contacto"
                               value="{{ $cliente->num_contacto }}"
                               oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)">
                    </div>

                    <!-- Parentesco -->
                    <div class="col-md-6 mb-3">
                        <label>Parentesco</label>
                        <input type="text" 
                               class="form-control form-control-sm" 
                               name="parentesco"
                               value="{{ $cliente->parentesco }}" 
                               style="text-transform:lowercase">
                    </div>

                    <!-- INE -->
                    <div class="col-md-12 mb-3">
                        <label>Identificación INE</label>
                        <input class="form-control" 
                               type="file" 
                               name="fileIne" 
                               id="fileIne" 
                               accept="image/*">
                        <small class="text-danger">
                            Cargar nuevo archivo solo si desea actualizarlo
                        </small>
                    </div>

                </div>
            </div>

            <!-- IMAGEN (40%) -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                @if ($cliente->url_ine)
                    <iframe 
                        src="{{ route('cliente.documento', $cliente->id) }}"
                        width="100%" 
                        height="400px"
                        style="border: 1px solid #ddd; border-radius: 8px;">
                    </iframe>
                @else
                    <p class="text-muted">No se ha subido documento INE.</p>
                @endif
            </div>
            <!-- <div class="col-md-5 d-flex align-items-center justify-content-center">
                @if ($cliente->url_ine)
                    <img src="{{ asset('storage/' . $cliente->url_ine) }}" 
                         alt="Documento INE"
                         class="img-fluid img-thumbnail shadow-sm"
                         style="max-height: 350px;">
                @else
                    <p class="text-muted">No se ha subido documento INE.</p>
                @endif
            </div> -->

        </div>
    </div>
</div>

<!-- OPCIONAL: MEJOR ESTILO -->
<style>
    .img-thumbnail {
        border-radius: 10px;
        padding: 5px;
        background-color: #fff;
    }

    .card {
        border-radius: 10px;
    }
</style>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('cliente.index') }}" class="btn text-muted d-none d-sm-inline-block btn-link"><i class="mdi mdi-arrow-left me-1"></i> Cancelar </a>
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
    @if(Session::has('success'))
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            }
            toastr.warning("{{ session('error') }}");
        </script>
    @endif
    
@endsection


