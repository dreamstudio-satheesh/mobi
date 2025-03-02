<?php


namespace App\Livewire;

use App\Models\RepairOrder;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RepairProgress extends Component
{
    public $repairOrder;
    public $progress_notes;
    public $repair_progress;
    public $repair_steps = [
        'Diagnosis Completed',
        'Waiting for Parts',
        'Repair Ongoing',
        'Quality Check',
        'Completed'
    ];

    protected $rules = [
        'progress_notes' => 'required|string|max:500',
        'repair_progress' => 'required|in:Diagnosis Completed,Waiting for Parts,Repair Ongoing,Quality Check,Completed'
    ];

    public function mount(RepairOrder $repairOrder)
    {
        $this->repairOrder = $repairOrder;
        $this->repair_progress = $repairOrder->repair_progress;
    }

    public function updateProgress()
    {
        $this->validate();

        // Ensure only technicians can update progress
        if (!Auth::user()->hasRole('repair_technician')) {
            session()->flash('error', 'You do not have permission to update this repair.');
            return;
        }

        // Update Repair Order Status
        $this->repairOrder->update([
            'repair_progress' => $this->repair_progress,
            'progress_notes' => now()->format('d M Y H:i') . " - " . Auth::user()->name . ": " . $this->progress_notes
        ]);

        session()->flash('success', 'Repair progress updated successfully!');
    }

    public function render()
    {
        return view('livewire.repair-progress');
    }
}
