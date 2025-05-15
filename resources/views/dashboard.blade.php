@extends('layout')

@section('title', 'Dashboard')

@section('header-title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 mt-6">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h6 class="my-0 fw-normal">
                        <i class="bi-cash-coin"></i>
                        Saldo Atual
                    </h6>
                </div>
                <div class="card-body">
                    <h3 class="card-title">
                        R$ 1000,00
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush