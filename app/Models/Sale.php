<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'subtotal', 'discount', 'total', 'payment_status', 'payment_method', 'invoice_number'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salesItems()
    {
        return $this->hasMany(SalesItem::class);
    }
}
