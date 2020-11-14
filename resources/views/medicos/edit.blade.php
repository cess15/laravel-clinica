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
                            <h1 class="m-0 text-dark">Datos del Médico</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>['MedicoController@update',$medico->id],'method'=>'patch']) !!}
                    {!! Form::token() !!}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre"
                                value="{{$medico->nombre}}" placeholder="Escriba el nombre">
                            @error('nombre')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="apellido"
                                value="{{$medico->apellido}}" placeholder="Escriba el apellido">
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
                                <option value="{{$tipo->id}}" {{ $medico->documento_id===$tipo->id ? 'selected' : '' }}>
                                    {{$tipo->descripcion}}</option>
                                @endforeach
                            </select>
                            @error('documento_id')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="num_documento">Número documento</label>
                            <input type="text" name="num_documento" class="form-control" id="num_documento"
                                value="{{$medico->num_documento}}" placeholder="Número de pasaporte o cédula">
                            @error('num_documento')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="especialidad">Especialidad</label>
                            <input type="text" name="especialidad" class="form-control" id="especialidad"
                                value="{{$medico->especialidad}}" placeholder="Escriba la especialidad">
                            @error('especialidad')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="num_celular">Número célular</label>
                            <input type="text" name="num_celular" class="form-control" id="num_celular"
                                value="{{$medico->num_celular}}" placeholder="Escriba número céular">
                            @error('num_celular')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a class="btn btn-danger" href="{{url('medicos')}}">Regresar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/validarNumero.js') }}"></script>
@endpush