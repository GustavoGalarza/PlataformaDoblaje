<div class="modal fade" id="viewDemoModal-{{ $demo->id_demo }}" tabindex="-1"
    aria-labelledby="viewDemoModalLabel-{{ $demo->id_demo }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title">{{ $demo->titulo }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-center mb-3">
                        @if ($demo->tipo_archivo === 'video')
                            <!-- Video player -->
                            <video id="player-{{ $demo->id_demo }}" class="cld-video-player cld-fluid" controls></video>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const player{{ $demo->id_demo }} = cloudinary.videoPlayer("player-{{ $demo->id_demo }}", {
                                        cloud_name: "{{ env('CLOUDINARY_CLOUD_NAME', 'dxsaspggi') }}",
                                        controls: true,
                                        fluid: true
                                    });
                                    player{{ $demo->id_demo }}.source("{{ $demo->archivo_url }}");
                                });
                            </script>
                        @else
                            <!-- Audio normal -->
                            @if ($demo->portada_url)
                                <div class="mb-2">
                                    <x-cloudinary::image public-id="{{ $demo->portada_url }}" class="w-100 rounded"
                                        style="max-height: 180px; object-fit: cover;" />
                                </div>
                            @endif
                            <audio controls class="w-100">
                                <source
                                    src="https://res.cloudinary.com/{{ env('CLOUDINARY_CLOUD_NAME') }}/video/upload/{{ $demo->archivo_url }}"
                                    type="audio/mpeg">
                            </audio>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <p><strong>Descripción:</strong> {{ $demo->descripcion }}</p>


                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Idioma:</strong> {{ $demo->idioma?->nombre ?? 'N/A' }}
                        </p>
                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Tipo
                                de voz:</strong> {{ $demo->tipoVoz?->nombre ?? 'N/A' }}</p>
                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Estilo de voz:</strong> {{ $demo->estiloVoz?->nombre ?? 'N/A' }}
                        </p>
                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Rango vocal:</strong> {{ $demo->rangoVocal?->nombre ?? 'N/A' }}
                        </p>
                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Timbre de voz:</strong> {{ $demo->timbreVoz?->nombre ?? 'N/A' }}
                        </p>
                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Acento / Dialecto:</strong> {{ $demo->acento?->nombre ?? 'N/A' }}
                        </p>
                        <p class="badge border text-white px-3 py-1 fs-6" style="background-color: transparent;">
                            <strong>Visibilidad:</strong> {{ $demo->visibilidad ? 'Público' : 'Privado' }}
                        </p>
                        <p><strong>Estado:</strong> {{ ucfirst($demo->estado) }}</p>
                        <p><strong>Fecha subida:</strong> {{ $demo->fecha_subida }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
