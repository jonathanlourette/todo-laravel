@extends('layout')

@section('title', 'Editar Usuário')

@section('header-title')
    <i class="bi-people"></i>
    Editar Usuário
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            
        </h1>

        <button form="form" class="btn btn-success" type="submit">
            <i class="bi-clipboard-check"></i>
            Salvar
        </button>
    </div>

    <form id="form"
          class="g-3 mb-5 needs-validation"
          method="POST"
          action="{{ route('user.update', $user->id) }}"
          novalidate
    >
        @csrf @method('put')
        <div class="row">
            <div class="col-6 mt-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') ?? $user->name }}"
                       required>
            </div>
            <div class="col-6 mt-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value="{{ old('email') ?? $user->email }}"
                       required>
            </div>
            <div class="col-6 mt-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password">
            </div>
            <div class="col-6 mt-3">
                <label for="confirm_password" class="form-label">Confirme a Senha</label>
                <input type="password"
                       class="form-control"
                       id="confirm_password"
                       name="confirm_password">
            </div>
            <div class="col-3 mt-3">
                <label for="administrator" class="form-label">Administrador</label>
                <select class="form-select" name="administrator" id="administrator" required>
                    <option value="">Selecione...</option>
                    <option value="true" @selected($user->administrator)>Sim</option>
                    <option value="false" @selected(!$user->administrator)>Não</option>
                </select>
            </div>
            <div class="col-3 mt-3">
                <label for="active" class="form-label">Ativo</label>
                <select class="form-select" name="active" id="active" required>
                    <option value="">Selecione...</option>
                    <option value="true" @selected($user->active)>Sim</option>
                    <option value="false" @selected(!$user->active)>Não</option>
                </select>
            </div>
        </div>
    </form>
@endsection
