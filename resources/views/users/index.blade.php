@extends('layouts.panel')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestión de Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-user-plus fa-sm text-white-50"></i> Registrar nuevo usuario
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personal registrado</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen de perfil</th>
                            <th>Correo electrónico</th>
                            <th>Número de cédula</th>
                            <th>Número de teléfono</th>
                            <th>Dirección</th>
                            <th>Rol / Puesto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td class="text-center">
                                <img src="{{ $usuario->image() }}" alt="Perfil" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            </td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->card_id ?? 'N/A' }}</td>
                            <td>{{ $usuario->phone_number ?? 'N/A' }}</td>
                            <td>{{ $usuario->address ?? 'N/A' }}</td>
                            <td>
                                @foreach($usuario->roles as $rol)
                                    <span class="badge bg-info text-dark">{{ $rol->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('users.update', $usuario->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_name" class="form-select form-select-sm" required style="width: auto;">
                                        <option value="" disabled>Cambiar puesto...</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" 
                                                {{ $usuario->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-success shadow-sm">
                                        Actualizar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
