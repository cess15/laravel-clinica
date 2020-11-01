@extends('layouts.app')

@section('navbar')
@include('partials.nav')
</nav>
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Registro de Paciente</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form action="/pacientes" method="POST">
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
                    <div class="form-group col-md-12">
                        <label for="domicilio">Domicilio</label>
                        <input type="text" name="domicilio" class="form-control" id="domicilio"
                            placeholder="Escriba el domicilio">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a class="btn btn-danger" href="{{route('home')}}">Regresar</a>
            </form>
        </div>
    </div>
</div>
@endsection