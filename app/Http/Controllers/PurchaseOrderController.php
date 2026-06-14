<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Http\Requests\PurchaseOrderRequest;
use App\Models\Supplier;
use App\Models\RawMaterial;
use App\Models\Brand;
use App\Models\UnitMeasure;
use App\Models\CategoryMat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PurchaseOrderController extends Controller
{
    public function index(): View
    {
        $purchase_orders = PurchaseOrder::with(['user', 'supplier'])->latest()->paginate(15);
        return view('purchase_orders.index', compact('purchase_orders'));
    }

    public function create(): View
    {
        $suppliers = Supplier::all();
        $raw_materials = RawMaterial::all();
        $brands = Brand::all();
        $units_measures = UnitMeasure::all();
        $categories_mat = CategoryMat::all();
        return view('purchase_orders.create', compact(
            'suppliers',
            'raw_materials',
            'brands',
            'units_measures',
            'categories_mat'
        ));
    }

    public function store(PurchaseOrderRequest $request): RedirectResponse
    {
        PurchaseOrder::create($request->validated());
        return redirect()->route('purchase_orders.index')
            ->with('success', 'Orden de compra registrada exitosamente.');
    }

    public function show(PurchaseOrder $purchase_order): View
    {
        $purchase_order->load('purchase_order_details.raw_material');
        return view('purchase_orders.show', compact('purchase_order'));
    }
}
