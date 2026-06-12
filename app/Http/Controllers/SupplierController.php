<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(): View
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create(): View
    {
        return view('suppliers.create');
    }

    public function store(SupplierRequest $request): RedirectResponse
    {
        Supplier::create($request->validated());
        return redirect()->route('suppliers.index')
            ->with('success', 'Proveedor registrado con éxito.');
    }

    public function show(Supplier $supplier): View
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier): View
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $supplier->update($request->validated());
        return redirect()->route('suppliers.index')
            ->with('success', 'Proveedor actualizado con éxito.');
    }

    public function destroy(Supplier $supplier):RedirectResponse
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')
        ->with('success', 'Proveedor eliminado exitosamente.');
    }
}
