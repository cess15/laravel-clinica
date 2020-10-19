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
        <h1 class="m-0 text-dark">Registro de Médico</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form action="/medicos" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre"
                            placeholder="Escriba el nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellido"
                            placeholder="Escriba el apellido">
                    </div>
                </div>
                <div class="form group row">
                    <div class="form-group col-md-6">
                        <label for="documento_id">Tipo Documento</label>
                        <select id="documento_id" name="documento_id" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="1">Pasaporte</option>
                            <option value="2">Cédula</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num_documento">Número documento</label>
                        <input type="text" name="num_documento" class="form-control" id="num_documento"
                            placeholder="Número de pasaporte o cédula">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="especialidad">Especialidad</label>
                        <input type="text" name="especialidad" class="form-control" id="especialidad"
                            placeholder="Escriba la especialidad">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num_celular">Número célular</label>
                        <input type="text" name="num_celular" class="form-control" id="num_celular"
                            placeholder="Escriba número céular">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a class="btn btn-danger" href="{{route('home')}}">Regresar</a>
            </form>
        </div>
    </div>
</div>
@endsection