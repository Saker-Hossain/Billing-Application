<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventories';
    protected $fillable = [
        'date',
        'bill_no',
        'customer_id',
        'total_discount',
        'total_bill_amount',
        'due_amount',
        'paid_amount',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}