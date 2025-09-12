@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Redes Sociale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Redes Sociale</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('redes-sociales.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('redes-sociale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
