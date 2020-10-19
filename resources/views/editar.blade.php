@extends('layouts.app')

@section('navbar')
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Actualizar datos</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home')}}"
                    class="{{ Request::path() === '/' ? 'breadcrumb-item active' : 'breadcrumb-item' }}">Mi cuenta</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('usuarios.edit',auth()->user()->id) }}"
                    class="{{ Request::path() === 'usuarios/'.auth()->user()->id.'/edit' ? 'breadcrumb-item active' : 'breadcrumb-item' }}">Actualizar
                    Datos</a></li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Mi Cuenta') }}</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action={{route('usuarios.update',$user->id)}} method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nombre</label>
                                <input type="name" name="name" class="form-control" id="name" value="{{$user->name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{$user->email}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a class="btn btn-danger" href="{{url('/')}}">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection