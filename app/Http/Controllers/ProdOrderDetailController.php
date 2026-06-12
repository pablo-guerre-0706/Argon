<?php

namespace App\Http\Controllers;

use App\Models\ProdOrderDetail;
use App\Http\Requests\ProdOrderDetailRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProdOrderDetailController extends Controller
{
    public function edit(ProdOrderDetail $prod_order_detail): View
    {
        return view('prod_orders_details.edit', compact('prod_order_detail'));
    }

    public function update(ProdOrderDetailRequest $request, ProdOrderDetail $prod_order_detail): RedirectResponse
    {
        $prod_order_detail->update($request->validated());
        return redirect()->route('prod_order_details.show', $prod_order_detail->production_order_id)
            ->with('success', 'Horneada #{prod_order_detail->bake_number} actualizada en el sistema con éxito.');
    }
}
