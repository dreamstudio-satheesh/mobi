<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InventoryTransaction;
use App\Models\Product;

class InventoryManager extends Component
{
    use WithPagination;

    public $product_id;
    public $transaction_type = 'stock_in'; // default transaction type
    public $quantity;
    public $notes = '';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'product_id'       => 'required|exists:products,id',
        'transaction_type' => 'required|in:stock_in,stock_out,return,adjustment',
        'quantity'         => 'required|integer|min:1',
        'notes'            => 'nullable|string',
    ];

    public function render()
    {
        $transactions = InventoryTransaction::with('product')
            ->orderBy('transaction_date', 'desc')
            ->paginate(10);
        $products = Product::orderBy('name')->get();

        return view('livewire.inventory-manager', compact('transactions', 'products'));
    }

    public function store()
    {
        $this->validate();

        // Create inventory transaction
        $transaction = InventoryTransaction::create([
            'product_id'       => $this->product_id,
            'transaction_type' => $this->transaction_type,
            'quantity'         => $this->quantity,
            'notes'            => $this->notes,
            'transaction_date' => now(),
        ]);

        // Update the associated product's stock
        $product = Product::find($this->product_id);
        if (in_array($this->transaction_type, ['stock_in', 'return'])) {
            $product->stock += $this->quantity;
        } elseif ($this->transaction_type === 'stock_out') {
            $product->stock -= $this->quantity;
        } elseif ($this->transaction_type === 'adjustment') {
            // For adjustment, you might allow negative values or specify the logic
            $product->stock += $this->quantity;
        }
        $product->save();

        session()->flash('message', 'Inventory transaction recorded successfully!');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->product_id = null;
        $this->transaction_type = 'stock_in';
        $this->quantity = null;
        $this->notes = '';
    }
}
