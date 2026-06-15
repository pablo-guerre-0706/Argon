<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrderDetail;
use App\Http\Requests\PurchaseOrderDetailRequest;
use Illuminate\Http\RedirectResponse;

class PurchaseOrderDetailController extends Controller
{
    public function store(PurchaseOrderDetailRequest $request): RedirectResponse
    {
        PurchaseOrderDetail::create($request->validated());
        return redirect()->route('purchase_order_details.show', $request->purchase_order_id)
            ->with('success', 'Materia prima agregada a la orden con éxito.');
    }

    public function destroy(PurchaseOrderDetail $purchase_order_detail): RedirectResponse
    {
        $purchase_order_detail->delete();
        return redirect()->route('purchase_order_details.show')
            ->with('success', 'Materia prima eliminada de la orden de compra exitosamente.');
    }
}
