@extends('layouts.app')

@section('navbar')
@include('partials.nav')
</nav>
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
                                <option value="1" @if($habitacion->genero_id===1) selected @endif>Masculino</option>
                                <option value="2" @if($habitacion->genero_id===2) selected @endif>Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_id">Tipo de Habitación</label>
                            <select id="tipo_id" name="tipo_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                <option value="1" @if($habitacion->tipo_id===1) selected @endif>Simple</option>
                                <option value="2" @if($habitacion->tipo_id===2) selected @endif>Doble</option>
                            </select>
                        </div>
                    </div>
                    <div class="form group row">
                        <div class="form-group col-md-6">
                            <label for="piso_id">Piso</label>
                            <select id="piso_id" name="piso_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                <option value="1" @if($habitacion->tipo_id===1) selected @endif>Planta Baja</option>
                                <option value="2" @if($habitacion->tipo_id===2) selected @endif>Primer Piso</option>
                                <option value="3" @if($habitacion->tipo_id===3) selected @endif>Segundo Piso</option>
                                <option value="4" @if($habitacion->tipo_id===4) selected @endif>Tercer Piso</option>
                                <option value="5" @if($habitacion->tipo_id===5) selected @endif>Cuarto Piso</option>
                                <option value="6" @if($habitacion->tipo_id===6) selected @endif>Quinto Piso</option>
                                <option value="7" @if($habitacion->tipo_id===7) selected @endif>Último piso</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado_id">Estado de Habitación</label>
                            <select id="estado_id" name="estado_id" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                <option value="1" @if($habitacion->estado_id===1) selected @endif>Disponible</option>
                                <option value="2" @if($habitacion->estado_id===2) selected @endif>Ocupada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="numero">Número de habitación</label>
                            <input type="text" name="numero" class="form-control" id="numero"
                                placeholder="Escriba número de habitación" value="{{$habitacion->numero}}">
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