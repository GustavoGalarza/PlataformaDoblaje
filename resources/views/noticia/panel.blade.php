@extends('layouts.dashboard') <!-- Usa tu layout principal o uno nuevo minimalista -->

@section('content')
    <style>
        .card {
            border-radius: 12px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .modal.fade .modal-dialog {
            transform: scale(0.9);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }
    </style>
    <div class="container my-4">
        <h1 class="mb-4 text-center">Noticias</h1>
        <div class="row g-4">
            @foreach ($noticias as $noticia)
                {{-- Modal para ver la imagen en grande --}}
                <div class="modal fade" id="imagenModal-{{ $noticia->id_noticia }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-dark position-relative">
                            {{-- Botón X en la esquina superior derecha --}}
                            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                                data-bs-dismiss="modal" aria-label="Cerrar"></button>

                            <div class="modal-body text-center p-0">
                                <x-cloudinary::image public-id="{{ $noticia->archivo_url }}" class="img-fluid rounded w-100"
                                    alt="{{ $noticia->titulo }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-sm mb-4"
                        style="display: flex; flex-direction: row; background-color: rgb(240, 240, 240);">
                        {{-- Imagen a la izquierda (40%) --}}
                        <div style="flex: 0 0 40%; display: flex; flex-direction: column; align-items: center; padding-left: 10px; padding-top: 10px;">
                            @if ($noticia->archivo_url)
                                {{-- Imagen clickeable --}}
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#imagenModal-{{ $noticia->id_noticia }}">
                                    <x-cloudinary::image public-id="{{ $noticia->archivo_url }}" class="img-fluid rounded"
                                        style="max-height: 220px; width: 100%; object-fit: contain;"
                                        alt="{{ $noticia->titulo }}" />
                                </a>
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-secondary text-white"
                                    style="height: 220px; width: 100%;">
                                    Sin Imagen
                                </div>
                            @endif

                            {{-- Fechas debajo de la imagen --}}
                            <div class="bg-light text-center py-2 mt-2 rounded w-100">
                                @if ($noticia->fecha_publicacion)
                                    <small class="text-muted d-block">
                                        Publicado:
                                        {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d M Y H:i') }}
                                    </small>
                                @endif
                                @if ($noticia->fecha_evento)
                                    <small class="text-muted d-block">
                                        Evento: {{ \Carbon\Carbon::parse($noticia->fecha_evento)->format('d M Y H:i') }}
                                    </small>
                                @endif
                            </div>
                        </div>

                        {{-- Contenido a la derecha (60%) --}}
                        <div style="flex: 0 0 60%; padding: 1rem; display: flex; flex-direction: column;">
                            {{-- Autor y rol --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    @if ($noticia->user)
                                       
                                        <span class="fs-4 fw-bold">{{ $noticia->user->name }}</span>
                                       
                                    @else
                                        <span class="badge bg-secondary">Desconocido</span>
                                    @endif
                                </div>

                                {{-- Tipo de publicación --}}
                                @php
                                    switch ($noticia->tipo_publicacion) {
                                        case 'taller':
                                            $tipoClass = 'badge bg-info fs-5 fw-bold';
                                            break;
                                        case 'masterclass':
                                            $tipoClass = 'badge bg-primary fs-5 fw-bold';
                                            break;
                                        case 'webinar':
                                            $tipoClass = 'badge bg-warning text-dark fs-5 fw-bold';
                                            break;
                                        case 'evento':
                                            $tipoClass = 'badge bg-success fs-5 fw-bold';
                                            break;
                                        case 'anuncio':
                                            $tipoClass = 'badge bg-secondary fs-5 fw-bold';
                                            break;
                                        default:
                                            $tipoClass = 'badge bg-dark fs-5 fw-bold';
                                            break;
                                    }
                                @endphp
                                <span class="{{ $tipoClass }}">{{ ucfirst($noticia->tipo_publicacion) }}</span>
                            </div>

                            {{-- Título --}}
                            <h4 class="card-title">{{ $noticia->titulo }}</h4>

                            {{-- Contenido --}}
                            <p class="card-text" style="flex: 1;">{{ $noticia->contenido }}</p>

                            {{-- Lugar y enlace --}}
                            <p class="mb-1"><strong>Lugar:</strong> {{ $noticia->lugar ?? 'No especificado' }}</p>
                            @if ($noticia->enlace_transmision)
                                <p>
                                    <strong>Enlace:</strong>
                                    <a href="{{ $noticia->enlace_transmision }}"
                                        target="_blank">{{ $noticia->enlace_transmision }}</a>
                                </p>
                            @endif

                            {{-- Inscripción, certificado, estado --}}
                            <div class="mt-2 d-flex flex-wrap gap-2">
                                <span class="badge {{ $noticia->requiere_inscripcion ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $noticia->requiere_inscripcion ? 'Inscripción: Sí' : 'Inscripción: No' }}
                                </span>
                                <span class="badge {{ $noticia->certificado ? 'bg-info' : 'bg-secondary' }}">
                                    {{ $noticia->certificado ? 'Certificado: Sí' : 'Certificado: No' }}
                                </span>
                                <span
                                    class="badge {{ $noticia->estado == 'en_curso' ? 'bg-warning' : ($noticia->estado == 'finalizado' ? 'bg-success' : 'bg-secondary') }}">
                                    Estado: {{ ucfirst(str_replace('_', ' ', $noticia->estado)) }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $noticias->links() }}
    </div>
@endsection
