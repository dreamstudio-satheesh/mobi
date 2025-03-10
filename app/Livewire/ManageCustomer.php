<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

class ManageCustomer extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    // Properties for the create/edit form
    public $customerId, $name, $email, $mobile;
    public $modalFormVisible = false;

    protected $rules = [
        'name'  => 'required|min:3',
        'email' => 'nullable|email',
        'mobile' => 'required|unique:customers,mobile',
    ];

    // Reset pagination when search updates
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Toggle sorting field/direction
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $customers = Customer::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.manage-customer', [
            'customers' => $customers,
        ]);
    }

    // Show the modal for creating a new customer
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    // Create a new customer
    public function create()
    {
        $this->validate();
        Customer::create([
            'name'  => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);
        $this->modalFormVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('close-modal'); // Dispatch event to close modal
        session()->flash('message', 'Customer successfully added.');
    }

    // Show modal for editing an existing customer
    public function edit($id)
    {
        $this->resetValidation();
        $this->customerId = $id;
        $customer = Customer::findOrFail($id);
        $this->name  = $customer->name;
        $this->email = $customer->email;
        $this->mobile = $customer->mobile;
        $this->modalFormVisible = true;
    }

    // Update customer data
    public function update()
    {
        $rules = [
            'name'  => 'required|min:3',
            'email' => 'nullable|email',
            'mobile' => 'required|unique:customers,mobile,' . $this->customerId,
        ];
        $this->validate($rules);
        $customer = Customer::find($this->customerId);
        $customer->update([
            'name'  => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);
        $this->modalFormVisible = false;
        session()->flash('message', 'Customer successfully updated.');
    }

    // Delete a customer
    public function delete($id)
    {
        Customer::find($id)->delete();
        session()->flash('message', 'Customer successfully deleted.');
    }
}
