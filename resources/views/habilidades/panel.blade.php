@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 text-center">Panel de Habilidades</h1>

        {{-- Idiomas --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Idiomas</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createIdiomaModal">Agregar
                    Idioma</button>
            </div>
            <div class="card-body">
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
                                        data-bs-target="#viewIdiomaModal-{{ $idioma->id }}"><i
                                            class="fa fa-eye"></i>Ver</button>
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editIdiomaModal-{{ $idioma->id }}"><i
                                            class="fa fa-edit"></i>Editar</button>
                                    {{-- Eliminar --}}
                                    <form action="{{ route('idiomas.destroy', $idioma->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Seguro quieres eliminar?')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modales de Ver y Edit --}}
                            @include('habilidades.modals.idioma.view', ['idioma' => $idioma])
                            @include('habilidades.modals.idioma.edit', ['idioma' => $idioma])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Tipo de Voz --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Tipos de Voz</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createTipoVozModal">
                    + Agregar Tipo de Voz
                </button>
            </div>
            <div class="card-body table-responsive">
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
                                        <i class="fa fa-eye"></i>Ver
                                    </button>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editTipoVozModal-{{ $tipo->id }}">
                                        <i class="fa fa-edit"></i>Editar
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
                            @include('habilidades.modals.tipo.view', ['tipo' => $tipoVozs])
                            @include('habilidades.modals.tipo.edit', ['tipo' => $tipoVozs])
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{-- Estilos de Voz --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Estilos de Voz</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createEstiloVozModal">
                    + Agregar Estilo de Voz
                </button>
            </div>
            <div class="card-body table-responsive">
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
                                    {{-- View --}}
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewEstiloVozModal-{{ $estilo->id }}">
                                        <i class="fa fa-eye"></i>Ver
                                    </button>
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editEstiloVozModal-{{ $estilo->id }}">
                                        <i class="fa fa-edit"></i>Editar
                                    </button>
                                    {{-- Delete --}}
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
                            @include('habilidades.modals.estilo.view', ['estilo' => $estilosVozs])
                            @include('habilidades.modals.estilo.edit', ['estilo' => $estilosVozs])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Rangos Vocales --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Rangos Vocales</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createRangoVocalModal">
                    + Agregar Rango Vocal
                </button>
            </div>
            <div class="card-body table-responsive">
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
                                    {{-- View --}}
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewRangoVocalModal-{{ $rango->id }}">
                                        <i class="fa fa-eye"></i> Ver
                                    </button>
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editRangoVocalModal-{{ $rango->id }}">
                                        <i class="fa fa-edit"></i> Editar
                                    </button>
                                    {{-- Delete --}}
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

        {{-- Timbres de Voz --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Timbres de Voz</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createTimbreVozModal">
                    + Agregar Timbre de Voz
                </button>
            </div>
            <div class="card-body table-responsive">
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
                                    {{-- View --}}
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewTimbreVozModal-{{ $timbre->id }}">
                                        <i class="fa fa-eye"></i> Ver
                                    </button>
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editTimbreVozModal-{{ $timbre->id }}">
                                        <i class="fa fa-edit"></i> Editar
                                    </button>
                                    {{-- Delete --}}
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

        {{-- Acentos y Dialectos --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Acentos y Dialectos</h5>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#createAcentoDialectoModal">
                    + Agregar Acento/Dialecto
                </button>
            </div>
            <div class="card-body table-responsive">
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
                                    {{-- View --}}
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#viewAcentoDialectoModal-{{ $acento->id }}">
                                        <i class="fa fa-eye"></i> Ver
                                    </button>
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editAcentoDialectoModal-{{ $acento->id }}">
                                        <i class="fa fa-edit"></i> Editar
                                    </button>
                                    {{-- Delete --}}
                                    <form action="{{ route('acentos-dialectos.destroy', $acento->id) }}" method="POST"
                                        style="display:inline;">
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

    {{-- Modal para crear idioma --}}
    @include('habilidades.modals.idioma.create')
    @include('habilidades.modals.tipo.create')
    @include('habilidades.modals.estilo.create')
    @include('habilidades.modals.rango.create')
    @include('habilidades.modals.timbre.create')
    @include('habilidades.modals.acento.create')
@endsection
