@extends('layouts.panel')
@section('title', 'Nueva orden de compra')

@section('content')    
<div class="container py -4">
    <h1 class="mb-4">Nueva orden de compra (Materia prima)</h1>

    <form action="{{ route('purchase-orders.store') }}" method="POST">
        @csrf 
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white py-2">Datos generales de la orden de compra</div>
            <div class="card-body py-3">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="order_number" class="form-control-label small font-weight-bold">Número de orden:</label>
                        <input type="text" name="order_number" class="form-control form-control-alternative form-control-sm" placeholder="Ej: OC-0001" required>
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="supplier_id" class="form-control-label small font-weight-bold">Proveedor:</label>
                        <select name="supplier_id" id='supplier_id' class="form-control form-control-alternative form-control-sm" required>
                            <option value="">Seleccione proveedor...</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="date_order" class="form-control-label small font-weight-bold">Fecha de la orden</label>
                        <input type="date" name="date_order" id="date_order" class="form-control form-control-alternative form-control-sm" value="{{ date('Y:m:d') }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white py-2">Detalle de ingredientes a comprar</div>
            <div class="card-body px-2 py-2">
                <table class="table table-bordered table-sm m-0 table-responsive-md">
                    <thead class="table light text-center small font-weight-bold">
                        <tr>
                            <th style="width: 18%;">Materia prima (Especificaciones)</th>
                            <th style="width: 17%;">Marca</th>
                            <th style="width: 17%;">Unidad de medida</th>
                            <th style="width: 17%;">Categoría</th>
                            <th style="width: 15%;">Cantidad</th>
                            <th style="width: 15%;">C. unitario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="raw_material_id[]" class="form-control form-control-alternative form-control-sm w-100" required>
                                    <option value="">Seleccione ingrediente...</option>
                                    @foreach ($raw_materials as $item)>
                                        <option value="{{ $item->id}}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="brand_id[]" class="form-control form-control alternative form-control-sm w-100" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id}}">{{ $brand->name }} ({{ $brand->origin }})</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="unit_measure_id[]" class="form-control form-control-alternative form-control-sm w-100" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($units_measures as $measure)
                                        <option value="{{ $measure->id }}">{{ $measure->name }} ({{ $measure->abbreviation }})</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="category_mat_id[]" class="form-control form-control-alternative form-control-sm w-100" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($categories_mat as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" step="0.001" name="ordered_quantity[]" class="form-control form-control-alternative form-control-sm text-right" placeholder="0.000" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" name="unit_cost[]"" class="form-control form-control-alternative form-control-sm text-right" placeholder="0.01" required>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row justify-content-center mt-4">
                    <div class="col-md5 col-lg-4 bg-secondary p-3 rounded shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <span class="small font-weight-bold text-muted">Subtotal:</span>
                            <span class="font-weight-bold text-dark small ml-auto" id="txt_subtotal">0.00</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="small font-weight-bold text-muted">IVA (15%):</span>
                            <span class="font-weight-bold text-dark small ml-auto" id="text_tax">0.00</span>
                        </div>
                        <hr class="my-2 border-light">
                        <div class="d-flex align-items-center mb-3">
                            <span class="small font-weight-bold text-dark">Total</span>
                            <span class="h4 font-weight-bold text-success mb-0 ml-auto" id="txt_total">0.00</span>
                        </div>
                    </div>
                <div class="d-flex justify-content-end mt-t pt-2 border-top border-light">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm py-1 px-3 mr-2 w-auto mb-0" style="font-size: 11px; height: 30px;" wire:navigate>
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success btn-sm py-1 px-3 w-auto mb-0" style="font-size: 11px; height: 30px;">
                        Guardar orden de compra
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $(document).on('input', 'input[name="ordered_quantity[]"], input[name="unit_cost[]"]', function(){
            let subtotal = 0;
            $('table tbody tr').each(function() {
                let qty = parseFloat($(this).find('input[name="ordered_quantity[]"]').val()) || 0;
                let cost = parseFloat($(this).find('input[name="unit_cost[]"]').val()) || 0;
                subtotal += qty * cost;
            });
            let tax = subtotal * 0.15;
            let total = subtotal + tax;

            $('#txt_subtotal').text(subtotal.toFixed(2));
            $('#txt_tax').text(tax.toFixed(2));
            $('#txt_total').text(total.toFixed(2));
        });
    });
</script>
@endsection
