<!-- resources/views/habilidades/modals/idioma/view.blade.php -->
<div class="modal fade" id="viewIdiomaModal-{{ $idioma->id }}" tabindex="-1" aria-labelledby="viewIdiomaLabel-{{ $idioma->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewIdiomaLabel-{{ $idioma->id }}">Detalles del Idioma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> {{ $idioma->id }}</p>
                <p><strong>Nombre:</strong> {{ $idioma->nombre }}</p>
                <p><strong>Creado:</strong> {{ $idioma->created_at->format('d M Y H:i') }}</p>
                <p><strong>Actualizado:</strong> {{ $idioma->updated_at->format('d M Y H:i') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
