<?php

namespace App\Http\Controllers\Bill;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    // public function addProduct(Request $request)
    // {
    //     $product_id = $request->input('product_id');
    //     $product_qty = $request->input('product_qty');
    // }

    public function index()
    {
        return view('billing.billing');
    }
}