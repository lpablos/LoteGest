@extends('layouts.master')

@section('title')
    Estatus de Proyectos
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

    <!-- Lightbox css -->
    <link href="{{ URL::asset('build/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h2> Lotes </h2>
                                </div>
                            </div>
                        </div>                   
                    </div>
                    
                    @if (isset($fracc))
                        
                    @endif
                    @if(isset($fracc) && !empty($fracc->imagen) )
                    <div class="row">
                            <div class="col-6 mx-auto text-center">
                                <div>
                                    <h5 class="font-size-14">{{$fracc->nombre}}</h5>
                                    <a class="image-popup-vertical-fit" href="{{ asset('storage/' . $fracc->imagen) }}" title="Caption. Can be aligned it to any side and contain any HTML.">
                                        <img src="{{ asset('storage/' . $fracc->imagen) }}" alt="Imagen del fraccionamiento" width="300px">
                                    </a>
                                </div>
                            </div>
                        </div>    
                    @endif
                   <div class="container d-flex justify-content-center mt-5">
                        <div class="col-md-6">
                            <form method="GET" id="busquedaResultado" action="{{ route('lote.index') }}">
                                <div class="mb-3">
                                    <label for="fraccionamiento" class="form-label">Fraccionamiento</label>
                                    <select class="form-select" id="fraccionamiento" name="identy" required>
                                        <option value="" disabled {{ old('identy', $identy ?? '') == '' ? 'selected' : '' }}>Selecciona un fraccionamiento</option>
                                        @foreach ($fraccionamientos as $fraccc)
                                            <option value="{{ $fraccc->id }}" {{ (old('identy', $identy ?? '') == $fraccc->id) ? 'selected' : '' }}>
                                                {{ $fraccc->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                   

                    <table id="datatable-estatus-proyecto" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> Manzana </th>
                                <th> # lote</th>
                                <th> Precio Contado </th>
                                <th> Precio Credito </th>
                                <th> Disponibilidad</th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>    
                            @foreach ( optional($fracc)->lotes ?? [] as $lote )
                                <tr>
                                    <td>{{$lote->manzana->num_manzana}}</td>      
                                    <td>{{$lote->num_lote}}</td>
                                    <td>{{$lote->manzana->precio_contado}}</td>
                                    <td>{{$lote->manzana->precio_credito}}</td>
                                    <td>{{$lote->disponibilidad->nombre}}</td>                                      
                                    <td>
                                        <div class="dropdown">
                                            <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-start">
                                                <li>
                                                    <a href="#editEstatusProyecto({{ $lote->id }})" data-bs-toggle="modal" class="dropdown-item" data-edit-id="{{ $lote->id }}">
                                                        <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td> 
                                @if (isset($fracc))
                                    @include('pages.gestion-lotes.modal.edit')                                            
                                @endif
                                </tr>   
                            @endforeach                        
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div> 
   <form id="formDuplicarLote" method="POST" action="{{ route('duplicar.lote') }}" style="display: none;">
        @csrf
        <input type="hidden" name="id" id="inputDuplicarLoteId">
    </form>
@endsection



@push('scripts')
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('build/js/pages/sweet-alerts.init.js') }}"></script>
    <!-- Magnific Popup-->
    <script src="{{ URL::asset('build/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- lightbox init js-->
    <script src="{{ URL::asset('build/js/pages/lightbox.init.js') }}"></script>
    
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
        
            //Buttons examples
            var table = $('#datatable-estatus-proyecto').DataTable({
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Sin resultados",
                    "info": "Mostrando 10 registros de _MAX_ en total | Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin registros disponibles",
                    "infoFiltered": "(filtrando de _MAX_ registros en total)",
                    "search": 'Buscar:',
                    "paginate": {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    }
                },
                lengthChange: true
            });
        
            table.buttons().container().appendTo('#datatable-estatus-proyecto_wrapper .col-md-6:eq(0)');
        
            $(".dataTables_length select").addClass('form-select form-select-sm');
          
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectFraccionamiento = document.getElementById('fraccionamiento');
            const formBusqueda = document.getElementById('busquedaResultado');
            
            
            selectFraccionamiento.addEventListener('change', function () {
                if (this.value) {
                    formBusqueda.submit();
                }
            });
        });
    </script>

    <script>
        function duplica(loteId) {
            Swal.fire({
                title: '¿Duplicar lote?',
                text: 'Esta acción creará una copia del lote seleccionado.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, duplicar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {   
                if (result.isConfirmed) {
                    if (result.isConfirmed) {
                        // Setear el ID y enviar el formulario
                        document.getElementById('inputDuplicarLoteId').value = loteId;
                        document.getElementById('formDuplicarLote').submit();
                    }
                }
            });
        }
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
    @if ($errors->any())
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            };
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        </script>
    @endif
@endpush