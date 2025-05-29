@extends('layouts.master')

@section('title') @lang('translation.Preloader') @endsection

@section('body')

<body data-sidebar="dark">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    @endsection

    @section('content')

   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4> Proyecto: "{{ $proyecto->nombre}}"</h4>
                                    <h6>Lista de Fraccionamientos Registrados ({{ $proyecto->fraccionamientos->count() }} de {{ $proyecto->cantidad_fraccionamientos }} registrados )</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end">
                                <a href="{{ route('proyectos.index') }}" class="btn btn-info rounded-pill mb-2" data-bs-toggle="tooltip" title="Volver a los proyectos"><i class="bx bx-rotate-left"></i> Volver a proyectos</a>
                                @if($proyecto->cantidad_fraccionamientos > $proyecto->fraccionamientos->count())
                                    <a class="btn btn-success btn-rounded waves-effect waves-light mb-2" href="{{ route('proyecto.fraccionamientos.create', $proyecto->id)}}" role="button"><i class="mdi mdi-plus me-1"></i> Agregar </a>
                                @endif
                            </div>
                        </div><!-- end col-->
                    </div>
                    <p class="text-center">
                        

                    </p>
                    @include('pages.gestion-proyectos.mensajes.alertas')
                    @if ($fraccionamientos->isEmpty())
                        <p class="text-center">No Hay Fraccionamientos Registrados.</p>
                    @else
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 text-center">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Ubicación</th>
                                    <th>Estado Actual</th>
                                    <th>Responsable Proyecto</th>
                                    <th># Lotes</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fraccionamientos as $fraccionamiento)
                                    <tr>
                                        <td>{{$fraccionamiento->nombre}}</td>
                                        <td>{{$fraccionamiento->superficie_m2}}</td>
                                        <td>{{$fraccionamiento->uso_predominante}}</td>
                                        <td>{{$fraccionamiento->etapa}}</td>
                                        <td>
                                            <a href="{{ route('proyecto.fraccionamientos.lotes', $fraccionamiento->id)}}" 
                                                class="btn btn-info btn-sm btn-rounded waves-effect waves-light" 
                                                title="Ver fraccionamientos">
                                                {{ $fraccionamiento-> cantidad_lotes }} de {{ $fraccionamiento->lotes->count() }} registrados 
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('fraccionamiento.edit', $fraccionamiento->id) }}" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light">
                                                Editar
                                            </a>
                                            <form action="{{ route('fraccionamiento.destroy', $fraccionamiento->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('¿Estás seguro de que deseas eliminar este fraccionamiento?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>                                       
                                    </tr>
                                @endforeach                            
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   

    @endsection
    @section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
     <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
    @endsection