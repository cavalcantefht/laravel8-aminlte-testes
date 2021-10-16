@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('left-sidebar-top')
    @auth
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (isset(Auth::user()->img) && Auth::user()->img !== null)
                    <img src="images/user-profile.jpg" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="images/user-profile.jpg" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('users.profile', ['user' => Auth::id()]) }}"
                    class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
    @endauth
@endsection

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ isset($count_users) ? $count_users : 0 }}</h3>
                    <p>Usuários Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
    </div>
@stop
