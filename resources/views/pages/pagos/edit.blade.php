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
                                <h3 class="mb-3">Detalle del Pago</h3>                                
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">@include('pages.pagos.section.form-pagos')</div>
                    <div class="col-7">@include('pages.pagos.section.documento')</div>
                </div>
                
                

            </div>
        </div>
    </div>
</div>
@endsection
@include('layouts.vendor-scripts')
@push('scripts')

    @include('pages.pagos.section.mensaje')
@endpush




