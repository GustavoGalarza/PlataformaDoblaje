<div class="row p-1">
    <div class="col-md-12">
        <!-- Name -->
        <div class="form-group mb-2">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name" required>
            {!! $errors->first('name', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <!-- Email -->
        <div class="form-group mb-2">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="Email" required>
            {!! $errors->first('email', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <!-- Password -->
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="password" placeholder="Password">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            @if ($user?->id)
                <small class="form-text text-muted">Dejar en blanco para mantener la contraseña actual.</small>
            @endif
        </div>

        <div class="form-group mb-2 mb20">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Confirm Password">
        </div>


        <!-- Rol -->
        <div class="form-group mb-2 mb20">
            <label for="rol_id" class="form-label">{{ __('Rol') }}</label>
            <select name="rol_id" id="rol_id" class="form-control @error('rol_id') is-invalid @enderror" required>
                <option value="">-- Selecciona un rol --</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}"
                        {{ old('rol_id', $user?->rol_id) == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('rol_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <!-- Submit -->
    <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary">{{ $user?->id ? 'Actualizar' : 'Crear' }}</button>
    </div>
</div>
<!--todo funciona create y edit-->
