<?php

namespace App\Livewire;

use App\Models\RepairOrder;
use Livewire\Component;

class RepairPayment extends Component
{
    public $repairOrder;
    public $payment_status, $payment_method, $amount_paid, $warranty_expiry;
    public $warranty_options = [
        'No Warranty' => null,
        '30 Days' => '+30 days',
        '3 Months' => '+3 months',
        '6 Months' => '+6 months',
        '1 Year' => '+1 year',
    ];

    protected $rules = [
        'payment_status' => 'required|in:pending,paid',
        'payment_method' => 'required_if:payment_status,paid|in:cash,upi,card,bank_transfer',
        'amount_paid' => 'required_if:payment_status,paid|numeric|min:0',
        'warranty_expiry' => 'nullable|date',
    ];

    public function mount(RepairOrder $repairOrder)
    {
        $this->repairOrder = $repairOrder;
        $this->payment_status = $repairOrder->payment_status;
        $this->payment_method = $repairOrder->payment_method;
        $this->amount_paid = $repairOrder->amount_paid;
        $this->warranty_expiry = $repairOrder->warranty_expiry;
    }

    public function processPayment()
    {
        $this->validate();

        // Set warranty expiry date
        $warranty_duration = $this->warranty_options[$this->warranty_expiry] ?? null;
        $warranty_date = $warranty_duration ? now()->modify($warranty_duration)->format('Y-m-d') : null;

        // Update Repair Order
        $this->repairOrder->update([
            'payment_status' => $this->payment_status,
            'payment_method' => $this->payment_method,
            'amount_paid' => $this->amount_paid,
            'warranty_expiry' => $warranty_date,
        ]);

        session()->flash('success', 'Payment processed successfully!');
    }

    public function render()
    {
        return view('livewire.repair-payment');
    }
}
