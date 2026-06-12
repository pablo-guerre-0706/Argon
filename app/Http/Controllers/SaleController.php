<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function index(): View
    {
        $sales = Sale::with(['user', 'customer'])->latest()->paginate(15);
        return view('sales.index', compact('sales'));
    }

    public function create(): View
    {
        return view('sales.create');
    }

    public function store(SaleRequest $request): RedirectResponse
    {
        Sale::create($request->validated());
        return redirect()->route('sales.index')
            ->with('success', 'Venta registrada exitosamente.');
    }

    public function show(Sale $sale): View
    {
        $sale->load('sale_details.finished_product');
        return view('sales.show', compact('sale'));
    }
}
