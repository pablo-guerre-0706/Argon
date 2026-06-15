<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Http\Requests\PurchaseOrderRequest;
use App\Models\Supplier;
use App\Models\RawMaterial;
use App\Models\Brand;
use App\Models\UnitMeasure;
use App\Models\CategoryMat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PurchaseOrderController extends Controller
{
    public function index(): View
    {
        $purchase_orders = PurchaseOrder::with(['user', 'supplier'])->latest()->get();
        return view('purchase_orders.index', compact('purchase_orders'));
    }

    public function create(): View
    {
        $suppliers = Supplier::all();
        $raw_materials = RawMaterial::with(['brand', 'unit_measure'])->get();
        $ultimaOrden = PurchaseOrder::latest('id')->first();
        $siguienteNumero = $ultimaOrden ? ($ultimaOrden->id + 1) : 1;
        $order_number = 'OC-' . str_pad($siguienteNumero, 4, '0', STR_PAD_LEFT);
        return view('purchase_orders.create', compact('suppliers', 'raw_materials', 'order_number'));
    }
  
    public function store(PurchaseOrderRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
        $purchase_order = PurchaseOrder::create($request->validated());
        foreach ($request->raw_material_id as $index => $materialId) {
            $purchase_order->purchase_order_details()->create([
                'raw_material_id'  => $materialId,
                'ordered_quantity' => $request->ordered_quantity[$index],
                'unit_cost'        => $request->unit_cost[$index],
                'subtotal'         => $request->ordered_quantity[$index] * $request->unit_cost[$index], 
            ]);
        }
        DB::commit();
        return redirect()->route('purchase_orders.index')
            ->with('success', 'Orden de compra registrada exitosamente.');

        } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()
            ->with('error', 'Error al registrar la orden: ' . $e->getMessage());
        }
    }

    public function show(PurchaseOrder $purchase_order): View
    {
        $purchase_order->load('purchase_order_details.raw_material');
        return view('purchase_orders.show', compact('purchase_order'));
    }
}
