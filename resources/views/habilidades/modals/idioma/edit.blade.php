<!-- resources/views/habilidades/modals/idioma/edit.blade.php -->
<div class="modal fade" id="editIdiomaModal-{{ $idioma->id }}" tabindex="-1" aria-labelledby="editIdiomaLabel-{{ $idioma->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('idiomas.update', $idioma->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editIdiomaLabel-{{ $idioma->id }}">Editar Idioma</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre-{{ $idioma->id }}" class="form-label">Nombre del Idioma</label>
                        <input type="text" name="nombre" id="nombre-{{ $idioma->id }}" class="form-control" value="{{ $idioma->nombre }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Actualizar Idioma</button>
                </div>
            </form>
        </div>
    </div>
</div>
