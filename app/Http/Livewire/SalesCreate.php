<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SalesItem;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InventoryTransaction;

class SalesCreate extends Component
{
    use WithPagination;

    public $customers;
    public $customer_id;
    public $search = '';
    public $cart = [];
    public $subtotal = 0;
    public $discount = 0;
    public $total = 0;
    public $payment_method = 'cash';

    public function mount()
    {
        $this->customers = Customer::all();
    }

    public function addProduct($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return;
        }

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += 1;
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->selling_price,
                'quantity' => 1,
                'subtotal' => $product->selling_price,
            ];
        }

        $this->calculateTotal();
    }

    public function removeProduct($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
        }
        $this->calculateTotal();
    }

    public function updateQuantity($productId, $quantity)
    {
        if (isset($this->cart[$productId]) && $quantity > 0) {
            $this->cart[$productId]['quantity'] = $quantity;
            $this->cart[$productId]['subtotal'] = $this->cart[$productId]['price'] * $quantity;
        }
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->subtotal = array_sum(array_column($this->cart, 'subtotal'));
        $this->total = $this->subtotal - $this->discount;
    }

    public function saveSale()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Please add products to the cart.');
            return;
        }

        $sale = Sale::create([
            'customer_id' => $this->customer_id,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'total' => $this->total,
            'payment_status' => 'paid',
            'payment_method' => $this->payment_method,
            'invoice_number' => 'INV-' . time(),
        ]);

        foreach ($this->cart as $item) {
            SalesItem::create([
                'sale_id' => $sale->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);

            // Reduce stock and log inventory transaction
            $product = Product::find($item['id']);
            if ($product) {
                $product->stock -= $item['quantity'];
                $product->save();

                // Log stock_out transaction
                InventoryTransaction::create([
                    'product_id' => $product->id,
                    'transaction_type' => 'stock_out',
                    'quantity' => $item['quantity'],
                    'notes' => "Sale Invoice: {$sale->invoice_number}",
                ]);
            }
        }

        session()->flash('success', 'Sale created successfully.');
        return redirect()->route('admin.sales.list');
    }

    public function render()
    {
        $products = Product::where('stock', '>', 0)
            ->where(function ($query) {
                $query->where('name', 'like', "%{$this->search}%")->orWhere('sku', 'like', "%{$this->search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6); // Show only 8 products per page

        return view('livewire.sales-create', compact('products'));
    }
}
