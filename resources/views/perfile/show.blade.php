@extends('layouts.dashboard')

@section('template_title')
    {{ $perfile->name ?? __('Show') . ' ' . __('Perfile') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Perfile</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('perfiles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Id Perfil:</strong>
                            {{ $perfile->id_perfil }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            {{ $perfile->user_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $perfile->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Edad:</strong>
                            {{ $perfile->edad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Email:</strong>
                            {{ $perfile->email }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Telefono:</strong>
                            {{ $perfile->telefono }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Biografia:</strong>
                            {{ $perfile->biografia }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Ubicacion:</strong>
                            {{ $perfile->ubicacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Disponibilidad:</strong>
                            {{ $perfile->disponibilidad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Diccion Articulacion:</strong>
                            {{ $perfile->diccion_articulacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Actuacion Emociones:</strong>
                            {{ $perfile->actuacion_emociones }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Advertencia Vocal:</strong>
                            {{ $perfile->advertencia_vocal }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Home Studio:</strong>
                            {{ $perfile->home_studio }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Edicion Postproduccion:</strong>
                            {{ $perfile->edicion_postproduccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Entregas Flujo Trabajo:</strong>
                            {{ $perfile->entregas_flujo_trabajo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Creditos:</strong>
                            {{ $perfile->creditos }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Formacion:</strong>
                            {{ $perfile->formacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Reconocimientos:</strong>
                            {{ $perfile->reconocimientos }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Foto Url:</strong>
                            <td>
                                @if ($perfile->foto_url)
                                    <x-cloudinary::image public-id="{{ $perfile->foto_url }}" width="300" height="250"
                                        crop="fit" />
                                @else
                                    <span class="badge bg-secondary">No hay imagen</span>
                                @endif
                            </td>
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Estado:</strong>
                            {{ $perfile->estado }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
