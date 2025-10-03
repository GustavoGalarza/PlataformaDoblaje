@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-2 text-white">🔎 Búsqueda Avanzada de Portafolios</h2>

    <form action="{{ route('busqueda.portafolios') }}" method="GET" class="mb-4">
        <!-- Barra de búsqueda -->
        <div class="input-group mb-2">
            <input type="text" name="q" class="form-control bg-dark text-white border-secondary"
                   placeholder="Buscar por nombre, email, ubicación..."
                   value="{{ request('q') }}">
            <button class="btn btn-primary ">Buscar</button>
        </div>

        <!-- Filtros -->
        <div class="mb-1">
            <h5 class="text-white mb-1">Filtros</h5>

            @php
                $filtros = [
                    'Idiomas' => ['items' => $idiomas, 'name' => 'idiomas'],
                    'Tipos de Voz' => ['items' => $tiposVoz, 'name' => 'tiposVoz'],
                    'Estilos de Voz' => ['items' => $estilosVoz, 'name' => 'estilosVoz'],
                    'Rangos Vocales' => ['items' => $rangosVocales, 'name' => 'rangosVocales'],
                    'Timbres de Voz' => ['items' => $timbresVoz, 'name' => 'timbresVoz'],
                    'Acentos/Dialectos' => ['items' => $acentos, 'name' => 'acentosDialectos'],
                ];
            @endphp

            @foreach($filtros as $titulo => $data)
                <div class="mb-0 d-flex align-items-center">
                    <h6 class="text-light me-0 mb-0" style="min-width: 150px;">{{ $titulo }}:</h6>
                    <div class="scroll-container flex-grow-1">
                        @foreach($data['items'] as $item)
                            @php
                                $checked = in_array($item->id, request($data['name'], [])) ? 'checked' : '';
                                $id = $data['name'].$item->id;
                            @endphp
                            <input type="checkbox" class="btn-check" name="{{ $data['name'] }}[]"
                                   value="{{ $item->id }}" id="{{ $id }}" autocomplete="off" {{ $checked }}>
                            <label class="btn btn-outline-light me-1 mb-1 filtro-btn" for="{{ $id }}">
                                {{ $item->nombre }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Resultados -->
        <div>
            <h5 class="text-white">Resultados</h5>
            <div class="row">
                @forelse ($perfiles as $perfil)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-white h-100 shadow-sm border-secondary">
                            <div class="card-body text-center">
                                @if($perfil->foto_url)
                                    <x-cloudinary::image public-id="{{ $perfil->foto_url }}" class="img-fluid rounded-circle mb-2 border border-secondary" width="120" height="120" crop="fill"/>
                                @else
                                    <img src="https://via.placeholder.com/120" class="rounded-circle mb-2 border border-secondary" alt="Sin foto">
                                @endif

                                <h5>{{ $perfil->nombre }}</h5>
                                <p class="mb-1"><i class="fa fa-envelope"></i> {{ $perfil->email }}</p>
                                <p class="mb-1"><i class="fa fa-map-marker-alt"></i> {{ $perfil->ubicacion }}</p>
                                <p class="mb-1"><i class="fa fa-birthday-cake"></i> {{ $perfil->edad }} años</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-white">No se encontraron resultados.</p>
                @endforelse
            </div>

            <div class="mt-3">
                {!! $perfiles->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </form>
</div>

<style>
/* Scroll horizontal con ocultación de scrollbar */
.scroll-container {
    display: flex;
    overflow-x: auto;
    overflow-y: hidden;
    gap: 0.5rem;
    -webkit-overflow-scrolling: touch;
    scroll-behavior: smooth;
    cursor: grab;
}

/* Ocultar scrollbar */
.scroll-container::-webkit-scrollbar {
    display: none;
}
.scroll-container {
    -ms-overflow-style: none;  /* IE 10+ */
    scrollbar-width: none;  /* Firefox */
}

/* Botones de filtros */
.filtro-btn {
    background-color: #2c2c2c;
    border: 1px solid #555;
    color: #fff;
    transition: 0.3s;
    white-space: nowrap;
}
.btn-check:checked + .filtro-btn {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
}
.filtro-btn:hover {
    background-color: #444;
    color: #fff;
}
</style>

<script>
document.querySelectorAll('.scroll-container').forEach(container => {
    let isDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isDown = true;
        container.style.cursor = 'grabbing';
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
    });
    container.addEventListener('mouseleave', () => { isDown = false; container.style.cursor = 'grab'; });
    container.addEventListener('mouseup', () => { isDown = false; container.style.cursor = 'grab'; });
    container.addEventListener('mousemove', (e) => {
        if(!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 1.5; // velocidad
        container.scrollLeft = scrollLeft - walk;
    });

    // Shift + rueda
    container.addEventListener('wheel', (e) => {
        if(e.shiftKey) {
            e.preventDefault();
            container.scrollLeft += e.deltaY;
        }
    });
});
</script>
@endsection
