@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-center">Panel de Habilidades</h1>

        <div class="accordion" id="accordionHabilidades">

            {{-- Idiomas --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingIdiomas">
                    <button class="accordion-button collapsed" type="button" data-bs-target="#collapseIdiomas"
                        aria-expanded="false" aria-controls="collapseIdiomas">
                        Idiomas
                    </button>
                </h2>
                <div id="collapseIdiomas" class="accordion-collapse collapse" aria-labelledby="headingIdiomas"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createIdiomaModal">
                                + Agregar Idioma
                            </button>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($idiomas as $idioma)
                                    <tr>
                                        <td>{{ $idioma->id }}</td>
                                        <td>{{ $idioma->nombre }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewIdiomaModal-{{ $idioma->id }}">
                                                <i class="fa fa-eye"></i> Ver
                                            </button>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editIdiomaModal-{{ $idioma->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                            <form action="{{ route('idiomas.destroy', $idioma->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro quieres eliminar?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('habilidades.modals.idioma.view', ['idioma' => $idioma])
                                    @include('habilidades.modals.idioma.edit', ['idioma' => $idioma])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Tipos de Voz --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTipoVoz">
                    <button class="accordion-button collapsed" type="button" 
                        data-bs-target="#collapseTipoVoz" aria-expanded="false" aria-controls="collapseTipoVoz">
                        Tipos de Voz
                    </button>
                </h2>
                <div id="collapseTipoVoz" class="accordion-collapse collapse" aria-labelledby="headingTipoVoz" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createTipoVozModal">
                                + Agregar Tipo de Voz
                            </button>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipoVozs as $i => $tipo)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $tipo->nombre }}</td>
                                        <td>{{ $tipo->descripcion }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewTipoVozModal-{{ $tipo->id }}">
                                                <i class="fa fa-eye"></i> Ver
                                            </button>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editTipoVozModal-{{ $tipo->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                            <form action="{{ route('tipo-vozs.destroy', $tipo->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro deseas eliminar?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('habilidades.modals.tipo.view', ['tipo' => $tipo])
                                    @include('habilidades.modals.tipo.edit', ['tipo' => $tipo])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Estilos de Voz --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEstilos">
                    <button class="accordion-button collapsed" type="button" 
                        data-bs-target="#collapseEstilos" aria-expanded="false" aria-controls="collapseEstilos">
                        Estilos de Voz
                    </button>
                </h2>
                <div id="collapseEstilos" class="accordion-collapse collapse" aria-labelledby="headingEstilos" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createEstiloVozModal">
                                + Agregar Estilo de Voz
                            </button>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estilosVozs as $i => $estilo)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $estilo->nombre }}</td>
                                        <td>{{ $estilo->descripcion }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewEstiloVozModal-{{ $estilo->id }}">
                                                <i class="fa fa-eye"></i> Ver
                                            </button>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editEstiloVozModal-{{ $estilo->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                            <form action="{{ route('estilos-vozs.destroy', $estilo->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro deseas eliminar?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('habilidades.modals.estilo.view', ['estilo' => $estilo])
                                    @include('habilidades.modals.estilo.edit', ['estilo' => $estilo])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Rangos Vocales --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRangos">
                    <button class="accordion-button collapsed" type="button" 
                        data-bs-target="#collapseRangos" aria-expanded="false" aria-controls="collapseRangos">
                        Rangos Vocales
                    </button>
                </h2>
                <div id="collapseRangos" class="accordion-collapse collapse" aria-labelledby="headingRangos" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createRangoVocalModal">
                                + Agregar Rango Vocal
                            </button>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rangoVocals as $i => $rango)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $rango->nombre }}</td>
                                        <td>{{ $rango->descripcion }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewRangoVocalModal-{{ $rango->id }}">
                                                <i class="fa fa-eye"></i> Ver
                                            </button>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editRangoVocalModal-{{ $rango->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                            <form action="{{ route('rango-vocals.destroy', $rango->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro deseas eliminar este Rango Vocal?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('habilidades.modals.rango.view', ['rango' => $rango])
                                    @include('habilidades.modals.rango.edit', ['rango' => $rango])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Timbres de Voz --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTimbres">
                    <button class="accordion-button collapsed" type="button" 
                        data-bs-target="#collapseTimbres" aria-expanded="false" aria-controls="collapseTimbres">
                        Timbres de Voz
                    </button>
                </h2>
                <div id="collapseTimbres" class="accordion-collapse collapse" aria-labelledby="headingTimbres" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createTimbreVozModal">
                                + Agregar Timbre de Voz
                            </button>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timbreVozs as $i => $timbre)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $timbre->nombre }}</td>
                                        <td>{{ $timbre->descripcion }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewTimbreVozModal-{{ $timbre->id }}">
                                                <i class="fa fa-eye"></i> Ver
                                            </button>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editTimbreVozModal-{{ $timbre->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                            <form action="{{ route('timbre-vozs.destroy', $timbre->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro deseas eliminar este Timbre de Voz?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('habilidades.modals.timbre.view', ['timbre' => $timbre])
                                    @include('habilidades.modals.timbre.edit', ['timbre' => $timbre])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Acentos y Dialectos --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingAcentos">
                    <button class="accordion-button collapsed" type="button" 
                        data-bs-target="#collapseAcentos" aria-expanded="false" aria-controls="collapseAcentos">
                        Acentos y Dialectos
                    </button>
                </h2>
                <div id="collapseAcentos" class="accordion-collapse collapse" aria-labelledby="headingAcentos" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createAcentoDialectoModal">
                                + Agregar Acento/Dialecto
                            </button>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acentosDialectos as $i => $acento)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $acento->nombre }}</td>
                                        <td>{{ $acento->descripcion }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewAcentoDialectoModal-{{ $acento->id }}">
                                                <i class="fa fa-eye"></i> Ver
                                            </button>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editAcentoDialectoModal-{{ $acento->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                            <form action="{{ route('acentos-dialectos.destroy', $acento->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Seguro deseas eliminar este Acento/Dialecto?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('habilidades.modals.acento.view', ['acento' => $acento])
                                    @include('habilidades.modals.acento.edit', ['acento' => $acento])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        document.querySelectorAll('.accordion-button').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetSelector = this.getAttribute('data-bs-target');
                const collapse = document.querySelector(targetSelector);

                let bsCollapse = bootstrap.Collapse.getInstance(collapse);
                if (!bsCollapse) {
                    bsCollapse = new bootstrap.Collapse(collapse, {
                        toggle: false
                    });
                }

                if (collapse.classList.contains('show')) {
                    bsCollapse.hide();
                } else {
                    bsCollapse.show();
                }
            });
        });
    </script>



    {{-- Modales Create --}}
    @include('habilidades.modals.idioma.create')
    @include('habilidades.modals.tipo.create')
    @include('habilidades.modals.estilo.create')
    @include('habilidades.modals.rango.create')
    @include('habilidades.modals.timbre.create')
    @include('habilidades.modals.acento.create')
@endsection
