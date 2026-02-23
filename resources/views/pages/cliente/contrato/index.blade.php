@extends('layouts.master')

@section('title')
    Contratos
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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h2> Contratos </h2>
                                    <h5> Cliente <strong>{{ $nombreCompleto }}</strong> </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @include('pages.cliente.contrato.modals.digital')
                    @include('pages.cliente.contrato.modals.carga-documento')
                    <table id="datatable-cliente-contratos" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> # Solicitud </th>
                                <th> # Sistema </th>
                                <th> Fecha contrato </th>
                                <th> Fraccionamiento </th>
                                <th> Corredor </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->num_solicitud }} </td>
                                    <td>{{ $compra->num_solicitud_sistema }} </td>
                                    <td> {{ Carbon\Carbon::parse($compra->contrato->created_at)->format('d-m-Y') }} </td>
                                    <td>{{ $compra->fraccionamiento->nombre }} </td>
                                    <td>{{ $compra->corredor->nombre }} {{ $compra->corredor->primer_apellido }} {{ $compra->corredor->segundo_apellido }}</td>
                                    
                                    <td>
                                        <div class="dropdown">
                                            <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-start">
                                                <li>
                                                        <button 
                                                            type="button" 
                                                            class="dropdown-item btn-contrato"
                                                            data-registro="{{ $compra->contrato->id }}"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#exampleModalScrollable"
                                                            
                                                        >
                                                            <i class="mdi mdi-cloud-print-outline font-size-16 text-success me-1"></i>
                                                            Contrato Sistema
                                                        </button>
                                                </li>
                                                <li>
                                                     <button 
                                                            type="button" 
                                                            class="dropdown-item btn-contrato-adjunto"
                                                            data-registro="{{ $compra->contrato->id }}"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#modalDocumento"
                                                        >
                                                            <i class="mdi mdi-cloud-print-outline font-size-16 text-success me-1"></i>
                                                            Contrato Adjunto
                                                        </button>
                                                    <!-- <a href="" class="dropdown-item"><i class="mdi mdi-clipboard-file-outline font-size-16 text-success me-1 disabled"></i>Contrato Adjunto</a> -->
                                                </li>
                                                <li>
                                                    <a href="" class="dropdown-item"><i class="mdi mdi-cloud-upload-outline font-size-16 text-success me-1 disabled"></i> Ver Pagos </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('cliente.index') }}" class="btn text-muted d-none d-sm-inline-block btn-link"><i class="mdi mdi-arrow-left me-1"></i> Regresar </a>
                        </div> <!-- end col -->
                        <!-- <div class="col-sm-6">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success"><i class="mdi mdi-check me-1"></i> Guardar </button>
                            </div>
                        </div>  -->
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    {{--  @include('usuario.add')  --}}
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

            $(document).on('click', '.btn-contrato', function () {
                
                let registro = $(this).data('registro');

                // Laravel crea la URL base con un placeholder
                let url = "{{ route('constrato.sistema.digital', ['id' => ':id']) }}";

                // Reemplazamos el placeholder por el ID real
                url = url.replace(':id', registro);

                // Establecemos la URL en el iframe
                $('#iframeDocumento').attr('src', url);
            });
            
            // Se declara el token global para las peticiones que se vayan a realizar
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
        
            //Buttons examples
            var table = $('#datatable-cliente-contratos').DataTable({
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
        
            table.buttons().container().appendTo('#datatable-cliente-contratos_wrapper .col-md-6:eq(0)');
        
            $(".dataTables_length select").addClass('form-select form-select-sm');

           //Ajax
            $('.des_activar_usuario').click(function () {
                var id = $(this).attr('data-id');
                var estatus = $(this).attr('data-estatus');
                var estado = '';
                if(estatus == 1){
                    estado = 'desactivar';
                } else {
                    estado = 'activar';
                }
                Swal.fire({
                    title: '¿Seguro de '+estado+' este usuario?',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    showLoaderOnConfirm: true,
                    confirmButtonColor: "#556ee6",
                    cancelButtonColor: "#f46a6a",
                    preConfirm: function (email) {
                        return new Promise(function (resolve, reject) {
                            setTimeout(function () {
                                resolve()
                            }, 2000)
                        })
                    },
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'delete',
                            url: '/usuarios/'+id,
                            success: function (data) {
                                if (data.code == 200) {
                                    toastr.options = {
                                        "closeButton" : false,
                                        "progressBar" : false
                                    }
                                    toastr.success(data.msg);
                                    setTimeout(function(){
                                        window.location.reload();
                                    }, 2000);
                                }

                            },
                            error: function (data) {
                                // console.log(data);
                            }
                        });
                    }
                })
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


