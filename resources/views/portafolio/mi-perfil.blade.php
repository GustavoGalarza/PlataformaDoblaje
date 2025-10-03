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

                    {{-- Sección Redes Sociales --}}
                    <div class="mt-4 p-3"
                        style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                        <h6 class="text-center mb-3 fw-bold">Redes Sociales</h6>

                        @if ($perfil->redesSociales->count())
                            <ul class="list-group list-group-flush">
                                @foreach ($perfil->redesSociales as $red)
                                    <li class="list-group-item d-flex align-items-center justify-content-start flex-wrap"
                                        style="background-color: transparent; border: 1px solid rgba(255,255,255,0.2); border-radius:5px; margin-bottom:5px;">
                                        <i class="{{ $red->icono }} me-2 text-white"></i>
                                        <span class="me-2 text-white">{{ $red->nombre }}:</span>
                                        @if ($red->pivot->link)
                                            <a href="{{ $red->pivot->link }}" target="_blank"
                                                class="text-white text-decoration-underline"
                                                style="word-break: break-all; max-width: 100%;">
                                                {{ $red->pivot->link }}
                                            </a>
                                        @else
                                            <span class="text-white">Sin link</span>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-white mb-0">No se han agregado redes sociales.</p>
                        @endif

                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#editRedesSocialesModal">
                                <i class="fa fa-share-alt"></i> Editar Redes Sociales
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
                            @php
                                $creditos = $perfil->creditos ? explode(',', $perfil->creditos) : [];
                            @endphp

                            @if (count($creditos))
                                <ul class="list-unstyled mb-0">
                                    @foreach ($creditos as $credito)
                                        <li>- {{ trim($credito) }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0">No se han agregado créditos.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom pb-2">Formación</h4>
                            @php
                                $formaciones = $perfil->formacion ? explode(',', $perfil->formacion) : [];
                            @endphp

                            @if (count($formaciones))
                                <ul class="list-unstyled mb-0">
                                    @foreach ($formaciones as $formacion)
                                        <li>- {{ trim($formacion) }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0">No se ha agregado formación.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h4 class="border-bottom pb-2">Reconocimientos</h4>
                            @php
                                $reconocimientos = $perfil->reconocimientos
                                    ? explode(',', $perfil->reconocimientos)
                                    : [];
                            @endphp

                            @if (count($reconocimientos))
                                <ul class="list-unstyled mb-0">
                                    @foreach ($reconocimientos as $reconocimiento)
                                        <li>- {{ trim($reconocimiento) }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0">No se han agregado reconocimientos.</p>
                            @endif
                        </div>
                    @else
                        <p>No tienes perfil creado. Usa el botón del modal para crearlo.</p>
                    @endif

                    {{-- Demossss --}}
                    @if ($perfil)
                        <div class="mt-4 p-3"
                            style="background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); border-radius:10px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="mb-0">Demos</h4>
                                <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#addDemoModal">
                                    <i class="fa fa-plus"></i> Agregar Demo
                                </button>
                            </div>

                            {{-- Videos --}}
                            @php
                                $videos = $perfil->demos->where('tipo_archivo', 'video');
                            @endphp
                            @if ($videos->count())
                                <h5 class="mt-3">Videos</h5>
                                <div class="row">
                                    @foreach ($videos as $demo)
                                        <div class="col-md-4 mb-3">
                                            <div class="card bg-dark text-white h-100">
                                                @if ($demo->portada_url)
                                                    <x-cloudinary::image public-id="{{ $demo->portada_url }}"
                                                        class="card-img-top" style="height:180px; object-fit:cover;" />
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center bg-secondary"
                                                        style="height:180px;">
                                                        <i class="fa fa-video fa-3x"></i>
                                                    </div>
                                                @endif
                                                <div class="card-body text-center">
                                                    <p class="card-title mb-2">{{ $demo->titulo }}</p>
                                                    <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                                        data-bs-target="#viewDemoModal-{{ $demo->id_demo }}">
                                                        <i class="fa fa-play"></i> Reproducir
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                                        data-bs-target="#editDemoModal-{{ $demo->id_demo }}">
                                                        <i class="fa fa-edit"></i> Editar
                                                    </button>
                                                    <!-- Botón de eliminación -->
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete({{ $demo->id_demo }})">
                                                        <i class="fa fa-trash"></i> Eliminar
                                                    </button>

                                                    <!-- Formulario oculto -->
                                                    <form id="delete-form-{{ $demo->id_demo }}"
                                                        action="{{ route('demos.destroy', $demo->id_demo) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>



                                                </div>
                                            </div>

                                            {{-- Modal para este demo --}}
                                            @include('portafolio.view-demo', ['demo' => $demo])
                                            @include('portafolio.edit-demo', ['demo' => $demo])

                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Audios --}}
                            @php
                                $audios = $perfil->demos->where('tipo_archivo', 'audio');
                            @endphp
                            @if ($audios->count())
                                <h5 class="mt-3">Audios</h5>
                                <div class="row">
                                    @foreach ($audios as $demo)
                                        <div class="col-md-4 mb-3">
                                            <div class="card bg-dark text-white h-100">
                                                @if ($demo->portada_url)
                                                    <x-cloudinary::image public-id="{{ $demo->portada_url }}"
                                                        class="card-img-top" style="height:180px; object-fit:cover;" />
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center bg-secondary"
                                                        style="height:180px;">
                                                        <i class="fa fa-music fa-3x"></i>
                                                    </div>
                                                @endif
                                                <div class="card-body text-center">
                                                    <p class="card-title mb-2">{{ $demo->titulo }}</p>
                                                    <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                                        data-bs-target="#viewDemoModal-{{ $demo->id_demo }}">
                                                        <i class="fa fa-play"></i> Reproducir
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal"
                                                        data-bs-target="#editDemoModal-{{ $demo->id_demo }}">
                                                        <i class="fa fa-edit"></i> Editar
                                                    </button>

                                                    <!-- Botón de eliminación -->
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete({{ $demo->id_demo }})">
                                                        <i class="fa fa-trash"></i> Eliminar
                                                    </button>

                                                    <!-- Formulario oculto -->
                                                    <form id="delete-form-{{ $demo->id_demo }}"
                                                        action="{{ route('demos.destroy', $demo->id_demo) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>


                                                </div>
                                            </div>

                                            {{-- Modal para este demo --}}
                                            @include('portafolio.view-demo', ['demo' => $demo])
                                            @include('portafolio.edit-demo', ['demo' => $demo])

                                        </div>
                                    @endforeach
                                </div>
                            @endif


                        </div>

                        {{-- Incluir modal para agregar demo --}}
                        @include('portafolio.add-demo', ['perfil' => $perfil])
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
    @if ($perfil)
        @include('portafolio.edit-redes-sociales', [
            'perfil' => $perfil,
            'redes' => \App\Models\RedesSociale::all(),
            'redesSeleccionadas' => $perfil->redesSociales->pluck('id')->toArray(),
        ])
    @endif

    @push('scripts')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar',

                    confirmButtonColor: '#ff4d4f',
                    cancelButtonColor: '#6c757d',

                    // Estilo del modal (dark mode)
                    background: '#2c2c2c', // fondo oscuro
                    color: '#ffffff',
                    iconColor: '#ff4d4f',
                    customClass: {
                        popup: 'swal2-dark-popup',
                        title: 'swal2-dark-title',
                        content: 'swal2-dark-content',
                        confirmButton: 'swal2-dark-confirm',
                        cancelButton: 'swal2-dark-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById('delete-form-' + id);
                        if (form) form.submit();
                    }
                });
            }
        </script>
    @endpush


@endsection
