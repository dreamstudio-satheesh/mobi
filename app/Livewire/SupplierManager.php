<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class SupplierManager extends Component
{
    use WithPagination;

    public $supplierId;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $notes;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:50',
        'address' => 'nullable|string|max:255',
        'notes' => 'nullable|string',
    ];

    public function render()
    {
        $suppliers = Supplier::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.supplier-manager', compact('suppliers'));
    }

    public function resetInputFields()
    {
        $this->supplierId = null;
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->notes = '';
    }

    public function store()
    {
        $this->validate();

        Supplier::updateOrCreate(['id' => $this->supplierId], [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);

        session()->flash('message', 'Supplier ' . ($this->supplierId ? 'updated' : 'created') . ' successfully!');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $this->supplierId = $supplier->id;
        $this->name = $supplier->name;
        $this->email = $supplier->email;
        $this->phone = $supplier->phone;
        $this->address = $supplier->address;
        $this->notes = $supplier->notes;
    }

    public function delete($id)
    {
        Supplier::findOrFail($id)->delete();
        session()->flash('message', 'Supplier deleted successfully!');
    }

    public function create()
    {
        $this->resetInputFields();
    }
}
