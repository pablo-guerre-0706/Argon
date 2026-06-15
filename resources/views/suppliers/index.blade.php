@extends('layouts.panel')
@section('title', 'Listado de Proveedores')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Control de Panadería: Proveedores</h1>
        <!-- Botón para ir al formulario de creación -->
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle mr-1"></i> Nuevo Proveedor
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show small py-2" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close py-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h6 class="m-0 font-weight-bold text-primary small text-uppercase">Directorio de Proveedores</h6>
        </div>
        <div class="card-body px-3 py-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-center align-middle m-0" style="font-size: 13px;">
                    <thead class="bg-gray-100 font-weight-bold text-dark">
                        <tr>
                            <th class="text-left pl-2" style="width: 25%;">Nombre de la Empresa</th>
                            <th style="width: 15%;">Teléfono</th>
                            <th style="width: 20%;">Correo Electrónico</th>
                            <th class="text-left pl-2" style="width: 25%;">Dirección</th>
                            <th style="width: 10%;">Estado</th>
                            <th style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suppliers as $supplier)
                            <tr>
                                <td class="text-left pl-2 font-weight-bold text-dark">{{ $supplier->name }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td class="text-left pl-2 text-muted" title="{{ $supplier->address }}">
                                    {{ Str::limit($supplier->address, 35, '...') }}
                                </td>
                                <td>
                                    @if($supplier->status == 'active')
                                        <span class="badge badge-success px-2 py-1">Activo</span>
                                    @else
                                        <span class="badge badge-danger px-2 py-1">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <!-- Botón Editar -->
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-xs py-0 px-2 mr-1" title="Editar">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');" class="m-0 p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs py-0 px-2" title="Eliminar">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted py-3">No hay proveedores registrados en el sistema.</td>
                            </tr>
                        @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
