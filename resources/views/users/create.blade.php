@extends('layouts.panel')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar nuevo empleado</h1>
    </div>
    <div class="card shadow mb-4" style="max-width: 800px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datos personales y de acceso</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="card_id" class="form-label">Cédula / ID</label>
                        <input type="text" class="form-control @error('card_id') is-invalid @enderror" id="card_id" name="card_id" value="{{ old('card_id') }}">
                        @error('card_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone_number" class="form-label">Número de teléfono</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                        @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="role_name" class="form-label">Rol / Puesto en la panadería</label>
                        <select class="form-select @error('role_name') is-invalid @enderror" id="role_name" name="role_name" required>
                            <option value="" selected disabled>-- Seleccione un puesto --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role_name') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="profile_image" class="form-label">Foto de perfil (Opcional)</label>
                        <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image" accept="image/*">
                        @error('profile_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Contraseña de acceso</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Registrar empleado</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
