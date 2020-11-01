@extends('layouts.app')

@section('navbar')
@include('partials.nav')
<form class="form-inline ml-3">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Buscar por número"
            aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
</nav>
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Lista de Habitaciones</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection



@section('content')
<h6>
    @if($query && !$habitaciones->isEmpty())
    <a href="{{ route('habitaciones.index')}}" class="btn btn-primary">Regresar</a>
    <div class="alert alert-primary" role="alert">
        Los resultados de su búsqueda cómo '{{ $query }}' son:
    </div>
    @endif
    @if($query && $habitaciones->isEmpty())
    <a href="{{ route('habitaciones.index')}}" class="btn btn-primary mb-2">Regresar</a>
    <div class="alert alert-danger" role="alert">
        No se encontrarón resultados de su búsqueda cómo '{{ $query }}'
    </div>
    @endif
</h6>
<div class="table-responsive">
    <table class="table table-hover table-dark">
        <thead>

            <tr>
                <th scope="col">Piso</th>
                <th scope="col">Tipo</th>
                <th scope="col">Género</th>
                <th scope="col">Número</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($habitaciones->isEmpty())
            <tr role="row">
                <td colspan="7">
                    <div>
                        <div role="alert" aria-live="polite">
                            <div class="text-center my-2">
                                No hay registros para mostrar
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endif
            @foreach ($habitaciones as $habitacion)
            <tr>
                <th scope="row">{{$habitacion->pisos->descripcion}}</th>
                <td>{{$habitacion->tipoHabitacion->descripcion}}</td>
                <td>{{$habitacion->genero->descripcion}}</td>
                <td>{{$habitacion->numero}}</td>
                <td>
                    @if ($habitacion->estadoHabitacion->descripcion=='Disponible')
                        <span class="btn btn-success disabled">
                            {{$habitacion->estadoHabitacion->descripcion}}
                        </span>
                    @endif
                    @if ($habitacion->estadoHabitacion->descripcion=='Ocupada')
                        <span class="btn btn-danger disabled">
                            {{$habitacion->estadoHabitacion->descripcion}}
                        </span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-warning mb-1 mr-1" href="{{ route('habitaciones.edit',$habitacion->id) }}">
                        <i class="fa fa-user-edit"></i>
                    </a>

                    <a href="#" class="btn btn-danger mb-1 mr-1" data-toggle="modal" data-target="#eliminar_{{$habitacion->id}}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @include('habitaciones.modal')
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="mx-auto">
        {{ $habitaciones->links() }}
    </div>
</div>
@endsection