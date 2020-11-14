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
                            <h1 class="m-0 text-dark">Datos de la Habitación</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>['HabitacionController@update',$habitacion->id],'method'=>'patch']) !!}
                    {!! Form::token() !!}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="genero_id">Género</label>
                            <select id="genero_id" name="genero_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($generos as $genero)
                                <option value="{{$genero->id}}"
                                    {{$habitacion->genero_id===$genero->id  ? 'selected' : '' }}>
                                    {{$genero->descripcion}}
                                </option>
                                @endforeach
                            </select>
                            @error('genero_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_id">Tipo de Habitación</label>
                            <select id="tipo_id" name="tipo_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($tipoHabitaciones as $tipoHabitacion)
                                <option value="{{$tipoHabitacion->id}}"
                                    {{$tipoHabitacion->id===$habitacion->tipo_id ? 'selected' : ''}}>
                                    {{$tipoHabitacion->descripcion}}</option>
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
                                <option value="{{$piso->id}}" {{$habitacion->piso_id===$piso->id ? 'selected' : ''}}>
                                    {{$piso->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('piso_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado_id">Estado de Habitación</label>
                            <input name="estado_id" type="hidden" value="{{$habitacion->estado_id}}">
                            <select id="estado_id" name="estado_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                @foreach ($estadoHabitaciones as $estadoHabitacion)
                                <option value="{{$estadoHabitacion->id}}"
                                    {{$habitacion->estado_id===$estadoHabitacion->id ? 'selected' : ''}} {{$habitacion->hay_paciente===0 ? '' : 'disabled'}}>
                                    {{$estadoHabitacion->descripcion}}</option>
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
                                placeholder="Escriba número de habitación" value="{{$habitacion->numero}}">
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