<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jonathan Lourette">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="canonical" href="{{ config('app.url') }}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link rel="icon" href="{{ asset('assets/media/logos/favicon.svg') }}">
    <meta name="theme-color" content="#7952b3">

    <style>
        .form-control {
            border-radius: 0.7rem;
        }

        .form-select {
            border-radius : 0.7rem;
        }

        .btn {
            --bs-btn-border-radius: 0.7rem;
        }

        .form-select.form-select-solid {
            background-color : var(--bs-gray-100);
            border-color: var(--bs-gray-300);
        }

        .btn.btn-light {
            background-color: var(--bs-gray-200);
        }
        .form-control.form-control-solid {
            background-color: var(--bs-gray-100);
            border-color: var(--bs-gray-300);
        }
        .dropdown.show > .form-control.form-control-solid, .form-control.form-control-solid:active, .form-control.form-control-solid.active, .form-control.form-control-solid:focus, .form-control.form-control-solid.focus {
            background-color: var(--bs-gray-200);
            border-color: var(--bs-gray-400);
        }

        .card {
            --bs-card-box-shadow: 0px 0px 15px rgb(188, 188, 188);
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>

    @stack('styles')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<body>
@yield('body')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    // Habilita o `Bootstrap Validation`.
    Array.prototype.slice.call(document.querySelectorAll('.needs-validation'))
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        });

    // Habilita o `Bootstrap Tooltip`
    [].slice
        .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        .map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

</script>

@stack('scripts')
</body>
</html>
