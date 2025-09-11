{{-- resources/views/home.blade.php --}}
@extends('layouts.dashboard')

@section('content')
@php
use Illuminate\Support\Facades\Auth;
@endphp
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">🏠 Dashboard</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h5>¡Bienvenido, {{ Auth::user()->name }}! 🎉</h5>
            <p class="text-muted mb-0">
                Has iniciado sesión correctamente.  
                Desde el menú lateral puedes acceder a tu <strong>Perfil</strong>, gestionar tus <strong>Proyectos</strong> o cerrar sesión.
            </p>
        </div>
    </div>
@endsection
