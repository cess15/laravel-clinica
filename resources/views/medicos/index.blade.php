@extends('layouts.app')

@section('navbar')
@include('partials.nav')
@endsection



@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Medicos</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="table-responsive">
        <table id="medicsTable" class="display nowrap table table-bordered table-hover" style="width: 100%;">
            <thead>

                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo Documento</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Número documento</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Número celular</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/modal.js') }}"></script>
<script>
    $(function(){
        
        var table = $("#medicsTable").DataTable({
            proccessing:true,
            serverSide: true,
            pageLength: 5,
            ajax: `{{ route('dataMedic') }}`,
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
                { data: 'id', name:'id'},
                { data: 'documento_id' },
                { data: 'nombre', name: 'nombre'},
                { data: 'apellido', name: 'apellido' },
                { data: 'num_documento' },
                { data: 'especialidad'},
                { data: 'num_celular'},
                { data: 'btn', name:'btn'},
            ],
        });
    });
</script>
@endpush