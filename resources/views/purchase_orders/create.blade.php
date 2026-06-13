@extends('layouts.app')
@section('content')
    
<div class="container py -4">
    <h1 class="mb-4">Nueva orden de compra (Materia prima)</h1>

    <form action="{{ route('purchase-orders.store') }}" method="POST">
        @csrf 
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Datos generales de la orden de compra</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="order_number">Numero de orden:</label>
                        <input type="text" name="order_number" id="order_number" class="form-control" placeholder="Ej: OC-0001" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="supplier_id">Proveedor:</label>
                        <select name="supplier_id" id='supplier_id' class="form-control" required>
                            <option value="">Seleccione proveedor...</option>
                            <option value="1">Distribuidora Altamirano, S. A.</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_order" class="form-label">Fecha de la orden</label>
                        <input type="date" name="date_order" id="date_order" class="form-control" value="{{ date('Y:m:d') }}" required>
                    </div>
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Materia prima (Ingrediente)</th>
                            <th>Cantidad pedida</th>
                            <th>Costo unitario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="raw_material_id[]" class="form-control" required>
                                    <option value="">Seleccione ingrediente...</option>
                                    @foreach ($RawMaterial as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endforeach
                                    <option value="1">Harina de trigo</option>
                                    <option value="2">Levadura seca</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" step="0.001" name="ordered_quantity[]" class="form-control" placeholder="0.000" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" name="Unit_cost[]" class="form-control" placeholder="0.00" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success">Guardar orden de compra</button>
                </div>
            </div>
        </div>
    </form>
<div
@endsection
