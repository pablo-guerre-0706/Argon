@extends('layouts.panel')
@section('title', 'Historial de órdenes de compra')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Control de Panadería: Órdenes de Compra</h1>
        <a href="{{ route('purchase-orders.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle mr-1"></i> Nueva Orden de Compra
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

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show small py-2" role="alert">
            <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
            <button type="button" class="close py-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h6 class="m-0 font-weight-bold text-primary small text-uppercase">Registro General de Transacciones</h6>
        </div>
        <div class="card-body px-3 py-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-center align-middle m-0" style="font-size: 13px;">
                    <thead class="bg-gray-100 font-weight-bold text-dark">
                        <tr>
                            <th>N° de Orden</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Subtotal</th>
                            <th>IVA (15%)</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchase_orders as $order)
                            <tr>
                                <td class="font-weight-bold text-primary">{{ $order->order_number }}</td>
                                <!-- Uso de la relación belongsTo hacia proveedor -->
                                <td class="text-left pl-2">{{ $order->supplier->name ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->date_order)->format('d/m/Y') }}</td>
                                <td class="text-right pr-2">${{ number_format($order->subtotal, 2) }}</td>
                                <td class="text-right pr-2">${{ number_format($order->tax, 2) }}</td>
                                <td class="text-right pr-2 font-weight-bold text-success">${{ number_format($order->total, 2) }}</td>
                                <td>
                                    @if($order->status_order == 'generated')
                                        <span class="badge badge-primary px-2 py-1">Generada</span>
                                    @elseif($order->status_order == 'sent')
                                        <span class="badge badge-info px-2 py-1">Enviada</span>
                                    <@else
                                        <span class="badge badge-secondary px-2 py-1">{{ $order->status_order }}</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Enlace directo al método Show que procesará los detalles individuales -->
                                    <a href="{{ route('purchase-orders.show', $order->id) }}" class="btn btn-info btn-xs py-0 px-2" title="Ver Detalles">
                                        <i class="fas fa-eye text-xs"></i> Ver
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-muted py-3">No se han registrado órdenes de compra en el sistema todavía.</td>
                            </tr>
                        @empty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
