@extends('layouts.dashboard')

@section('template_title')
    Perfiles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Perfiles') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('perfiles.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nuevo perfil') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>User Id</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Email</th>
                                        <th>Telefono</th>                                      
                                        <th>Ubicacion</th>
                                        <th>Foto Url</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perfiles as $perfile)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $perfile->user_id }}</td>
                                            <td>{{ $perfile->nombre }}</td>
                                            <td>{{ $perfile->edad }}</td>
                                            <td>{{ $perfile->email }}</td>
                                            <td>{{ $perfile->telefono }}</td>
                                            <td>{{ $perfile->ubicacion }}</td>
                                            <td>
                                                @if ($perfile->foto_url)
                                                    <x-cloudinary::image public-id="{{ $perfile->foto_url }}"
                                                        width="200" height="150" crop="fit" />
                                                @else
                                                    <span class="badge bg-secondary">No hay imagen</span>
                                                @endif
                                            </td>
                                            <td>{{ $perfile->estado }}</td>

                                            <td>
                                                <form action="{{ route('perfiles.destroy', $perfile->id_perfil) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('perfiles.show', $perfile->id_perfil) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mirar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('perfiles.edit', $perfile->id_perfil) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $perfiles->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
