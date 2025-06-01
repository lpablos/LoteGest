@extends('layouts.master')

@section('title') Proyecto @endsection

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

                    <h4 class="card-title">Detalle de Proyecto</h4>
                    @include('pages.gestion-proyectos.mensajes.alertas')
                    <div class="text-end">
                        <a href="{{ url()->previous() }}"
                        class="btn btn-info rounded-pill mb-2"
                        data-bs-toggle="tooltip"
                        title="Volver a la página anterior">
                            <i class="bx bx-rotate-left"></i>
                        </a>
                    </div>
                    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            @include('pages.gestion-proyectos.formulario.inputs-proyectos')
                            <!-- Botón de enviar -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
   

    @endsection
    @section('script')
   
    @endsection