<?php

namespace App\Livewire;

use App\Models\RepairOrder;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RepairOrders extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = 'all';
    public $selectedOrder;
    public $selectedTechnician;

    public function updateStatus($orderId, $newStatus)
    {
        $order = RepairOrder::findOrFail($orderId);
        $order->status = $newStatus;
        $order->save();

        session()->flash('success', "Order #{$order->repair_id} updated to {$newStatus}");
    }

    public function assignTechnician($orderId)
    {
        $this->selectedOrder = RepairOrder::findOrFail($orderId);
        $this->selectedTechnician = null;
        $this->dispatch('assignTechnicianModal');
    }

    public function saveTechnicianAssignment()
    {
        if ($this->selectedOrder && $this->selectedTechnician) {
            $this->selectedOrder->update([
                'technician_id' => $this->selectedTechnician,
                'status' => 'In Progress',
            ]);

            session()->flash('success', "Technician assigned to Order #{$this->selectedOrder->repair_id}");
            $this->selectedOrder = null;
            $this->selectedTechnician = null;
        }
    }

    public function render()
    {
        $query = RepairOrder::query();

        if ($this->search) {
            $query->where('repair_id', 'like', "%{$this->search}%")
                ->orWhereHas('customer', function ($q) {
                    $q->where('name', 'like', "%{$this->search}%");
                });
        }

        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(10);
        $technicians = User::role('repair_technician')->get(); // Fetch only users with repair_technician role

        return view('livewire.repair-orders', compact('orders', 'technicians'));
    }
}
