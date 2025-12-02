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
            <form method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-3 mb-4">
                            <label for="rol_id"> Rol (*) </label>
                            <select class="form-select form-select-sm" id="rol_id" name="rol_id" style="cursor: pointer;" disabled>
                                <option value="" selected disabled> Selecciona una opción </option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}" @if ($rol->id == $usuario->role_id) selected @endif >- {{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row col-md-12" style="display: none;" id="formPersonal">
                            <h4 class="card-title text-center"> Datos Personales </h4>
                            <p class="card-title-desc"> Todos los campos marcados con * son obligatorios </p>
                            <div class="col-md-3 mb-4">
                                <label for="nombre"> Nombre(s)(*) </label>
                                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" value="{{ $usuario->nombre }}" style="text-transform:lowercase" disabled required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="primer_apellido"> Primer Apellido (*) </label>
                                <input type="text" class="form-control form-control-sm" id="primer_apellido" name="primer_apellido" value="{{ $usuario->primer_apellido }}" style="text-transform:lowercase" disabled required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="segundo_apellido"> Segundo Apellido</label>
                                <input type="text" class="form-control form-control-sm" id="segundo_apellido" name="segundo_apellido" value="{{ $usuario->segundo_nombre }}" style="text-transform:lowercase" disabled>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="email"> Correo Electrónico (*) </label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{ $usuario->email }}" style="text-transform:lowercase" disabled required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="telefono"> Teléfono (*) </label>
                                <input type="number" class="form-control form-control-sm" id="telefono" name="telefono" value="{{ $usuario->telefono }}" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10" disabled>
                            </div>
                            <div class="col-md-3 mb-4" id="divEdad">
                                <label for="edad"> Edad (*) <small> (En años) </small></label>
                                <input type="number" class="form-control form-control-sm" id="edad" name="edad" value="{{ $usuario->edad }}" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,3)" minlength="3" maxlength="3" disabled>
                            </div>
                            <!--<div class="col-md-3 mb-4" id="divImagenPerfil">
                                <label for="imagenPerfil"> Imagen de perfil </label>
                                <input type="file" id="imagenPerfil" name="imagenPerfil" class="form-control from-control-sm" disabled>
                            </div>-->
                            <div class="col-md-3 mb-4" id="divDomicilio">
                                <label for="domicilio"> Domicilio </label>
                                <input type="text" class="form-control form-control-sm" id="domicilio" name="domicilio" value="{{ $usuario->domicilio }}" placeholder="Ingresa la información" disabled>
                            </div>
                            <div class="col-md-3 mb-4" id="divEnfermedad">
                                <label for="enfermedades"> Enfermedades/Alergias</label>
                                <input type="text" class="form-control form-control-sm" id="enfermedades" name="enfermedades" value="{{ $usuario->enfermedades }}" placeholder="Ingresa la información" disabled>
                            </div>
                            <div class="col-md-3 mb-4" id="divFechaNacimiento">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}" onchange="claculaEdad()" style="cursor: pointer;" disabled>
                            </div>
                            <div class="col-md-3 mb-4" id="divTipoSangre">
                                <label for="tipo_sangre"> Tipo de sangre </label>
                                <input type="text" class="form-control form-control-sm" id="tipo_sangre" name="tipo_sangre" value="{{ $usuario->tipo_sangre }}" placeholder="Ingresa la información" disabled>
                            </div>
                            <div class="col-md-3 mb-4" id="divFechaInicioLaboral">
                                <label for="fecha_inicio_laboral">Fecha de inicio laboral (*) </label>
                                <input type="date" class="form-control form-control-sm" id="fecha_inicio_laboral" name="fecha_inicio_laboral" value="{{ $usuario->fecha_laboral }}">
                            </div>
                            <div class="col-md-3 mb-4" id="divNumContacto">
                                <label for="num_contacto">Número de contacto </label>
                                <input type="number" class="form-control form-control-sm" id="num_contacto" name="num_contacto" value="{{ $usuario->num_contacto }}" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10">
                            </div>
                            <div class="col-md-3 mb-4" id="divParentesco">
                                <label for="parentesco"> Parentesco </label>
                                <input type="text" class="form-control form-control-sm" id="parentesco" name="parentesco" style="text-transform:lowercase" value="{{ $usuario->parentesco }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="display: none;">
                    <div class="card-body">
                       <div class="row col-md-12">
                            <h4 class="card-title text-center mb-4"> Configuración de Permisos (EN DESARROLLO)</h4>
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
                            <button type="submit" class="btn btn-success" disabled id="btnSubmit"><i class="mdi mdi-check me-1"></i> Guardar </button>
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
        $( document ).ready(function() {
            var rol = "<?php echo $usuario->role_id ?>";
            if (rol == 1 || rol == 2 || rol == 3) {
                $('#formPersonal').css('display', '');
                document.getElementById("nombre").disabled = false;
                document.getElementById("primer_apellido").disabled = false;
                document.getElementById("segundo_apellido").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("telefono").disabled = false;
                document.getElementById("btnSubmit").disabled = false;
                document.getElementById("edad").disabled = false;
                document.getElementById("imagenPerfil").disabled = false;
                document.getElementById("domicilio").disabled = false;
                document.getElementById("enfermedades").disabled = false;
                document.getElementById("fecha_nacimiento").disabled = false;
                document.getElementById("tipo_sangre").disabled = false;
                document.getElementById("antiguedad").disabled = false;
                document.getElementById("num_contacto").disabled = false;
                document.getElementById("parentesco").disabled = false;
                $("#divSeudonimo").hide();
                $("#divEdad").show();
                $("#divImagenPerfil").show();
                $("#divDomicilio").show();
                $("#divEnfermedad").show();
                $("#divFechaNacimiento").show();
                $("#divTipoSangre").show();
                $("#divFechaInicioLaboral").show();
                $("#divAntiguedad").show();
                $("#divNumContacto").show();
                $("#divParentesco").show();
                document.getElementById("edad").required = true;
                document.getElementById("telefono").required = true;
                document.getElementById("imagenPerfil").required = false;
                document.getElementById("domicilio").required = false;
                document.getElementById("enfermedades").required = false;
                document.getElementById("fecha_nacimiento").required = true;
                document.getElementById("tipo_sangre").required = false;
                document.getElementById("antiguedad").required = false;
                document.getElementById("fecha_inicio_laboral").required = true;
                document.getElementById("num_contacto").required = false;
                document.getElementById("parentesco").required = false;
            }  else if (rol == 4){
                $('#formPersonal').css('display', '');
                document.getElementById("nombre").disabled = false;
                document.getElementById("primer_apellido").disabled = false;
                document.getElementById("segundo_apellido").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("telefono").disabled = false;
                $("#divSeudonimo").show();
                $("#divEdad").hide();
                $("#divImagenPerfil").hide();
                $("#divDomicilio").hide();
                $("#divEnfermedad").hide();
                $("#divFechaNacimiento").hide();
                $("#divTipoSangre").hide();
                $("#divFechaInicioLaboral").hide();
                $("#divAntiguedad").hide();
                $("#divNumContacto").hide();
                $("#divParentesco").hide();
                document.getElementById("telefono").required = true;
                document.getElementById("edad").required = false;
                document.getElementById("imagenPerfil").required = false;
                document.getElementById("domicilio").required = false;
                document.getElementById("enfermedades").required = false;
                document.getElementById("fecha_nacimiento").required = false;
                document.getElementById("tipo_sangre").required = false;
                document.getElementById("antiguedad").required = false;
                document.getElementById("num_contacto").required = false;
                document.getElementById("parentesco").required = false;
                document.getElementById("fecha_inicio_laboral").required = false;
                document.getElementById("seudonimo").required = false;
                document.getElementById("btnSubmit").disabled = false;
            }
        });
    </script>
    <script>
        $('#rol_id').on('change', function() {
            if(this.value == 1 || this.value == 2 || this.value == 3){
                $('#formPersonal').css('display', '');
                document.getElementById("nombre").disabled = false;
                document.getElementById("primer_apellido").disabled = false;
                document.getElementById("segundo_apellido").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("telefono").disabled = false;
                document.getElementById("btnSubmit").disabled = false;
                document.getElementById("edad").disabled = false;
                document.getElementById("imagenPerfil").disabled = false;
                document.getElementById("domicilio").disabled = false;
                document.getElementById("enfermedades").disabled = false;
                document.getElementById("fecha_nacimiento").disabled = false;
                document.getElementById("tipo_sangre").disabled = false;
                document.getElementById("antiguedad").disabled = false;
                document.getElementById("num_contacto").disabled = false;
                document.getElementById("parentesco").disabled = false;
                $("#divSeudonimo").hide();
                $("#divEdad").show();
                $("#divImagenPerfil").show();
                $("#divDomicilio").show();
                $("#divEnfermedad").show();
                $("#divFechaNacimiento").show();
                $("#divTipoSangre").show();
                $("#divFechaInicioLaboral").show();
                $("#divAntiguedad").show();
                $("#divNumContacto").show();
                $("#divParentesco").show();
                document.getElementById("edad").required = true;
                document.getElementById("telefono").required = true;
                document.getElementById("imagenPerfil").required = false;
                document.getElementById("domicilio").required = false;
                document.getElementById("enfermedades").required = false;
                document.getElementById("fecha_nacimiento").required = true;
                document.getElementById("tipo_sangre").required = false;
                document.getElementById("antiguedad").required = false;
                document.getElementById("fecha_inicio_laboral").required = true;
                document.getElementById("num_contacto").required = false;
                document.getElementById("parentesco").required = false;
            }  else if (this.value == 4){
                $('#formPersonal').css('display', '');
                document.getElementById("nombre").disabled = false;
                document.getElementById("primer_apellido").disabled = false;
                document.getElementById("segundo_apellido").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("telefono").disabled = false;
                $("#divSeudonimo").show();
                $("#divEdad").hide();
                $("#divImagenPerfil").hide();
                $("#divDomicilio").hide();
                $("#divEnfermedad").hide();
                $("#divFechaNacimiento").hide();
                $("#divTipoSangre").hide();
                $("#divFechaInicioLaboral").hide();
                $("#divAntiguedad").hide();
                $("#divNumContacto").hide();
                $("#divParentesco").hide();
                document.getElementById("telefono").required = true;
                document.getElementById("edad").required = false;
                document.getElementById("imagenPerfil").required = false;
                document.getElementById("domicilio").required = false;
                document.getElementById("enfermedades").required = false;
                document.getElementById("fecha_nacimiento").required = false;
                document.getElementById("tipo_sangre").required = false;
                document.getElementById("antiguedad").required = false;
                document.getElementById("num_contacto").required = false;
                document.getElementById("parentesco").required = false;
                document.getElementById("fecha_inicio_laboral").required = false;
                document.getElementById("seudonimo").required = false;
                document.getElementById("btnSubmit").disabled = false;
            }
        });
    </script>
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


