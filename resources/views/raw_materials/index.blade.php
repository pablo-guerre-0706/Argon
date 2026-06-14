@extends('layouts.panel')

@section('title', 'Catálogo de materias primas')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-white mb-0">Catálogo de materias primas</h1>
        <a href="{{ route('raw-materials.create') }}" class="btn btn-success btn-sm px-3" wire:navigate>
            <i class="fas fa-plus-circle mr-1"></i> Nueva materia prima
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-items-center m-0">
                    <thead class="table-light text-center small font-weight-bold">
                        <tr>
                            <th>Nombre</th>
                            <th>Código de barras</th>
                            <th>Precio Sugerido</th>
                            <th>Peso</th>
                            <th>Marca</th>
                            <th>Unidad de medida</th>
                            <th>Categoría</th>
                        </tr>
                    </thead>
                    <tbody class="text-center small">
                        @forelse ($raw_materials as $item)
                            <tr>
                                <td class="font-weight-bold text-dark text-left pl-4">{{ $item->name }}</td>
                                <td><span class="badge bg-secondary text-dark">{{ $item->bar_code }}</span></td>
                                <td class="text-success font-weight-bold">${{ number_format($item->purchase_price, 2) }}</td>
                                <td>{{ number_format($item->weight, 3) }}</td>
                                <td>{{ $item->brand->name ?? 'N/A' }}</td>
                                <td>{{ $item->unit_measure->abbreviation ?? 'N/A' }}</td>
                                <td>{{ $item->category_mat->name ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fas fa-boxes fa-3x mb-3 text-light"></i><br>
                                    No hay materias primas registradas en el catálogo.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
