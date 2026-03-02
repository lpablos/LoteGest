@extends('layouts.master')

@section('title')
    Clientes
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
                                    <h2> Clientes </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a class="btn btn-success btn-rounded waves-effect waves-light mb-2" href="{{ route('cliente.create')}}" role="button"><i class="mdi mdi-plus me-1"></i> Agregar </a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <table id="datatable-cliente" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> Núm. cliente </th>
                                <th> Nombre </th>
                                <th> Fecha alta </th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->no_cliente }}</td>
                                    <td>{{ $cliente->nombre }} {{ $cliente->primer_apellido }} {{ $cliente->segundo_apellido }}</td>
                                    <td>{{ Carbon\Carbon::parse($cliente->created_at)->format('d-m-Y') }} </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-size-18"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-start">
                                                <li>
                                                    <a href="{{ route('cliente.edit', ['cliente' => $cliente->id ])}}" class="dropdown-item"><i class="bx bx-user font-size-16 text-success me-1"></i> Editar </a>
                                                    <a href="{{ route('cliente.nueva.compra', ['idCliente' => $cliente->id ]) }}" class="dropdown-item"><i class="bx bx-cart font-size-16 text-success me-1"></i>Nueva Compra </a>
                                                    <a href="{{ route('cliente.show', ['cliente' => $cliente->id ]) }}" class="dropdown-item"><i class="bx bx-list-ol font-size-16 text-success me-1"></i>Ver Compras </a>
                                                    <a href="{{ route('cliente.contratos', ['idCliente' => $cliente->id ])}}" class="dropdown-item"><i class="bx bx-list-check font-size-16 text-success me-1"></i>Ver Contratos </a>
                                                    @if(in_array(auth()->user()->role_id, [1, 2]))
                                                        <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="dropdown-item">
                                                                <i class="bx bx-trash-alt font-size-16 text-danger me-1"></i>
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <!-- <a href="{{ route('cliente.destroy', ['cliente' => $cliente->id ])}}" class="dropdown-item"><i class="bx bx-trash-alt font-size-16 text-danger me-1"></i>Eliminar</a> -->
                                                </li>
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

            // Se declara el token global para las peticiones que se vayan a realizar
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
        
            //Buttons examples
            var table = $('#datatable-cliente').DataTable({
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
        
            table.buttons().container().appendTo('#datatable-cliente_wrapper .col-md-6:eq(0)');
        
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


