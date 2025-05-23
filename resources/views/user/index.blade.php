@extends('layout')

@section('title', 'Usuários')

@section('header-title')
    <i class="bi-people"></i>
    Usuários
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">

        </h1>
        <a href="{{ route('user.create') }}" class="btn btn-outline-secondary">
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
                        <th scope="col">Nome</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Situação</th>
                        <th scope="col">
                            <div class="d-flex justify-content-end">
                                Ações
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->administrator)
                                    Sim
                                @else
                                    Não
                                @endif
                            </td>
                            <td>
                                @if($user->active)
                                     Ativo
                                @else
                                    Inativo
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary badge" style="margin-right: 0.5rem" href="{{ route('user.show',  $user->id) }}">
                                        Editar
                                    </a>
                                    <x-delete-button route="{{ route('user.delete',  $user->id) }}" itemId="{{ $user->id }}"/>
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
        {{ $users->links() }}
    </div>
@endsection
