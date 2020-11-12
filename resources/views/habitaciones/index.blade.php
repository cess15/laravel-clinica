@extends('layouts.app')

@section('navbar')
@include('partials.nav')
</nav>
@endsection



@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="m-0 mb-2 text-dark">Lista de Habitaciones</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    
    <div class="table-responsive">
        <table id="tableRoom" class="display nowrap table table-bordered table-hover" style="width:100%;">
            <thead>
                <tr>
                    <th scope="col">Piso</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Género</th>
                    <th scope="col">Número</th>
                    <th scope="col">Estado</th>
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
        $('#tableRoom').DataTable({
            proccessing:true,
            serverSide: true,
            pageLength: 5,
            autoFill:true,
            responsive: true,
            ajax: `{{ route('dataRoom') }}`,
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
                { data: 'piso_id' },
                { data: 'tipo_id' },
                { data: 'genero_id' },
                { data: 'numero' },
                { data: 'estado_id' },
                { data: 'btn', name:'btn'},
            ],
            rowCallback: function(row, data, index){
                if(data.estado_id==="Disponible"){
                    $(row).find('td:eq(4)').css('color', 'green');
                }
                if(data.estado_id==="Ocupada"){
                    $(row).find('td:eq(4)').css('color', 'red');
                }
            }
        });
    });
</script>
@endpush