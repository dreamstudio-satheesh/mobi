<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'category_id', 
        'supplier_id', 
        'name', 
        'description', 
        'sku', 
        'condition', 
        'stock', 
        'purchase_price', 
        'selling_price', 
        'discount', 
        'currency'
    ];

    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the supplier associated with the product.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the inventory transactions for the product.
     */
    public function transactions()
    {
        return $this->hasMany(InventoryTransaction::class);
    }
}
