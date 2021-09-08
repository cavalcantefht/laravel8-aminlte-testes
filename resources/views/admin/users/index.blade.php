@extends('adminlte::page')

@section('title', 'Cadastro de Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários Cadastrados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/users/create" class="btn btn-sm btn-primary float-right">+ Usuário</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de Criação</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!count($users) > 0)
                                <tr>
                                    <td colspan="4">
                                        <center>Nenhum usuário cadastrado</center>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="/admin/users/{{ $user->id }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
                                    <td>
                                        <a href="users/{{ $user->id }}/edit" class="btn btn-sm btn-primary"
                                            title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clear-fix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item {{ $users->currentPage() === 1 ? 'disabled' : '' }}">
                            <a class="page-link"
                                href="{{ $users->path() . '?page=' . ($users->currentPage() - 1) }}">«</a>
                        </li>
                        @for ($i = 0; $i < $users->lastPage(); $i++)
                            <li class="page-item {{ $users->currentPage() === $i + 1 ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ $users->path() . '?page=' . ($i + 1) }}">{{ $i + 1 }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $users->currentPage() === $users->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link"
                                href="{{ $users->path() . '?page=' . ($users->currentPage() + 1) }}">»</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
