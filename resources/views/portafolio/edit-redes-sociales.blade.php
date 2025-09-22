<!-- Modal para editar redes sociales -->
<div class="modal fade" id="editRedesSocialesModal" tabindex="-1" aria-labelledby="editRedesSocialesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="editRedesSocialesLabel">Editar Redes Sociales de {{ $perfil->nombre }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form action="{{ route('perfil-redes-sociales.update', $perfil->id_perfil) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @foreach($redes as $red)
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           name="redes_sociales[]"
                                           value="{{ $red->id }}"
                                           id="red-{{ $red->id }}"
                                           {{ in_array($red->id, $redesSeleccionadas) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="red-{{ $red->id }}">
                                        <i class="{{ $red->icono }}"></i> {{ $red->nombre }}
                                    </label>
                                </div>
                                <input type="text" class="form-control mt-1" name="links[{{ $red->id }}]"
                                       placeholder="Ingrese el enlace"
                                       value="{{ $perfil->redesSociales->find($red->id)?->pivot->link ?? '' }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Redes Sociales</button>
                </div>
            </form>
        </div>
    </div>
</div>
