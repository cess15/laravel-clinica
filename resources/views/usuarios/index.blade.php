@extends('layouts.app')

@section('navbar')
@include('partials.nav')
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
<table id="usersTable" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Fecha creada</th>
            <th scope="col">Última modificación</th>
        </tr>
    </thead>
</table>
@endsection
@push('scripts')
<script>
    $(function(){
        
        $("#usersTable").DataTable({
            proccessing:true,
            serverSide: true,
            pageLength: 5,
            ajax: `{{ route('data') }}`,
            type:"GET",
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
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'created_at'},
                { data: 'updated_at'},
            ]
        });
    });
</script>
@endpush