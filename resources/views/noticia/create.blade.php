@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Noticia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Crear') }} Noticia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('noticias.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('noticias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('noticia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
