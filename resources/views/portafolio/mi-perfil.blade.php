@extends('layouts.dashboard')

@section('template_title')
    Mi Portafolio
@endsection

@section('content')
    <div class="container py-5" style=" min-height: 100vh;">
        <div class="card shadow-lg p-4" style="background-color: #1e1e1e; color: #f1f1f1; border-radius: 15px;">

            {{-- Botón superior de Editar --}}
            @if ($perfil)
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('mi-portafolio.edit') }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Editar Perfil
                    </a>

                </div>
            @endif

            <div class="row">

                {{-- Columna izquierda: Foto y datos básicos --}}
                <div class="col-md-4 text-center mb-4">
                    <div style="width:300px; height:300px; overflow:hidden; border-radius:50%; margin:0 auto;">
                        @if ($perfil && $perfil->foto_url)
                            <x-cloudinary::image public-id="{{ $perfil->foto_url }}" width="300" height="300"
                                crop="fill" style="width:100%; height:100%; object-fit:cover;" />
                        @else
                            <i class="fa-solid fa-user fa-7x d-block mx-auto"></i>
                        @endif
                    </div>

                    <h2 class="fw-bold mt-3">{{ $perfil ? $perfil->nombre : 'Mi Perfil' }}</h2>
                    <p class="text-muted"><span class="text-white">{{ $perfil?->email }}</span></p>
                    <p><i class="fa fa-phone"></i> {{ $perfil?->telefono }}</p>
                    <p><i class="fa fa-map-marker-alt"></i> {{ $perfil?->ubicacion }}</p>

                    @if ($perfil)
                        {{-- Sección Idiomas --}}
                        <div class="mt-4 p-3"
                            style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                            <h5>Habilidades Vocales</h5>
                            <h6 class="text-center mb-2 fw-bold">Idiomas Dominados</h6>

                            @if ($perfil->idiomas->count())
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    @foreach ($perfil->idiomas as $idioma)
                                        <span class="badge border text-white px-3 py-1"
                                            style="background-color: transparent;">
                                            {{ $idioma->nombre }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">No se han agregado idiomas.</p>
                            @endif

                            <div class="d-flex justify-content-center mt-2">
                                <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#editIdiomasModal">
                                    <i class="fa fa-language"></i> Editar Idiomas
                                </button>
                            </div>
                        </div>
                        {{-- Sección Tipos de Voz --}}
                        <div class="mt-4 p-3"
                            style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                            <h6 class="text-center mb-2 fw-bold">Tipos de Voz</h6>

                            @if ($perfil->tiposVoz->count())
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    @foreach ($perfil->tiposVoz as $tipo)
                                        <span class="badge border text-white px-3 py-1"
                                            style="background-color: transparent; border-color: rgba(255,255,255,0.5);">
                                            {{ $tipo->nombre }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-white mb-0">No se han agregado tipos de voz.</p>
                            @endif

                            <div class="d-flex justify-content-center mt-2">
                                <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#editTiposVozModal">
                                    <i class="fa fa-microphone"></i> Editar Tipos de Voz
                                </button>
                            </div>
                        </div>
                    @endif


                    {{-- Sección Estilos de Voz --}}
                    <div class="mt-4 p-3"
                        style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                        <h6 class="text-center mb-2 fw-bold">Estilos de Voz</h6>

                        @if ($perfil->estilosVoz->count())
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($perfil->estilosVoz as $estilo)
                                    <span class="badge border text-white px-3 py-1"
                                        style="background-color: transparent; border-color: rgba(255,255,255,0.5);">
                                        {{ $estilo->nombre }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-white mb-0">No se han agregado estilos de voz.</p>
                        @endif

                        <div class="d-flex justify-content-center mt-2">
                            <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#editEstilosVozModal">
                                <i class="fa fa-music"></i> Editar Estilos de Voz
                            </button>
                        </div>
                    </div>

                    {{-- Sección Rangos Vocales --}}
                    <div class="mt-4 p-3"
                        style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                        <h6 class="text-center mb-2 fw-bold">Rangos Vocales</h6>

                        @if ($perfil->rangosVocales->count())
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($perfil->rangosVocales as $rango)
                                    <span class="badge border text-white px-3 py-1"
                                        style="background-color: transparent; border-color: rgba(255,255,255,0.5);">
                                        {{ $rango->nombre }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-white mb-0">No se han agregado rangos vocales.</p>
                        @endif

                        <div class="d-flex justify-content-center mt-2">
                            <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#editRangosVocalesModal">
                                <i class="fa fa-sliders-h"></i> Editar Rangos Vocales
                            </button>
                        </div>
                    </div>

                    {{-- Sección Timbres de Voz --}}
                    <div class="mt-4 p-3"
                        style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                        <h6 class="text-center mb-2 fw-bold">Timbres de Voz</h6>

                        @if ($perfil->timbresVoz->count())
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($perfil->timbresVoz as $timbre)
                                    <span class="badge border text-white px-3 py-1"
                                        style="background-color: transparent; border-color: rgba(255,255,255,0.5);">
                                        {{ $timbre->nombre }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-white mb-0">No se han agregado timbres de voz.</p>
                        @endif

                        <div class="d-flex justify-content-center mt-2">
                            <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#editTimbresVozModal">
                                <i class="fa fa-music"></i> Editar Timbres de Voz
                            </button>
                        </div>
                    </div>

                    {{-- Sección Acentos y Dialectos --}}
                    <div class="mt-4 p-3"
                        style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                        <h6 class="text-center mb-2 fw-bold">Acentos y Dialectos</h6>

                        @if ($perfil->acentosDialectos->count())
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                @foreach ($perfil->acentosDialectos as $acento)
                                    <span class="badge border text-white px-3 py-1"
                                        style="background-color: transparent; border-color: rgba(255,255,255,0.5);">
                                        {{ $acento->nombre }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-white mb-0">No se han agregado acentos ni dialectos.</p>
                        @endif

                        <div class="d-flex justify-content-center mt-2">
                            <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#editAcentosDialectosModal">
                                <i class="fa fa-globe"></i> Editar Acentos/Dialectos
                            </button>
                        </div>
                    </div>



                </div>
                {{-- Columna derecha: Información detallada --}}
                <div class="col-md-8">
                    @if ($perfil)
                        <div class="mb-4">
                            <h4 class="border-bottom ">Biografía</h4>
                            <p>{{ $perfil->biografia }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom ">Disponibilidad</h4>
                            <p>{{ $perfil->disponibilidad }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom ">Habilidades</h4>
                            <ul class="list-unstyled">
                                <li><strong>Dicción y articulación:</strong> {{ $perfil->diccion_articulacion }}</li>
                                <li><strong>Actuación de emociones:</strong> {{ $perfil->actuacion_emociones }}</li>
                                <li><strong>Advertencia vocal:</strong> {{ $perfil->advertencia_vocal }}</li>
                                <li><strong>Home Studio:</strong> {{ $perfil->home_studio }}</li>
                                <li><strong>Edición/Postproducción:</strong> {{ $perfil->edicion_postproduccion }}</li>
                                <li><strong>Entregas/Flujo de trabajo:</strong> {{ $perfil->entregas_flujo_trabajo }}</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom pb-2">Créditos</h4>
                            <p>{{ $perfil->creditos }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom pb-2">Formación</h4>
                            <p>{{ $perfil->formacion }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom pb-2">Reconocimientos</h4>
                            <p>{{ $perfil->reconocimientos }}</p>
                        </div>
                    @else
                        <p>No tienes perfil creado. Usa el botón del modal para crearlo.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($perfil)
        @include('portafolio.edit-idiomas', [
            'perfil' => $perfil,
            'idiomas' => \App\Models\Idioma::all(),
            'idiomasPerfil' => $perfil->idiomas->pluck('id')->toArray(),
        ])
    @endif
    @if ($perfil)
        @include('portafolio.edit-tipos-voz', [
            'perfil' => $perfil,
            'tiposVoz' => \App\Models\TipoVoz::all(),
            'tiposSeleccionados' => $perfil->tiposVoz->pluck('id')->toArray(),
        ])
    @endif
    @if ($perfil)
        @include('portafolio.edit-estilos-voz', [
            'perfil' => $perfil,
            'estilosVoz' => \App\Models\EstilosVoz::all(),
            'estilosSeleccionados' => $perfil->estilosVoz->pluck('id')->toArray(),
        ])
    @endif
    @if ($perfil)
        @include('portafolio.edit-rangos-vocales', [
            'perfil' => $perfil,
            'rangos' => \App\Models\RangoVocal::all(),
            'rangosSeleccionados' => $perfil->rangosVocales->pluck('id')->toArray(),
        ])
    @endif
    @if ($perfil)
        @include('portafolio.edit-timbres-voz', [
            'perfil' => $perfil,
            'timbres' => \App\Models\TimbreVoz::all(),
            'timbresSeleccionados' => $perfil->timbresVoz->pluck('id')->toArray(),
        ])
    @endif
    @if ($perfil)
        @include('portafolio.edit-acentos-dialectos', [
            'perfil' => $perfil,
            'acentos' => \App\Models\AcentosDialecto::all(),
            'acentosSeleccionados' => $perfil->acentosDialectos->pluck('id')->toArray(),
        ])
    @endif

@endsection
