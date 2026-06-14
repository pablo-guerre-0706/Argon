<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Models\Brand;
use App\Models\UnitMeasure;
use App\Models\CategoryMat;
use Illuminate\Http\Request;
use App\Http\Requests\RawMaterialRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RawMaterialController extends Controller
{
    public function index(): View
    {
        $raw_materials = RawMaterial::with(['brand', 'unit_measure', 'category_mat'])->paginate(15);
        return view('raw_materials.index', compact('raw_materials'));
    }

    public function create(): View
    {
        $brands = Brand::all();
        $units_measures = UnitMeasure::all();
        $categories_mat = CategoryMat::all();
        return view('raw_materials.create', compact('brands', 'units_measures', 'categories_mat'));
    }

    public function store(RawMaterialRequest $request): RedirectResponse
    {
        RawMaterial::create($request->validated());
        return redirect()->route('raw_materials.index')
            ->with('success', 'Materia prima registrada exitosamente.');
    }

    public function show(RawMaterial $raw_material): View
    {
        return view('raw_materials.show', compact('raw_material'));
    }

    public function edit(RawMaterial $raw_material): View
    {
        return view('raw_materials.edit', compact('raw_material'));
    }

    public function update(RawMaterialRequest $request, RawMaterial $raw_material): RedirectResponse
    {
        $raw_material->update($request->validated());
        return redirect()->route('raw_materials.index')
            ->with('success', 'Materia prima actualizada con éxito.');
    }

    public function destroy(RawMaterial $raw_material): RedirectResponse
    {
        $raw_material->delete();
        return redirect()->route('raw_materials.index')
            ->with('success', 'Materia prima eliminada exitosamente.');
    }
}
