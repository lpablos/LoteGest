@extends('layouts.master')

@section('title')
    Clientes
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
            <form id="wizard-form" action="{{ route('cliente.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
                <div class="card">
                 <div id="basic-example">
                    <!-- Seller Details -->
                    <h3> Datos Personales</h3>
                    <section>
                        <form>
                        <div class="row col-md-12">
                        <p class="card-title-desc"> Todos los campos marcados con * son obligatorios </p>
                            <div class="col-md-3 mb-4">
                                <label for="nombre"> Número de cliente </label>
                                <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Ingresa el nombre" style="text-transform:lowercase" required>
                            </div>
                            <div class="col-md-3 b-4">
                                <label for="fileINE"> Identificación INE</label>
                                <input class="form-control form-control-sm" type="file" name="fileIne" id="fileIne" accept="image/*" capture>
                            </div>
                        </div>
                        <div class="row col-md-12">
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
                                <label for="telefono"> Teléfono </label>
                                <input type="number" class="form-control form-control-sm" name="telefono" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10">
                            </div>
                             <div class="col-md-3 mb-4">
                                <label for="fecha_nacimiento">Fecha de nacimiento (*) </label>
                                <input type="date" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="email"> Correo Electrónico </label>
                                <input type="email" class="form-control form-control-sm" name="email" placeholder="Ingresa el correo electrónico" style="text-transform:lowercase" >
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="num_contacto">Número de contacto </label>
                                <input type="number" class="form-control form-control-sm" name="num_contacto" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="parentesco"> Parentesco </label>
                                <input type="text" class="form-control form-control-sm" name="parentesco" style="text-transform:lowercase">
                            </div>
                        </div>
                        </form>
                    </section>
                    <h3> Datos de Compra </h3>
                    <section>
                        <form>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-4">
                                    <label for="medidas_m"> Núm. de Solicitud </label>
                                    <input type="text" step="0.01" name="medidas_m" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="entidad_id"> Corredor </label>
                                    <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        @foreach ($corredores as $corredor)
                                            <option value="{{ $corredor->id }}">- {{ $corredor->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-4">
                                    <label for="entidad_id"> Estado </label>
                                    <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}" @if ($estado->id == 16) selected @endif >- {{ $estado->nom_estado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Municipio </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        @foreach ($mpios as $mpio)
                                            <option value="{{ $mpio->id }}">- {{ $mpio->nom_mpio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Fraccionamiento </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        @foreach ($fraccionamientos as $fraccionamiento)
                                            <option value="{{ $fraccionamiento->id }}">- {{ $fraccionamiento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="tipo_compra"> Tipo de compra </label>
                                    <select class="form-select form-select-sm" id="tipo_compra" name="tipo_compra" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <option value="1"> Individual </option>
                                        <option value="2"> Grupal </option>
                                        <option value="3"> Mixto </option>
                                    </select>
                                </div>
                                <hr>
                                <div class="col-md-3 mb-4">
                                    <label for="manzana"> Superficie Total </label>
                                    <input type="text" name="precio_contado" class="form-control form-control-sm" readOnly>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Enganche </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <option value="1"> 10% </option>
                                        <option value="2"> 15%</option>
                                        <option value="3"> 20%</option>
                                        <option value="4"> 30%</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Mensualidades </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <option value="1"> 6 Meses </option>
                                        <option value="2"> 12 Meses </option>
                                        <option value="3"> 18 Meses </option>
                                        <option value="4"> 24 Meses  </option>
                                        <option value="5"> 30 Meses </option>
                                        <option value="6"> 36 Meses </option>
                                    </select>
                                </div>
                                <hr>
                                <div class="text-end m-1" id="b_add_lote">
                                    <button type="button" id="btn_add_lote" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                                        + Lote
                                    </button>
                                </div>
                                <div class="row mb-1">
                                    <div id="contenedor-lotes"></div>
                                </div>
                                <hr>
                                <div class="text-end m-1">
                                    <button type="button" id="btn_add_medidas" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                                        + Medias y colindancias
                                    </button>
                                </div>
                                <div class="row mb-1">
                                    <div id="contenedor-medidas"></div>
                                </div>
                                <hr>
                            </div>
                        </form>
                    </section>

                    <!-- Bank Details -->
                    <h3> Sección 3 </h3>
                    <section>
                        <div>
                            <form>
                                <div class="row">
                                    
                                </div>
                            </form>
                        </div>
                    </section>

                    <!-- Confirm Details -->
                    <h3> Generación de Contrato </h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Confirm Detail</h5>
                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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

    <!-- jquery step -->
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ URL::asset('build/js/pages/form-wizard.init.js') }}"></script>
    <script>
        $(document).ready(function () {
        
            document.getElementById('btn_add_lote').addEventListener('click', function () {
                agregarLote({});
            });

            document.getElementById('btn_add_medidas').addEventListener('click', function () {
                agregarMedidas({});
            });

            function agregarLote(m) {
                let contenedor = document.getElementById('contenedor-lotes');
                let b_lote = `
                    <div class="row mb-1">
                        <div class="col-md-2 mb-4">
                            <label for="mpio_id"> Manzana </label>
                            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                <option value="" selected disabled> Selecciona una opción </option>
                                @foreach ($mpios as $mpio)
                                    <option value="{{ $mpio->id }}">- {{ $mpio->nom_mpio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="mpio_id"> Lote </label>
                            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                <option value="" selected disabled> Selecciona una opción </option>
                                @foreach ($mpios as $mpio)
                                    <option value="{{ $mpio->id }}">- {{ $mpio->nom_mpio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="manzana"> Superficie </label>
                            <input type="number" step="0.01" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="manzana"> Precio </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" readOnly>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="mpio_id"> Tipo de venta </label>
                            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                <option value="" selected disabled> Selecciona una opción </option>
                                <option value="1"> - Crédito </option>
                                <option value="2"> - Contado </option>
                            </select>
                        </div>
                    </div>`;
                contenedor.insertAdjacentHTML('beforeend', b_lote);
                contadorManzanas++;
            }
        
            function agregarMedidas(m) {
                let contenedor = document.getElementById('contenedor-medidas');
                let bloque = `
                    <div class="row mb-3" id="">
                        <div class="col-md-6">
                            <label class="form-label"> Noroeste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Sureste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Noreste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Suroeste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                    </div>`;
                contenedor.insertAdjacentHTML('beforeend', bloque);
                contadorManzanas++;
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


