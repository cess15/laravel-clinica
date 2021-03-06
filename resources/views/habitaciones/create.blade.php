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
                            <h1 class="m-0 text-dark">Registro de Habitación</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    {!! Form::open( ['action' => [ 'HabitacionController@store' ], 'method'=>'POST'] ) !!}
                    {!! Form::token() !!}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="genero_id">Género</label>
                            <select id="genero_id" name="genero_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($generos as $genero)
                                <option value="{{$genero->id}}">{{$genero->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('genero_id')
                            <span class="error text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_id">Tipo de Habitación</label>
                            <select id="tipo_id" name="tipo_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($tipoHabitaciones as $tipoHabitacion)
                                <option value="{{$tipoHabitacion->id}}">{{$tipoHabitacion->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('tipo_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form group row">
                        <div class="form-group col-md-6">
                            <label for="piso_id">Piso</label>
                            <select id="piso_id" name="piso_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($pisos as $piso)
                                <option value="{{$piso->id}}">{{$piso->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('piso_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado_id">Estado de Habitación</label>
                            <select id="estado_id" name="estado_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($estadoHabitaciones as $estadoHabitacion)
                                <option value="{{$estadoHabitacion->id}}">{{$estadoHabitacion->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('estado_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="numero">Número de habitación</label>
                            <input type="text" name="numero" class="form-control" id="numero"
                                placeholder="Escriba número de habitación">
                            @error('numero')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a class="btn btn-danger" href="{{url('habitaciones')}}">Regresar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection