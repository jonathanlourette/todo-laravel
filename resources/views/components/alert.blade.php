@php
    $alerts = [
        'success' => 'alert-success',
        'warning' => 'alert-warning',
        'danger' => 'alert-danger',
    ];
    $icons = [
        'success' => 'bi-check2-all',
        'warning' => 'bi-exclamation-circle',
        'danger' => 'bi-exclamation-triangle',
    ];
@endphp

@props([
    'type' => 'success'
])

<div class="alert {{ $alerts[$type] ?? $alerts['success'] }} alert-dismissible fade show"
     role="alert"
     {{ $attributes->merge() }}
>
    <i class="{{ $icons[$type] ?? $icons['success'] }} flex-shrink-0 me-2 fs-5"></i>
    {{ $slot }}
    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
    ></button>
</div>
