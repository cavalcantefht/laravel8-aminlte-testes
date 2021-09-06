@extends('adminlte::page')

@section('title', 'Cadastro de Usuário')

@section('content_header')
    <h1 class="m-0 text-dark">Usuários Cadastrados</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <pre>
                        @php
                            print_r($user);
                        @endphp
                    </pre>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
