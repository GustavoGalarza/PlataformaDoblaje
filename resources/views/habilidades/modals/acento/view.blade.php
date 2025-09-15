<div class="modal fade" id="viewAcentoDialectoModal-{{ $acento->id }}" tabindex="-1" aria-labelledby="viewAcentoDialectoModalLabel-{{ $acento->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAcentoDialectoModalLabel-{{ $acento->id }}">Detalle del Acento/Dialecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> {{ $acento->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $acento->descripcion }}</p>
            </div>
        </div>
    </div>
</div>
