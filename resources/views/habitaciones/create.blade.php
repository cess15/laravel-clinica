@extends('layouts.app')

@section('navbar')
    @include('partials.nav')
</nav>
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Registro de Habitación</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form action="/habitaciones" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="genero_id">Género</label>
                        <select id="genero_id" name="genero_id" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tipo_id">Tipo de Habitación</label>
                        <select id="tipo_id" name="tipo_id" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="1">Simple</option>
                            <option value="2">Doble</option>
                        </select>
                    </div>
                </div>
                <div class="form group row">
                    <div class="form-group col-md-6">
                        <label for="piso_id">Piso</label>
                        <select id="piso_id" name="piso_id" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="1">Planta Baja</option>
                            <option value="2">Primer Piso</option>
                            <option value="3">Segundo Piso</option>
                            <option value="4">Tercer Piso</option>
                            <option value="5">Cuarto Piso</option>
                            <option value="6">Quinto Piso</option>
                            <option value="7">Último Piso</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="estado_id">Estado de Habitación</label>
                        <select id="estado_id" name="estado_id" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="1">Disponible</option>
                            <option value="2">Ocupada</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="numero">Número de habitación</label>
                        <input type="text" name="numero" class="form-control" id="numero"
                            placeholder="Escriba número de habitación">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a class="btn btn-danger" href="{{route('home')}}">Regresar</a>
            </form>
        </div>
    </div>
</div>
@endsection