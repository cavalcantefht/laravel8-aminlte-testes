@extends('adminlte::page')

@section('title', 'Dados do Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Dados do Usuário</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/users">Voltar</a>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td><b>Nome:</b></td>
                            <td>&nbsp;{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td><b>E-mail:</b></td>
                            <td>&nbsp;{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td><b>Dt. Criação:</b></td>
                            <td>&nbsp;{{ $user->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
