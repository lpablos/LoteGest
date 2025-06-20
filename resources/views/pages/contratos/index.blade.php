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
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#add_proyecto"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                        <i class="mdi mdi-plus me-1"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <table id="datatable-estatus-proyecto" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th> # Venta </th>
                                <th> # Cliente </th>
                                <th> Fecha Contrato</th>
                                <th> Fraccionamiento</th>
                                <th> # Lonete</th>
                                <th> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>001</td><td>1001</td><td>2025-01-15</td><td>Villa del Sol</td><td>23</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>002</td><td>1002</td><td>2025-02-20</td><td>Colinas Verdes</td><td>12</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>003</td><td>1003</td><td>2025-03-05</td><td>Altos del Lago</td><td>45</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>004</td><td>1004</td><td>2025-03-22</td><td>El Encino</td><td>19</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>005</td><td>1005</td><td>2025-04-01</td><td>Monte Azul</td><td>8</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>006</td><td>1006</td><td>2025-04-10</td><td>Villa del Sol</td><td>56</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>007</td><td>1007</td><td>2025-04-18</td><td>Colinas Verdes</td><td>33</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>008</td><td>1008</td><td>2025-05-02</td><td>Altos del Lago</td><td>27</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>009</td><td>1009</td><td>2025-05-12</td><td>Monte Azul</td><td>5</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>010</td><td>1010</td><td>2025-05-19</td><td>El Encino</td><td>40</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>011</td><td>1011</td><td>2025-05-27</td><td>Villa del Sol</td><td>18</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>012</td><td>1012</td><td>2025-06-01</td><td>Colinas Verdes</td><td>60</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>013</td><td>1013</td><td>2025-06-03</td><td>Altos del Lago</td><td>13</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>014</td><td>1014</td><td>2025-06-05</td><td>Monte Azul</td><td>21</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>015</td><td>1015</td><td>2025-06-07</td><td>El Encino</td><td>9</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>016</td><td>1016</td><td>2025-06-10</td><td>Villa del Sol</td><td>31</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>017</td><td>1017</td><td>2025-06-11</td><td>Colinas Verdes</td><td>7</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>018</td><td>1018</td><td>2025-06-12</td><td>Altos del Lago</td><td>14</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>019</td><td>1019</td><td>2025-06-13</td><td>Monte Azul</td><td>38</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>
                            <tr><td>020</td><td>1020</td><td>2025-06-15</td><td>El Encino</td><td>2</td>
                            <td>
                                  <div class="dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle card-drop px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-size-18"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a href="{{ route('contratos.show', ['contrato' => 5]) }}">
                                                    <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Editar 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                            </td>
                            </tr>       
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   
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
@endsection
