@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@include('partials.search')
</nav>
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Lista de Usuarios</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<h6>
    @if($query && !$users->isEmpty())
    <a href="{{ route('usuarios.index')}}" class="btn btn-primary">Regresar</a>
    <div class="alert alert-primary" role="alert">
        Los resultados de su búsqueda cómo '{{ $query }}' son:
    </div>
    @endif
    @if($query && $users->isEmpty())
    <a href="{{ route('usuarios.index')}}" class="btn btn-primary mb-2">Regresar</a>
    <div class="alert alert-danger" role="alert">
        No se encontrarón resultados de su búsqueda cómo '{{ $query }}'
    </div>
    @endif
</h6>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Fecha creada</th>
            <th scope="col">Última modificación</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->isEmpty())
        <tr role="row">
            <td colspan="5">
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
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="mx-auto">
        {{ $users->links() }}
    </div>
</div>
@endsection