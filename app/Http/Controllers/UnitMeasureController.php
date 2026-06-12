<?php

namespace App\Http\Controllers;

use App\Models\UnitMeasure;
use App\Http\Requests\UnitMeasureRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UnitMeasureController extends Controller
{
    public function index(): View
    {
        $units_measures = UnitMeasure::all();
        return view('units_measures.index', compact('units_measures'));
    }

    public function create(): View
    {
        return view('units_measures.create');
    }

    public function store(UnitMeasureRequest $request): RedirectResponse
    {
        UnitMeasure::create($request->validated());
        return redirect()->route('units_measures.index')
            ->with('success', 'Unidad de medida registrada exitosamente.');
    }

    public function show(UnitMeasure $unit_measure): View
    {
        return view('units_measures.show', compact('unit_measure'));
    }

    public function edit(UnitMeasure $unit_measure): View
    {
        return view('units_measures.edit', compact('unit_measure'));
    }

    public function update(UnitMeasureRequest $request, UnitMeasure $unit_measure): RedirectResponse
    {    
        $unit_measure->update($request->validated());
        return redirect()->route('units_measures.index')
            ->with('success', 'Unidad de medida actualizada.');
    }

    public function destroy(UnitMeasure $unit_measure): RedirectResponse
    {
        $unit_measure->delete();
        return redirect()->route('units_measures.index')
            ->with('success', 'Unidad de medida eliminada con éxito.');
    }
}
