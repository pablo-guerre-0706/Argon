<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Http\Requests\PurchaseOrderRequest;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PurchaseOrderController extends Controller
{
    public function index(): View
    {
        $purchase_orders = PurchaseOrder::with(['user', 'supplier'])->latest()->paginate(15);
        return view('purchase_orders.index', compact('purchase_orders'));
    }

    public function create(): View
    {
        return view('purchase_orders.create');
    }

    public function store(PurchaseOrderRequest $request): RedirectResponse
    {
        PurchaseOrder::create($request->validated());
        return redirect()->route('purchase_orders.index')
            ->with('success', 'Orden de compra registrada exitosamente.');
    }

    public function show(PurchaseOrder $purchase_order): View
    {
        $purchase_order->load('purchase_order_details.raw_material');
        return view('purchase_orders.show', compact('purchase_order'));
    }
}
