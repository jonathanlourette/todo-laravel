@extends('layout') 

@section('title', 'Cadastro de Tarefa')

@section('header-title')
    <i class="bi-list-task"></i>
    Cadastro de Tarefa
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
          action="{{ route('task.store') }}"
          novalidate
    >
        @csrf
        <div class="row">
            <div class="col-9 mt-3">
                <label for="title" class="form-label">Título</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       required>
            </div>
            <div class="col-3 mt-3">
                <label for="status" class="form-label">Concluido</label>
                <select class="form-select" name="status" id="status" required>
                    <option value="">Selecione...</option>
                    <option value="true" @selected(old('status') == 'true')>Sim</option>
                    <option value="false" @selected(old('status') == 'false')>Não</option>
                </select>
            </div>
            <div class="col-12 mt-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea 
                       class="form-control"
                       style="height: 200px"
                       id="description"
                       name="description"
                >{{ old('description') }}</textarea>
            </div>
            
        </div>
    </form>
@endsection
