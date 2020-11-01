@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@include('partials.search')
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
<h6>
    @if($query && !$medics->isEmpty())
    <a href="{{ route('medicos.index')}}" class="btn btn-primary">Regresar</a>
    <div class="alert alert-primary" role="alert">
        Los resultados de su búsqueda cómo '{{ $query }}' son:
    </div>
    @endif
    @if($query && $medics->isEmpty())
    <a href="{{ route('medicos.index')}}" class="btn btn-primary mb-2">Regresar</a>
    <div class="alert alert-danger" role="alert">
        No se encontrarón resultados de su búsqueda cómo '{{ $query }}'
    </div>
    @endif
</h6>
<div class="table-responsive">
    <table class="table table-hover table-dark ">
        <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo Documento</th>
                <th scope="col">Nombres y Apellidos</th>
                <th scope="col">Número documento</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Número celular</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($medics->isEmpty())
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
            @foreach ($medics as $medic)
            <tr>
                <th scope="row">{{$medic->id}}</th>
                <td>{{$medic->tipoDocumento->descripcion}}</td>
                <td>{{$medic->nombre}} {{$medic->apellido}}</td>
                <td>{{$medic->num_documento}}</td>
                <td>{{$medic->especialidad}}</td>
                <td>{{$medic->num_celular}}</td>
                <td>
                    <a class="btn btn-warning mb-1 mr-1" href="{{ route('medicos.edit',$medic->id) }}">
                        <i class="fa fa-user-edit"></i>
                    </a>

                    <a href="#" class="btn btn-danger mb-1 mr-1" data-toggle="modal"
                        data-target="#eliminar_{{$medic->id}}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @include('medicos.modal')
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="mx-auto">
        {{ $medics->links() }}
    </div>
</div>
@endsection