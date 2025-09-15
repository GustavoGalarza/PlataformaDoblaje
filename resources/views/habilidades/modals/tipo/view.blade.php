@foreach($tipoVozs as $tipo)
<div class="modal fade" id="viewTipoVozModal-{{ $tipo->id }}" tabindex="-1" aria-labelledby="viewTipoVozLabel-{{ $tipo->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTipoVozLabel-{{ $tipo->id }}">Tipo de Voz: {{ $tipo->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> {{ $tipo->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $tipo->descripcion }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
