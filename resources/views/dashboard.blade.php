@php
/**
 *
 */
$title = 'Dashboard';
@endphp

@extends('admin::layout')

@section('title', $title)

@section('header-title')
    <!--begin::Svg Icon-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"/>
            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"/>
            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"/>
            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"/>
        </svg>
    </span>
    <!--end::Svg Icon-->
    {{ $title }}
@endsection

@section('header-subtitle')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-6">
            <div class="card card-flush h-md-100">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800"></span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">

                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6 ">
                    <div class="row">
                        <div class="col-md-12 text-center mt-10 mb-20">
                            <h3>Bem-vindo</h3>
                        </div>
                    </div>
                </div>
                <!--end: Card Body-->
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush


