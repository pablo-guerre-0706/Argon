@extends('layouts.panel')
@section('title', 'Detalle de la orden de compra')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detalle de Orden de Compra: {{ $purchase_order->order_number }}</h1>
        <a href="{{ route('purchase_orders.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Volver al Historial
        </a>
    </div>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white py-2 font-weight-bold small text-uppercase">
                    Información de la Transacción
                </div>
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <span class="small font-weight-bold text-muted d-block">Proveedor:</span>
                            <span class="text-dark">{{ $purchase_order->supplier->name ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span class="small font-weight-bold text-muted d-block">Fecha de Emisión:</span>
                            <span class="text-dark">{{ \Carbon\Carbon::parse($purchase_order->date_order)->format('d/m/Y') }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span class="small font-weight-bold text-muted d-block">Registrado por:</span>
                            <span class="text-dark">{{ $purchase_order->user->name ?? 'Usuario del Sistema' }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <span class="small font-weight-bold text-muted d-block">Estado Actual:</span>
                            @if($purchase_order->status_order == 'generated')
                                <span class="badge badge-primary px-2 py-1">Generada</span>
                            @elseif($purchase_order->status_order == 'sent')
                                <span class="badge badge-info px-2 py-1">Enviada</span>
                            @else
                                <span class="badge badge-secondary px-2 py-1">{{ $purchase_order->status_order }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white py-2 font-weight-bold small text-uppercase">
                    Ingredientes y Materias Primas Adquiridas
                </div>
                <div class="card-body px-2 py-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm m-0 text-center" style="font-size: 13px;">
                            <thead class="table-light font-weight-bold text-dark">
                                <tr>
                                    <th class="text-left pl-2">Materia Prima</th>
                                    <th>Marca</th>
                                    <th>U. Medida</th>
                                    <th>Cantidad</th>
                                    <th>Costo Unitario</th>
                                    <th>Subtotal Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase_order->purchase_order_details as $detail)
                                    <tr>
                                        <td class="text-left pl-2 font-weight-bold">{{ $detail->raw_material->name ?? 'N/A' }}</td>
                                        <td>{{ $detail->raw_material->brand->name ?? 'N/A' }}</td>
                                        <td>{{ $detail->raw_material->unitMeasure->abbreviation ?? 'N/A' }}</td>
                                        <td class="text-right pr-2">{{ number_format($detail->ordered_quantity, 3) }}</td>
                                        <td class="text-right pr-2">${{ number_format($detail->unit_cost, 2) }}</td>
                                        <td class="text-right pr-2 font-weight-bold">${{ number_format($detail->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm bg-light">
                <div class="card-header bg-dark text-white py-2 font-weight-bold small text-uppercase text-center">
                    Resumen Financiero
                </div>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center mb-2">
                        <span class="small font-weight-bold text-muted">Subtotal Neto:</span>
                        <span class="font-weight-bold text-dark ml-auto">${{ number_format($purchase_order->subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <span class="small font-weight-bold text-muted">IVA Retenido (15%):</span>
                        <span class="font-weight-bold text-dark ml-auto">${{ number_format($purchase_order->tax, 2) }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="d-flex align-items-center mb-0">
                        <span class="font-weight-bold text-dark">Total de la Orden:</span>
                        <span class="h4 font-weight-bold text-success mb-0 ml-auto">${{ number_format($purchase_order->total, 2) }}</span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 pt-0 text-center">
                    <button class="btn btn-primary btn-sm btn-block" onclick="window.print();">
                        <i class="fas fa-print mr-1"></i> Imprimir Comprobante
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
