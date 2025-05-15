@extends('layout') @section('title', 'Autenticação')

@push('styles')
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            text-align: center !important;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endpush

@section('body')
    <main class="form-signin">
        <form class="needs-validation"
              action=""
              method="POST"
              novalidate>
            @csrf
            
            <img class="mb-4" src="{{ asset('assets/img/logos/logo.svg') }}" alt="" width="200">

            @include('shared.session-messages')

            <h1 class="h3 mb-3 fw-normal">Autenticação</h1>

            <div class="form-floating">
                <input type="email"
                       class="form-control"
                       name="email"
                       id="email"
                       placeholder="name@example.com"
                       required>
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password"
                       class="form-control"
                       name="password"
                       id="password"
                       placeholder="Senha"
                       required>
                <label for="password">Senha</label>
            </div>

            <div class="checkbox mb-3">
                <input type="checkbox"
                       class="form-check-input"
                       id="remember"
                       name="remember"
                       value="false">
                <label class="form-check-label" for="remember">
                    Lembrar-me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-secondary" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
        </form>
    </main>
@endsection
