@php
/**
 *
 */
@endphp

@extends('shared.base-layout')

@section('body')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto pt-9 pb-7 px-9" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-default.svg') }}" width="175" class="max-h-50px logo-default" />
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->
                {{-- @include('admin::menu') --}}
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                            <!--begin::Heading-->
                            <h1 class="text-dark fw-bold mt-1 mb-1 fs-2">@yield('header-title')</h1>
                            <!--end::Heading-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb fw-semibold fs-base mb-1">
                                <li class="breadcrumb-item text-muted">
                                    <a href="" class="text-muted text-hover-primary">Home</a>
                                </li>
                                {{-- @yield('header-subtitle') --}}
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title=-->
                        <!--begin::Logo bar-->
                        <div class="d-flex d-lg-none align-items-center flex-grow-1">
                            <!--begin::Aside Toggle-->
                            <div class="btn btn-icon btn-circle btn-active-light-primary ms-n2 me-1" id="kt_aside_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-1">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
										</svg>
									</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Aside Toggle-->
                            <!--begin::Logo-->
                            <a href="" class="d-lg-none">
                                <img alt="Logo" src="{{ asset('assets/img/logos/logo-compact.svg') }}" width="50" class="max-h-40px" />
                            </a>
                            <!--end::Logo-->
                        </div>
                        <!--end::Logo bar-->
                        <!--begin::Toolbar wrapper-->
                        <div class="d-flex align-items-center flex-shrink-0">
                            <!--begin::User-->
                            <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-circle symbol-35px symbol-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img alt="Pic" src="{{ asset('assets/img/avatars/blank.png') }}" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{ asset('assets/img/avatars/blank.png') }}" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{-- {{ auth('administrator')->user()->name }} --}} DDDD
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{-- {{ auth('administrator')->user()->email }} --}} DDDD
                                                </a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="" class="a menu-link px-5">Sair</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User -->
                        </div>
                        <!--end::Toolbar wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <div id="message" class="mt-3">
                            @include('shared.session-messages')
                        </div>
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
    </div>

@endsection
