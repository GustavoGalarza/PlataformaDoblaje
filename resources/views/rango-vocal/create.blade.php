@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} Rango Vocal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Rango Vocal</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('rango-vocals.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('rango-vocal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
