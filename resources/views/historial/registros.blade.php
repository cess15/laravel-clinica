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
                            <h1 class="m-0 text-dark">Historial de {{$paciente->nombre.' '.$paciente->apellido}}</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    @if ($internaciones!=null)
                    <a class="btn btn-danger" href="{{url('historial')}}">Regresar</a>
                    <div class="table-responsive">
                        <table id="internmentsTable" class="display nowrap table table-bordered table-hover"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Médico</th>
                                    <th scope="col">Piso</th>
                                    <th scope="col">Número</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Fecha de Ingreso</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internaciones as $internacion)
                                <td>{{ $internacion->pacientes->nombre.' '.$internacion->pacientes->apellido }}</td>
                                <td>{{ $internacion->medicos->nombre.' '.$internacion->medicos->apellido }}</td>
                                <td>{{ $internacion->habitaciones->pisos->descripcion }}</td>
                                <td>{{ $internacion->habitaciones->numero }}</td>
                                <td>{{ $internacion->motivo }}</td>
                                <td>{{ $monthYear }}</td>
                                <td>{{ $internacion->estadoInternacion->descripcion }}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection