@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-dark">Registro de Paciente</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    {!! Form::open( ['action'=> [ 'PacienteController@store' ], 'method'=>'POST' ] ) !!}
                    {!! Form::token() !!}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre"
                                placeholder="Escriba el nombre">
                            @error('nombre')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="apellido"
                                placeholder="Escriba el apellido">
                            @error('apellido')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form group row">
                        <div class="form-group col-md-6">
                            <label for="documento_id">Tipo Documento</label>
                            <select id="documento_id" name="documento_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($tipoDocumento as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('documento_id')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="num_documento">Número documento</label>
                            <input type="text" name="num_documento" class="form-control" id="num_documento"
                                placeholder="Número de pasaporte o cédula" maxlength="10">
                            @error('num_documento')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <label for="domicilio">Domicilio</label>
                            <input type="text" name="domicilio" class="form-control" id="domicilio"
                                placeholder="Escriba el domicilio">
                            @error('domicilio')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a class="btn btn-danger" href="{{route('home')}}">Regresar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection