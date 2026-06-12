<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create(): View
    {
        return view('brands.create');
    }

    public function store(BrandRequest $request): RedirectResponse
    {
        Brand::create($request->validated());
        return redirect()->route('brands.index')
            ->with('success', 'Marca registrada exitosamente.');
    }

    public function show(Brand $brand): View
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand): View
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update($request->validated());
        return redirect()->route('brands.index')
            ->with('success', 'Marca actualizada con éxito');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();
        return redirect()->route('brands.index')
            ->with('success', 'Marca eliminada con éxito.');
    }
}
