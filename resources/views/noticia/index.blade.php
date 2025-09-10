@extends('layouts.dashboard')

@section('template_title')
    Noticias
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span id="card_title">{{ __('Noticias') }}</span>
                        <a href="{{ route('noticias.create') }}" class="btn btn-primary btn-sm">{{ __('Crear Noticia') }}</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Título</th>
                                        <th>Imagen</th> {{-- Nueva columna --}}
                                        <th>Tipo Publicación</th>
                                        <th>Fecha Publicación</th>
                                        <th>Fecha Evento</th>
                                        <th>Requiere Inscripción</th>
                                        <th>Certificado</th>
                                        <th>Estado</th>
                                        <th>Creado por</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noticias as $noticia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $noticia->titulo }}</td>
                                            <td>
                                                @if ($noticia->archivo_url)
                                                    <img src="{{ asset('storage/' . $noticia->archivo_url) }}"
                                                        alt="Imagen de la noticia" width="80" class="img-thumbnail">
                                                @else
                                                    <span class="badge bg-secondary">Sin imagen</span>
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($noticia->tipo_publicacion) }}</td>
                                            <td>{{ $noticia->fecha_publicacion }}</td>
                                            <td>{{ $noticia->fecha_evento }}</td>
                                            <td>{{ $noticia->requiere_inscripcion ? 'Sí' : 'No' }}</td>
                                            <td>{{ $noticia->certificado ? 'Sí' : 'No' }}</td>
                                            <td>
                                                @php
                                                    $estados = [
                                                        'no_iniciado' => 'No iniciado',
                                                        'en_curso' => 'En curso',
                                                        'finalizado' => 'Finalizado',
                                                    ];
                                                @endphp
                                                {{ $estados[$noticia->estado] ?? $noticia->estado }}
                                            </td>
                                            <td>
                                                @if ($noticia->user)
                                                    @php
                                                        switch ($noticia->user->rol->nombre ?? null) {
                                                            case 'Admin':
                                                                $roleBadge = 'badge bg-danger';
                                                                break;
                                                            case 'Directora':
                                                                $roleBadge = 'badge bg-warning text-dark';
                                                                break;
                                                            case 'Estudiante':
                                                                $roleBadge = 'badge bg-success';
                                                                break;
                                                            default:
                                                                $roleBadge = 'badge bg-secondary';
                                                                break;
                                                        }
                                                    @endphp
                                                    <span>{{ $noticia->user->name }}</span>
                                                    <span
                                                        class="{{ $roleBadge }}">{{ $noticia->user->rol->nombre ?? 'N/A' }}</span>
                                                @else
                                                    <span class="badge bg-secondary">Desconocido</span>
                                                @endif
                                            </td>
                                            <td>
                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('noticias.show', $noticia->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> Ver
                                                </a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('noticias.edit', $noticia->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Editar
                                                </a>
                                                <!-- Botón de eliminación -->
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete({{ $noticia->id }})">
                                                    <i class="fa fa-fw fa-trash"></i> Eliminar
                                                </button>
                                                <!-- Formulario oculto -->
                                                <form id="delete-form-{{ $noticia->id }}"
                                                    action="{{ route('noticias.destroy', $noticia->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $noticias->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
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
