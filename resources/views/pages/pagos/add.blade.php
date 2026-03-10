@extends('layouts.master')

@section('title')
    Pagos
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative mb-4">
                                <h3 class="mb-3">Registro de Pago</h3>                                
                                @include('pages.pagos.section.resumen')
                            </div>
                        
                        </div>
                    </div>
                </div>
                @include('pages.pagos.section.form-pagos')

            </div>
        </div>
    </div>
</div>

@endsection