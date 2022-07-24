<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProduct extends Model
{
    use HasFactory;
    protected $table = 'inventory_products';
    protected $fillable = [
        'inventory_id',
        'product_id',
        'rate',
        'qty',
        'discount',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}