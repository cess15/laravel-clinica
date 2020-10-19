<!-- Modal -->
<div class="modal fade" id="modalEliminar{{$medic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div>
        <form action="{{ route('medicos.destroy',$medic->id) }}" method="POST">
            @method('delete')
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar médico</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro que desea eliminar a {{$medic->nombre}} {{$medic->apellido}}?

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-danger">Confirmar</button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>