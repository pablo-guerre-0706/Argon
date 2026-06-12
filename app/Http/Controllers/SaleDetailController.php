<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use App\Http\Requests\SaleDetailRequest;
use Illuminate\Http\RedirectResponse;

class SaleDetailController extends Controller
{
    public function store(SaleDetailRequest $request): RedirectResponse
    {
        SaleDetail::create($request->validated());
        return redirect()->route('sales.show', $request->sale_id)
            ->with('success', 'Producto agregado a la venta con éxito.');
    }
}
