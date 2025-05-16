@extends('layout')

@section('title', 'Dashboard')

@section('header-title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 mt-6">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h6 class="my-0 fw-normal">
                        <i class="bi-list-task"></i>
                        Minhas Tarefas Pendentes
                    </h6>
                </div>
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $taskCount ?? '0' }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush