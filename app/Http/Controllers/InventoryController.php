<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\InventoryRequest;
use Illuminate\View\View;

class InventoryController extends Controller
{
    public function index(): View
    {
        $inventories = Inventory::with(['raw_material', 'finished_product'])->latest()->paginate(15);
        return view('inventories.index', compact('inventories'));
    }

    public function show(Inventory $inventory): View
    {
        $inventory->load(['raw_material', 'finished_product']);
        return view('inventories.show', compact('inventory'));
    }
}
