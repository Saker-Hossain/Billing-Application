<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventoryProducts.index',compact('inventories'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}