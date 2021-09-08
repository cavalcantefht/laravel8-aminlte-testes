@extends('adminlte::page')

@if (isset($user))
    @section('title', 'Edição de Usuário')
@else
    @section('title', 'Cadastro de Usuário')
@endif

@section('content_header')
    @if (isset($user))
        <h1 class="m-0 text-dark">Edição de Usuário</h1>
    @else
        <h1 class="m-0 text-dark">Cadastro de Usuário</h1>
    @endif
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/admin/users">Voltar</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    @if (isset($msg) && !empty($msg) && !$errors->any())
                        <div class="alert alert-success">{{ $msg }}</div>
                    @endif
                    <form action={{ isset($user) ? route('users.update', ['user' => $user->id]) : route('users.store') }}
                        method="POST">
                        @if (isset($user))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text"
                                class="form-control form-control-border @error('name') is-invalid @enderror"
                                placeholder="Nome" value="{{ $user->name ?? old('name') }}" autofocus>

                            @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="email"
                                class="form-control form-control-border @error('email') is-invalid @enderror"
                                placeholder="E-mail" value="{{ $user->email ?? old('email') }}">
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input name="password" type="password"
                                        class="form-control form-control-border @error('password') is-invalid @enderror"
                                        placeholder="Senha" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input name="confirm_password" type="password"
                                        class="form-control form-control-border @error('confirm_password') is-invalid @enderror"
                                        placeholder="Confirme a senha" value="{{ old('confirm_password') }}">
                                    @error('confirm_password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-sm btn-primary">Gravar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
