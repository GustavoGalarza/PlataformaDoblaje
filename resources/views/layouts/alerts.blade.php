{{-- resources/views/layouts/alerts.blade.php --}}
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ $message }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '{{ $message }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif
@endpush
