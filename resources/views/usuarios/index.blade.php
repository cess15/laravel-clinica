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
        <h1 class="m-0 text-dark">Lista de Usuarios</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
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
@endsection