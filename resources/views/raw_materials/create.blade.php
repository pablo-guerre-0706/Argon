@extends('layouts.panel')

@section('title', 'Registrar Materia Prima')

@section('content')
<div class="container py-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white py-2">
                <h5 class="text-white mb-0 small text-uppercase font-weight-bold">Nueva materia prima</h5>
            </div>
            <div class="card-body py-3">
                <form action="{{ route('raw-materials.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-control-label small font-weight-bold">Nombre:</label>
                        <input type="text" name="name" class="form-control form-control-alternative form-control-sm" placeholder="Ej: Harina de trigo" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="form-control-label small font-weight-bold">Código de barras:</label>
                            <input type="text" name="bar_code" class="form-control form-control-alternative form-control-sm" placeholder="Ej: 27001" required>
                        </div>
                        <div class="col-md-3 form-group mb-2">
                            <label class="form-control-label small font-weight-bold">Precio de compra:</label>
                            <input type="number" step="0.01" name="purchase_price" class="form-control form-control-alternative form-control-sm" placeholder="0.00" required>
                        </div>
                        <div class="col-md-3 form-group mb-2">
                            <label class="form-control-label small font-weight-bold">Peso:</label>
                            <input type="number" step="0.001" name="weight" class="form-control form-control-alternative form-control-sm" placeholder="0.000" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group mb-3">
                            <label class="form-control-label small font-weight-bold">Marca / Proveedor:</label>
                            <select name="brand_id" class="form-control form-control-alternative form-control-sm" required>
                                <option value="">Seleccione...</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="form-control-label small font-weight-bold">Unidad de medida:</label>
                            <select name="unit_measure_id" class="form-control form-control-alternative form-control-sm" required>
                                <option value="">Seleccione...</option>
                                @foreach($units_measures as $measure)
                                    <option value="{{ $measure->id }}">{{ $measure->name }} ({{ $measure->abbreviation }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label class="form-control-label small font-weight-bold">Categoría:</label>
                            <select name="category_mat_id" class="form-control form-control-alternative form-control-sm" required>
                                <option value="">Seleccione...</option>
                                @foreach($categories_mat as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center border-top pt-3">
                        <a href="{{ route('raw-materials.index') }}" class="btn btn-outline-secondary btn-sm py-1 px-3 mr-2 w-auto mb-0" style="font-size: 11px; height: 30px;" wire:navigate>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-success btn-sm py-1 px-3 w-auto mb-0" style="font-size: 11px; height: 30px;">
                            Guardar materia prima
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
