@extends('layouts.master')

@section('title')
    Pagos
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
    <style>
        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
            }
            50% {
                box-shadow: 0 0 20px rgba(25, 135, 84, 0.9);
            }
            100% {
                box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
            }
        }

        .btn-parpadeo {
            animation: glowPulse 1.5s infinite;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h2> Pagos </h2>
                                  
                                </div>
                            </div>
                        </div>
                          @include('pages.pagos.section.resumen')
                          
                        <!-- <div class="col-sm-12"> -->
                        <div class="d-flex justify-content-between align-items-center">

                                <!-- BOTON IZQUIERDA -->
                                <a href="{{ route('contratos.index') }}" 
                                class="btn text-muted btn-link">
                                    <i class="mdi mdi-arrow-left me-1"></i> Cancelar
                                </a>

                                <!-- BOTON DERECHA -->
                                <a class="btn btn-success btn-rounded waves-effect waves-light btn-parpadeo"
                                href="{{ route('pagos.create', ['solicitud' => $compra->num_solicitud_sistema]) }}"
                                role="button">
                                    <i class="mdi mdi-plus me-1"></i> Pago
                                </a>

                            </div>
                        </div>
                        <!-- <div class="col-sm-12">
                            <div class="text-sm-end">
                                <a href="{{ route('usuarios.index') }}" class="btn text-muted d-none d-sm-inline-block btn-link"><i class="mdi mdi-arrow-left me-1"></i> Cancelar </a>
                               
                               
                                    <a class="btn btn-success btn-rounded waves-effect waves-light mb-2 btn-parpadeo"
                                    href="{{ route('pagos.create', ['solicitud' => $compra->num_solicitud_sistema]) }}"
                                    role="button">
                                        <i class="mdi mdi-plus me-1"></i> Pago
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <table id="datatable-usuario" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> Fecha Pago </th>
                                <th> Concepto</th>
                                <th> Metodo </th>                                
                                <th> monto </th>
                                <th> Saldo</th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $pago)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($pago->fecha_pago)->format('d-m-Y') }}</td>
                                    <td>{{ $pago->concepto }}</td>
                                    <td>{{ $pago->metodo_pago }}</td>
                                    <td>{{ $pago->monto }}</td>
                                    <td>{{ $pago->saldo_despues }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-start">
                                                <li><a href="{{route('pagos.show', ['solicitud' => $compra->num_solicitud_sistema, 'pago' => $pago->id])}}" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar </a></li>
                                                <!-- <li><a href="{{route('pagos.show', ['solicitud' => $compra->num_solicitud_sistema, 'pago' => $pago->id])}}" class="dropdown-item"><i class="mdi mdi-receipt font-size-16 text-success me-1"></i> Recibo </a></li> -->
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="mdi mdi-receipt font-size-16 text-success me-1"></i> Recibo</button>
                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
        @include('pages.pagos.modal.recibo')
    </div> <!-- end row -->

    
    {{--  @include('usuario.add')  --}}
@endsection

@section('script')

 <script src="{{ URL::asset('build/libs/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/jquery-knob.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/jquery-knob.init.js') }}"></script>
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
     <!-- toastr plugin -->
    <script src="{{ URL::asset('build/libs/toastr/build/toastr.min.js') }}"></script>
    

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
            var table = $('#datatable-usuario').DataTable({
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
        
            table.buttons().container().appendTo('#datatable-usuario_wrapper .col-md-6:eq(0)');
        
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
        @include('pages.pagos.section.mensaje')
    </script>
    
@endsection


