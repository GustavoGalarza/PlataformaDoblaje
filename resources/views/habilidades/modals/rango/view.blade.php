<div class="modal fade" id="viewRangoVocalModal-{{ $rango->id }}" tabindex="-1" aria-labelledby="viewRangoVocalModalLabel-{{ $rango->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewRangoVocalModalLabel-{{ $rango->id }}">Detalle del Rango Vocal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> {{ $rango->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $rango->descripcion }}</p>
            </div>
        </div>
    </div>
</div>
