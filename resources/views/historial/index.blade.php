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
                            <h1 class="m-0 text-dark">Consultar Historial</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    {!! Form::open( ['action' => [ 'HistorialController@show',$paciente??'' ], 'method'=>'GET' ] ) !!}
                    {!! Form::token() !!}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <h5 class="h5">Paciente</h5>
                            <label for="paciente_id"><i class="fa fa-search"></i></label>
                            <select id="paciente_id" class="searchPatient form-control col-md-10"
                                name="paciente_id"><select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Consultar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('.searchPatient').select2({
        placeholder: 'Seleccione un paciente',
        language:{
            noResults: function(){
                return "No hay resultados";
            },
            searching: function(){
                return "Buscando..";
            },
        },
        ajax: {
            url: '/ajax-autocomplete-searchPatient',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nombre.concat(' ').concat(item.apellido),
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        },
    });
</script>
@endpush