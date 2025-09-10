@extends('layouts.dashboard')

@section('template_title')
    {{ $noticia->name ?? __('Show') . ' ' . __('Noticia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Noticia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('noticias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            {{ $noticia->user_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Titulo:</strong>
                            {{ $noticia->titulo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Contenido:</strong>
                            {{ $noticia->contenido }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo Publicacion:</strong>
                            {{ $noticia->tipo_publicacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Imagen:</strong><br>
                            @if ($noticia->archivo_url)
                                <img src="{{ asset('storage/' . $noticia->archivo_url) }}" alt="Imagen de la noticia"
                                    width="200" class="img-fluid rounded">
                            @else
                                <span class="badge bg-secondary">Sin imagen</span>
                            @endif
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Publicacion:</strong>
                            {{ $noticia->fecha_publicacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Evento:</strong>
                            {{ $noticia->fecha_evento }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Lugar:</strong>
                            {{ $noticia->lugar }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Enlace Transmision:</strong>
                            {{ $noticia->enlace_transmision }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Requiere Inscripcion:</strong>
                            {{ $noticia->requiere_inscripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Certificado:</strong>
                            {{ $noticia->certificado }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Estado:</strong>
                            {{ $noticia->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
