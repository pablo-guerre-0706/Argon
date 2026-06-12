<?php

namespace App\Http\Controllers;

use App\Models\InventoryMovement;
use App\Http\Requests\InventoryMovementRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InventoryMovementController extends Controller
{
    public function index(): View
    {
        $inventory_movements = InventoryMovement::with([
            'user',
            'raw_material',
            'finished_product',
            'purchase_order_detail',
            'prod_order_detail',
            'sale_detail'
        ])
        ->latest()
        ->paginate(15);
        return view('inventory_movements.index', compact('inventory_movements'));
    }

    public function show(InventoryMovement $inventory_movement): View
    {
        return view('inventory_movements.show', compact('inventory_movement'));
    }

    public function store(array $data): InventoryMovement
    {
        return InventoryMovement::create($data);
    }
}
