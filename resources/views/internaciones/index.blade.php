@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Internaciones</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="table-responsive">
        <table id="internmentsTable" class="display nowrap table table-bordered table-hover" style="width: 100%;">
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
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function(){
        
        var table = $("#internmentsTable").DataTable({
            proccessing:true,
            serverSide: true,
            pageLength: 5,
            ajax: `{{ route('dataInternment') }}`,
            type:"GET",
            autoFill:true,
            responsive:true,
            language:{
                "emptyTable":"No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "lengthMenu": 'Mostrar <select>'+
                                    '<option value="5">5</option>'+
                                    '<option value="10">10</option>'+
                                    '<option value="15">20</option>'+
                                    '<option value="20">40</option>'+
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
                { data: 'paciente_id'},
                { data: 'medico_id'},
                { data: 'habitacion_id'},
                { data: 'numero'},
                { data: 'motivo'},
                { data: 'created_at'},
                { data: 'estado_id'},
            ],
        });
    });
</script>
@endpush