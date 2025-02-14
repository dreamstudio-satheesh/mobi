<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = ['name', 'email', 'phone', 'address', 'notes'];

    /**
     * Get the products supplied by this supplier.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
