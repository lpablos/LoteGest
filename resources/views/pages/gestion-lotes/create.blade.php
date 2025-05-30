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

                    <h4 class="card-title">Alta de Lote</h4>
                    @include('pages.gestion-lotes.mensajes.alertas')
                    
                    <div class="text-end">
                        <a href="{{ route('proyecto.fraccionamientos.lotes', ['fraccionamiento' =>$fraccionamiento_id]) }}" class="btn btn-info rounded-pill mb-2">
                            <i class="bx bx-rotate-left"></i> Volver a Lotes
                        </a>
                    </div>


                    <form action="{{ route('lote.store') }}" method="POST" class="mt-2">
                        @csrf
                        <div class="row g-3">
                            @include('pages.gestion-lotes.formulario.inputs-lote')
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