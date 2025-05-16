@extends('layout') 

@section('title', 'Tarefas')

@section('header-title')
    <i class="bi-list-task"></i>
    Tarefas
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            
        </h1>
        <a href="{{ route('task.create') }}" class="btn btn-outline-secondary">
            <i data-feather="plus-circle" style="margin-bottom: 2px"></i> Cadastrar
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Concluído</th>
                        <th scope="col">Data Criação</th>
                        <th scope="col">
                            <div class="d-flex justify-content-end">
                                Ações
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ \Str::limit($task?->description, 30, '...') }}</td>
                            <td>
                                @if($task->status)
                                    Sim
                                @else
                                    Não
                                @endif
                            </td>
                            <td>
                                {{ $task->created_at->format('d/m/Y H:i:s') }}
                            </td>
                            <td>
                                
                                <div class="d-flex justify-content-end">
                                    <x-toggle-button route="{{ route('task.toggle-status',  $task->id) }}" itemId="{{ $task->id }}" check="{{ $task->status }}" />
                                    <a class="btn btn-primary badge" style="margin-right: 0.5rem" href="{{ route('task.show',  $task->id) }}">
                                        Editar
                                    </a>
                                    <x-delete-button route="{{ route('task.delete',  $task->id) }}" itemId="{{ $task->id }}"/>
                                </div>
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
        {{ $tasks->links() }}
    </div>
@endsection
