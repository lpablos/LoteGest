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

                    <h4 class="card-title">Creación de Proyectos</h4>
                    @include('pages.gestion-proyectos.mensajes.alertas')
                     <div class="text-end">
                        <a href="{{ route('proyectos.index') }}" 
                            class="btn btn-info rounded-pill mb-2">
                                <i class="bx bx-rotate-left"></i> Volver a Proyectos
                        </a>
                    </div>
                    <form action="{{ route('proyectos.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            @include('pages.gestion-proyectos.formulario.inputs-proyectos')
                            <!-- Botón de enviar -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
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