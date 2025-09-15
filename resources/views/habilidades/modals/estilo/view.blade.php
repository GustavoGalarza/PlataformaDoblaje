@foreach($estilosVozs as $estilo)
<div class="modal fade" id="viewEstiloVozModal-{{ $estilo->id }}" tabindex="-1" aria-labelledby="viewEstiloVozLabel-{{ $estilo->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estilo de Voz: {{ $estilo->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> {{ $estilo->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $estilo->descripcion }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
