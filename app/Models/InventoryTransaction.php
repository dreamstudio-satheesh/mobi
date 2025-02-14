<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'product_id', 
        'transaction_type', 
        'quantity', 
        'transaction_date', 
        'notes'
    ];

    /**
     * Get the product that this transaction is associated with.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
