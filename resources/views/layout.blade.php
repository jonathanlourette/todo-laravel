@extends('shared.base-layout')

@push('styles')
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
@endpush

@section('body')
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('dashboard') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="form-control form-control-dark w-100 rounded-0 border-0">
            @yield('header-title') 
        </div>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('logout') }}">Sair</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            @include('menu')
        </div>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div id="message" class="mt-3">
            @include('shared.session-messages')
        </div>
        @yield('content')
    </main>
@endsection
