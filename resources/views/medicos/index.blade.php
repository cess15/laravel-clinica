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
        <h1 class="m-0 text-dark">Lista de Medicos</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection



@section('content')
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo Documento</th>
            <th scope="col">Nombres y Apellidos</th>
            <th scope="col">Número documento</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Número celular</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medics as $medic)
        <tr>
            <th scope="row">{{$medic->id}}</th>
            <td>{{$medic->tipoDocumento->descripcion}}</td>
            <td>{{$medic->nombre}} {{$medic->apellido}}</td>
            <td>{{$medic->num_documento}}</td>
            <td>{{$medic->especialidad}}</td>
            <td>{{$medic->num_celular}}</td>
            <td>
                <div>
                    <a class="btn btn-warning mb-1 mr-1" href="{{ route('medicos.edit',$medic->id) }}">
                        <i class="fa fa-user-edit"></i>
                    </a>

                    <a class="btn btn-danger mb-1 mr-1" data-toggle="modal" data-target="#modalEliminar{{$medic->id}}">
                        <i class="fa fa-trash-alt"></i>
                    </a>

                    <!-- 
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    -->
                </div>
            </td>
        </tr>
        @include('medicos.modal')
        @endforeach
    </tbody>
</table>
@endsection