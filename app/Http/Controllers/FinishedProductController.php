<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use App\Http\Requests\FinishedProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FinishedProductController extends Controller
{
    public function index(): View
    {
        $finished_products = FinishedProduct::latest()->paginate(15);
        return view('finished_products.index', compact('finished_products'));
    }

    public function create(): View
    {
        return view('finished_products.create');
    }

    public function store(FinishedProductRequest $request): RedirectResponse
    {
        FinishedProduct::create($request->validated());
        return redirect()->route('finished_products.index')
            ->with('success', 'Producto terminado registrado exitosamente.');
    }

    public function show(FinishedProduct $finished_product): View
    {
        return view('finished_products.show', compact('finished_product'));
    }

    public function edit(FinishedProduct $finished_product): View
    {
        return view('finished_products.edit', compact('finished_product'));
    }

    public function update(FinishedProductRequest $request, FinishedProduct $finished_product): RedirectResponse
    {
        $finished_product->update($request->validated());
        return redirect()->route('finished_products.index')
            ->with('success', 'Producto terminado actualizado con éxito.');
    }
}
