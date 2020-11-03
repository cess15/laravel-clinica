<a class="btn btn-warning mb-1 mr-1" href="{{ route('medicos.edit',$id) }}">
    <i class="fa fa-user-edit"></i>
</a>
<a href="#" class="btn btn-danger mb-1 mr-1" data-toggle="modal" data-target="#eliminar_{{$id}}">
    <i class="fa fa-trash-alt"></i>
</a>

<div class="modal fade" id="eliminar_{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro que desea eliminar a {{$nombre}} {{$apellido}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="deleteMedic({{$id}})">Confirmar</button>
            </div>
        </div>
    </div>
</div>