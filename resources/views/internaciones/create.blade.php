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
                            <h1 class="m-0 text-dark">Registro de Internación</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <div class="card-body">
                    {!! Form::open( ['action' => [ 'InternacionController@store' ], 'method'=>'POST' ] ) !!}
                    {!! Form::token() !!}
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <h5 class="h5">Paciente</h5>
                            <label for="paciente_id"><i class="fa fa-search"></i></label>
                            <select id="paciente_id" class="searchPatient form-control col-md-10" name="paciente_id"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <h5 class="h5">Médico</h5>
                            <label for="medico_id"><i class="fa fa-search"></i></label>
                            <select id="medico_id" class="searchMedic form-control col-md-10" name="medico_id"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-5">
                            <h5 class="h5">Motivo</h5>
                            <input type="text" name="motivo" class="form-control" id="motivo"
                                placeholder="Escriba el motivo de la internación">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="m-0 mb-2 text-dark">Lista de Habitaciones</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <input type="text" name="habitacion_id" id="habitacion_id" hidden>
                    <div class="table-responsive">
                        <table id="tableRoomInternation" class="display nowrap table table-bordered table-hover"
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Piso</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Género</th>
                                    <th scope="col">Número</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a class="btn btn-danger" href="{{url('internaciones')}}">Regresar</a>
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

    $('.searchMedic').select2({
        placeholder: 'Seleccione un médico',
        language:{
            noResults: function(){
                return "No hay resultados";
            },
            searching: function(){
                return "Buscando..";
            },
        },
        ajax: {
            url: '/ajax-autocomplete-searchMedic',
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

    $(function(){
        var id=0;
        var table = $('#tableRoomInternation').DataTable({
            proccessing:true,
            serverSide: true,
            pageLength: 5,
            autoFill:true,
            responsive: true,
            ajax: `{{ route('dataRoomEnabled') }}`,
            type:"GET",
            select:{
                style:'single'
            },
            language:{
                "emptyTable":"No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "lengthMenu": 'Mostrar <select>'+
                                    '<option value="5">5</option>'+
                                    '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            columns: [
                { data: 'piso_id' },
                { data: 'tipo_id' },
                { data: 'genero_id' },
                { data: 'numero' },
                { data: 'estado_id' },
            ],
        });

        table.on('select', function(e, data, type, indexes){
            var rowData = table.rows( indexes ).data().toArray();
            rowData.forEach(element=>{
                id = element.id;
                $("#habitacion_id").val(id);
            })
        })
        .on('deselect', function(e,data,type,indexes){
            var rowData = table.rows( indexes ).data().toArray();
            
        });
    });

</script>
@endpush