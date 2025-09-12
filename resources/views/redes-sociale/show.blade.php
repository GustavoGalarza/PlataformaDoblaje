@extends('layouts.dashboard')

@section('template_title')
    {{ $redesSociale->name ?? __('Show') . " " . __('Redes Sociale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Redes Sociale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('redes-sociales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $redesSociale->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $redesSociale->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Icono:</strong>
                                    {{ $redesSociale->icono }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
