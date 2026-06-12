<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Http\Requests\RawMaterialRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RawMaterialController extends Controller
{
    public function index(): View
    {
        $raw_materials = RawMaterial::all();
        return view('raw_materials.index', compact('raw_materials'));
    }

    public function create(): View
    {
        return view('raw_materials.create');
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
