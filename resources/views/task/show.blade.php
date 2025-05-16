@extends('layout') 

@section('title', 'Editar Tarefa')

@section('header-title')
    <i class="bi-list-task"></i>
    Editar Tarefa
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
    <div class="row">
        <div class="col-6">
            <form id="form"
                class="g-3 mb-5 needs-validation"
                method="POST"
                action="{{ route('task.update', $task->id) }}"
                novalidate
            >
                @csrf @method('PUT') 
                <div class="row">
                    <div class="col-9 mt-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ old('title') ?? $task->title }}"
                            required>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="status" class="form-label">Concluido</label>
                        <select class="form-select" name="status" id="status" required>
                            <option value="">Selecione...</option>
                            <option value="true" @selected($task->status)>Sim</option>
                            <option value="false" @selected(!$task->status)>Não</option>
                        </select>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea 
                            class="form-control"
                            style="height: 200px"
                            id="description"
                            name="description"
                        >{{ old('description') ?? $task->description }}</textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <div class="col-12">
                <form id="form_add_user_in_task"
                    class="g-3 mb-5 needs-validation"
                    method="POST"
                    action="{{ route('task.add-user', $task->id) }}"
                    novalidate
                >
                    @csrf
                    <div class="row mt-3">
                        <div class="col-9">
                            <label for="user" class="form-label">Usuários</label>
                            <select class="form-select" name="user" id="user" required>
                                <option value="">Selecione...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <button class="btn btn-primary mt-1" type="submit">
                                Adicionar
                            </button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">
                                <div class="d-flex justify-content-end">
                                    Ações
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($usersTask as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td class="d-flex justify-content-end">
                                    <x-delete-button route="{{ route('task.remove-user' , [$task->id, $user->id,]) }}" itemId="{{ $user->id }}" prefix="form_remove_user"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">Nenhum registro encontrado!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
