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
        <h1 class="m-0 text-dark">Bienvenido</h1>
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
                    <form>
                        <div class="form-group row">
                            <label for="staticName" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticName"
                                    value="{{auth()->user()->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Correo electrónico</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="{{auth()->user()->email}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection