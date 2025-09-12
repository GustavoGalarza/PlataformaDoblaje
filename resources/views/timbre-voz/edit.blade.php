@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Timbre Voz
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Timbre Voz</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('timbre-vozs.update', $timbreVoz->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('timbre-voz.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
