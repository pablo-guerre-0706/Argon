@extends('layouts.panel')
@section('title', 'Nueva orden de compra')

@section('content')    
<div class="container py-4">
    <h1 class="mb-4">Nueva orden de compra</h1>

    <form action="{{ route('purchase_orders.store') }}" method="POST">
        @csrf 
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white py-2">Datos generales de la orden de compra</div>
            <div class="card-body py-3">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="order_number" class="form-control-label small font-weight-bold">Número de orden:</label>
                        <input type="text" name="order_number" class="form-control form-control-alternative form-control-sm" value="{{ $order_number }}" readonly required>
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
                        <input type="date" name="date_order" id="date_order" class="form-control form-control-alternative form-control-sm" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="text-dark font-weight-bold mb-0 small text-uppercase">Listado de materia prima</h5>
            <button type="button" class="btn btn-info btn-sm mb-0 py-1" id="btn_agregar_materia_prima">
                <i class="fas fa-plus"></i>Agregar materia prima
            </button>
        </div>
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white py-2">Detalle de ingredientes a comprar</div>
            <div class="card-body px-2 py-2">
                <table class="table table-bordered table-sm m-0 table-responsive-md">
                    <thead class="table light text-center small font-weight-bold">
                        <tr>
                            <th style="width: 26%">Materia prima</th>
                            <th style="width: 18%;">Marca</th>
                            <th style="width: 18%;">Unidad de medida</th>
                            <th style="width: 16%;">Cantidad</th>
                            <th style="width: 16%;">Costo unitario</th>
                            <th style="width: 6%;"></th>
                        </tr>
                    </thead>
                    <tbody id="tabla_materia_prima">
                        <tr>
                            <td>
                                <select name="raw_material_id[]" class="form-control form-control-alternative form-control-sm w-100 class_select_materia" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($raw_materials as $item)
                                        <option value="{{ $item->id }}"
                                                data-price="{{ $item->purchase_price }}"
                                                data-brand="{{ $item->brand->name ?? 'N/A' }}"
                                                data-unit="{{ $item->unit_measure->abbreviation ?? 'N/A' }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm txt-brand" readonly placeholder="-">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm txt-unit" readonly placeholder="-">
                            </td>
                            <td>
                                <input type="number" step="0.001" name="ordered_quantity[]" class="form-control class_cantidad text_right" placeholder="0.000" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" name="unit_cost[]" class="form-control class_costo_unitario" placeholder="0.01" required>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-link text-danger p-0 m-0 btn_eliminar_fila" style="display: none;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row justify-content-end mt-4 px-3">
                    <div class="col-md5 col-lg-4 bg-light p-3 rounded shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <span class="small font-weight-bold text-muted">Subtotal:</span>
                            <span class="font-weight-bold text-dark small ml-auto" id="txt_subtotal">0.00</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="small font-weight-bold text-muted">IVA (15%):</span>
                            <span class="font-weight-bold text-dark small ml-auto" id="text_tax">0.00</span>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex align-items-center mb-3">
                            <span class="small font-weight-bold text-dark">Total</span>
                            <span class="h4 font-weight-bold text-success mb-0 ml-auto" id="txt_total">0.00</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3 pt-3 border-top border-light">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm py-1 px-3 mr-2 w-auto mb-0" style="font-size: 11px; height: 30px;">
                        Cancelar
                    </a>
                    <input type="hidden" name="subtotal" id="hidden_subtotal" value="0.00">
                    <input type="hidden" name="tax" id="hidden_tax" value="0.00">
                    <input type="hidden" name="total" id="hidden_total" value="0.00">
                    <input type="hidden" name="user_id" value="{{ auth()->id() ?? 1 }}">
                    <button type="submit" class="btn btn-success btn-sm py-1 px-3 w-auto mb-0" style="font-size: 11px; height: 30px;">
                        Guardar orden de compra
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://jquery.com"></script>
<script>
$(document).ready(function() {
    $('#btn_agregar_materia_prima').on('click', function() {
        let nuevaFila = $('#tabla_materia_prima tr:first').clone();
        nuevaFila.find('input').val('');
        nuevaFila.find('select').val('');
        nuevaFila.find('.btn_eliminar_fila').show();
        $('#tabla_materia_prima').append(nuevaFila);
    });

    $(document).on('click', '.btn_eliminar_fila', function() {
        $(this).closest('tr').remove();
        calcularTotales();
    });

    $(document).on('change', '.class_select_materia', function() {
        let optionSeleccionada = $(this).find('option:selected');
        let precioSugerido = optionSeleccionada.data('price') || '0';
        let marca = optionSeleccionada.data('brand') || '-';
        let unidad = optionSeleccionada.data('unit') || '-';

        let filaActual = $(this).closest('tr');
        filaActual.find('input[name="unit_cost[]"]').val(precioSugerido);
        filaActual.find('.txt-brand').val(marca);
        filaActual.find('.txt-unit').val(unidad);
        
        calcularTotales();
    });
        
    $(document).on('input', 'input[name="ordered_quantity[]"], input[name="unit_cost[]"]', function(){
        calcularTotales();
    });

    function calcularTotales() {
        let subtotalGeneral = 0;
        $('#tabla_materia_prima tr').each(function() {
            let qty = parseFloat($(this).find('input[name="ordered_quantity[]"]').val()) || 0;
            let cost = parseFloat($(this).find('input[name="unit_cost[]"]').val()) || 0;
            let subtotalFila = qty * cost;
            subtotalGeneral += subtotalFila;
        });
    
        let tax = subtotalGeneral * 0.15;
        let total = subtotalGeneral + tax;

        $('#txt_subtotal').text(subtotalGeneral.toFixed(2));
        $('#text_tax').text(tax.toFixed(2));
        $('#txt_total').text(total.toFixed(2));
        $('#hidden_subtotal').val(subtotalGeneral.toFixed(2));
        $('#hidden_tax').val(tax.toFixed(2));
        $('#hidden_total').val(total.toFixed(2));
     }
});
</script>
@endsection
