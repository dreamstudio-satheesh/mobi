<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\RepairOrder;
use Livewire\Component;

class CreateRepairOrder extends Component
{
    public $customer_id, $device_brand, $device_model, $serial_number;
    public $issue_description, $estimated_cost, $expected_completion_date;
    public $priority = 'Medium';

    protected $rules = [
        'customer_id' => 'required|exists:customers,id',
        'device_brand' => 'required|string|max:255',
        'device_model' => 'required|string|max:255',
        'serial_number' => 'nullable|string|max:255',
        'issue_description' => 'required|string',
        'estimated_cost' => 'nullable|numeric|min:0',
        'expected_completion_date' => 'nullable|date',
        'priority' => 'required|in:Low,Medium,High',
    ];

    public function generateRepairID()
    {
        return 'REP' . strtoupper(uniqid());
    }

    public function saveOrder()
    {
        $this->validate();

        $repairOrder = RepairOrder::create([
            'repair_id' => $this->generateRepairID(),
            'customer_id' => $this->customer_id,
            'device_brand' => $this->device_brand,
            'device_model' => $this->device_model,
            'serial_number' => $this->serial_number,
            'issue_description' => $this->issue_description,
            'estimated_cost' => $this->estimated_cost,
            'expected_completion_date' => $this->expected_completion_date,
            'priority' => $this->priority,
            'status' => 'Pending',
        ]);

        session()->flash('success', 'Repair Order Created Successfully!');
        return redirect()->route('repairs.list');
    }

    public function render()
    {
        return view('livewire.create-repair-order', [
            'customers' => Customer::all(),
        ]);
    }
}
