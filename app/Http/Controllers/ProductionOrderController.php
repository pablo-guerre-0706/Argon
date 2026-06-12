<?php

namespace App\Http\Controllers;

use App\Models\ProductionOrder;
use App\Http\Requests\ProductionOrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductionOrderController extends Controller
{
    public function index(): View
    {
        $production_orders = ProductionOrder::with('user')->latest()->paginate(15);
        return view('production_orders.index', compact('production_orders'));
    }

    public function create(): View
    {
        return view('production_orders.create');
    }

    public function store(ProductionOrderRequest $request): RedirectResponse
    {
        ProductionOrder::create($request->validated());
        return redirect()->route('production_orders.index')
            ->with('success', 'Orden de producción creada exitosamente.');
    }

    public function show(ProductionOrder $production_order): View
    {
        $production_order->load('prod_order_details.recipe', 'prod_order_details.finished_product');
        return view('production_orders.show', compact('production_order'));
    }

    public function completeOrder(ProductionOrder $production_order): RedirectResponse
    {
        $production_order->update([
            'status' => 'completed',
            'end_date' => now()
        ]);
        return redirect()->route('production_orders.index')
            ->with('success', 'Detalle de orden de producción registrado exitosamente. El lote ha sido cerrado.');
    }
}
