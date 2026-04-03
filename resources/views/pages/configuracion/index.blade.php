@extends('layouts.master')

@section('title')
    Configuración de Parámetros
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/toastr/build/toastr.min.css') }}">
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   <div class="row">
    <div class="col-12">
        <form action="{{ route('configuracion.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $configuracion->id ?? '' }}">   

            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <h4 class="card-title text-center mb-4 w-100">Configuración de Parámetros</h4>
                        <input type="hidden" name="id" value="{{ optional($configuracion)->id }}">
                        <div class="col-md-3 mb-4">
                            <label for="nombre_empresa">Nombre de la Empresa</label>
                            <input 
                                type="text" 
                                id="nombre_empresa"
                                value="{{ optional($configuracion)->nombre_empresa }}" 
                                class="form-control form-control-sm" 
                                name="nombre_empresa" 
                                placeholder="Ingresa el nombre"
                                oninput="this.value = this.value.toLowerCase()"
                                required>
                        </div>

                        <div class="col-md-3 mb-4">
                            <label for="direccion">Dirección</label>
                            <input 
                                type="text" 
                                id="direccion"
                                value="{{ optional($configuracion)->direccion }}" 
                                class="form-control form-control-sm" 
                                name="direccion" 
                                placeholder="Ingresa la dirección"
                                oninput="this.value = this.value.toLowerCase()"
                                required>
                        </div>

                        <div class="col-md-3 mb-4">
                            <label for="telefono">Teléfono</label>
                            <input 
                                type="text" 
                                id="telefono"
                                value="{{ optional($configuracion)->telefono }}" 
                                class="form-control form-control-sm" 
                                name="telefono"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                                maxlength="10"
                                placeholder="10 dígitos"
                                required>
                        </div>

                        <div class="col-md-3 mb-4">
                            <label for="email">Correo Electrónico</label>
                            <input 
                                type="email" 
                                id="email"
                                value="{{ optional($configuracion)->email }}" 
                                class="form-control form-control-sm" 
                                name="email" 
                                placeholder="Ingresa el correo electrónico"
                                oninput="this.value = this.value.toLowerCase()"
                                required>
                        </div>

                    </div>
                </div>
            </div>
       
            <div class="row">
                <div class="col-sm-6">
                    <!-- <a href="{{ route('usuarios.index') }}" class="btn text-muted d-none d-sm-inline-block btn-link">
                        <i class="mdi mdi-arrow-left me-1"></i> Cancelar 
                    </a> -->
                </div>
                <div class="col-sm-6">
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="mdi mdi-check me-1"></i> Guardar 
                        </button>
                    </div>
                </div> 
            </div>

        </form>
    </div>
</div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ URL::asset('build/libs/toastr/build/toastr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- toastr init -->
    <script src="{{ URL::asset('build/js/pages/toastr.init.js') }}"></script>
    <!-- Datatable init js -->
    <script>
        $(document).ready(function() {

            // Se declara el token global para las peticiones que se vayan a realizar
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
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
