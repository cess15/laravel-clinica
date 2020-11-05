@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@include('partials.search')
</nav>
@endsection

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Lista de Pacientes</h1>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<h6>
    @if($query && !$patients->isEmpty())
    <a href="{{ route('pacientes.index')}}" class="btn btn-primary">Regresar</a>
    <div class="alert alert-primary" role="alert">
        Los resultados de su búsqueda cómo '{{ $query }}' son:
    </div>
    @endif
    @if($query && $patients->isEmpty())
    <a href="{{ route('pacientes.index')}}" class="btn btn-primary mb-2">Regresar</a>
    <div class="alert alert-danger" role="alert">
        No se encontrarón resultados de su búsqueda cómo '{{ $query }}'
    </div>
    @endif
</h6>
<table class="table table-hover table-dark">
    <thead>

        <tr>
            <th scope="col">#</th>
            <th scope="col">Tipo Documento</th>
            <th scope="col">Nombres y Apellidos</th>
            <th scope="col">Número documento</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Médico Responsable</th>
            <th scope="col">Internaciones</th>
        </tr>
    </thead>
    <tbody>
        @if ($patients->isEmpty())
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
        @foreach ($patients as $patient)
        <tr>
            <th scope="row">{{$patient->id}}</th>
            <td>{{$patient->tipoDocumento->descripcion}}</td>
            <td>{{$patient->nombre}} {{$patient->apellido}}</td>
            <td>{{$patient->num_documento}}</td>
            <td>{{$patient->domicilio}}</td>
            @if($patient->medicos!=null)
            <td>{{$patient->medicos->nombre}} {{$patient->medicos->apellido}}</td>
            @endif
            @if($patient->medicos==null)
            <td></td>
            @endif
            <td>
                <a class="btn btn-warning mb-1 mr-1" href="{{ route('pacientes.edit',$patient->id) }}">
                    <i class="fa fa-user-edit"></i>
                </a>

                <a href="#" class="btn btn-danger mb-1 mr-1" data-toggle="modal"
                    data-target="#eliminar_{{$patient->id}}">
                    <i class="fa fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @include('pacientes.modal')
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="mx-auto">
        {{ $patients->links() }}
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
@endpush