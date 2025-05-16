@extends('layout') 

@section('title', 'Cadastro de Usuário')

@section('header-title')
    <i class="bi-people"></i>
    Cadastro de Usuário
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
          action="{{ route('user.store') }}"
          novalidate
    >
        @csrf
        <div class="row">
            <div class="col-6 mt-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       required>
            </div>
            <div class="col-6 mt-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       required>
            </div>
            <div class="col-6 mt-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       required>
            </div>
            <div class="col-6 mt-3">
                <label for="confirm_password" class="form-label">Confirme a Senha</label>
                <input type="password"
                       class="form-control"
                       id="confirm_password"
                       name="confirm_password"
                       required>
            </div>
            <div class="col-3 mt-3">
                <label for="administrator" class="form-label">Administrador</label>
                <select class="form-select" name="administrator" id="administrator" required>
                    <option value="">Selecione...</option>
                    <option value="true" @selected(old('administrator') == 'true')>Sim</option>
                    <option value="false" @selected(old('administrator') == 'false')>Não</option>
                </select>
            </div>
            <div class="col-3 mt-3">
                <label for="active" class="form-label">Ativo</label>
                <select class="form-select" name="active" id="active" required>
                    <option value="">Selecione...</option>
                    <option value="true" @selected(old('active') == 'true')>Sim</option>
                    <option value="false" @selected(old('active') == 'false')>Não</option>
                </select>
            </div>
        </div>
    </form>
@endsection
