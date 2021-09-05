@extends('adminlte::page')

@section('title', 'Cadastro de Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários Cadastrados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
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
                            @if(!count($users) > 0)
                                <tr>
                                    <td colspan="4"><center>Nenhum usuário cadastrado</center></td>
                                </tr>
                            @endif
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="users/{{$user->id}}/edit" class="btn btn-sm btn-primary" title="Editar">ED</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
