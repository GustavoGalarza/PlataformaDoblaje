<div class="modal fade" id="viewTimbreVozModal-{{ $timbre->id }}" tabindex="-1" aria-labelledby="viewTimbreVozModalLabel-{{ $timbre->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTimbreVozModalLabel-{{ $timbre->id }}">Detalle del Timbre de Voz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> {{ $timbre->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $timbre->descripcion }}</p>
            </div>
        </div>
    </div>
</div>
