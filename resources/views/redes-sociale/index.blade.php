@extends('layouts.dashboard')

@section('template_title')
    Redes Sociales
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span id="card_title">{{ __('Redes Sociales') }}</span>
                    <a href="{{ route('redes-sociales.create') }}" class="btn btn-primary btn-sm">
                        {{ __('Crear Nueva') }}
                    </a>
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
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Icono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($redesSociales as $red)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $red->nombre }}</td>
                                        <td>{{ $red->descripcion }}</td>
                                        <!-- Mostrar icono real -->
                                        <td><i class="{{ $red->icono }} fa-lg"></i></td>
                                        <td>
                                            <form action="{{ route('redes-sociales.destroy', $red->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('redes-sociales.show', $red->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('redes-sociales.edit', $red->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault(); confirm('¿Seguro que deseas eliminar?') ? this.closest('form').submit() : false;">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $redesSociales->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
