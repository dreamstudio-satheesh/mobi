<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'repair_id', 'customer_id', 'device_brand', 'device_model',
        'serial_number', 'issue_description', 'estimated_cost',
        'expected_completion_date', 'priority', 'status', 'technician_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
