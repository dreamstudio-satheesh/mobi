<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductManager extends Component
{
    use WithPagination;

    public $productId;
    public $category_id;
    public $supplier_id;
    public $name;
    public $description;
    public $sku;
    public $condition; // Options: new, refurbished, second-hand
    public $stock = 0;
    public $purchase_price;
    public $selling_price;
    public $discount = 0;
    public $currency = 'USD';
    public $search = '';
    public $showForm = false; // new property

    protected $paginationTheme = 'bootstrap';

    protected function rules()
    {
        return [
            'category_id'    => 'required|exists:categories,id',
            'supplier_id'    => 'nullable|exists:suppliers,id',
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            // Adjust unique rule when updating
            'sku'            => 'required|string|max:255|unique:products,sku,' . $this->productId,
            'condition'      => 'nullable|in:new,refurbished,second-hand',
            'stock'          => 'required|integer|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'discount'       => 'nullable|numeric|min:0',
            'currency'       => 'required|string|max:10',
        ];
    }

    public function render()
    {
        $products = Product::with(['category', 'supplier'])
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $categories = Category::orderBy('name')->get();
        $suppliers  = Supplier::orderBy('name')->get();

        return view('livewire.product-manager', compact('products', 'categories', 'suppliers'));
    }

    public function resetInputFields()
    {
        $this->productId = null;
        $this->category_id = '';
        $this->supplier_id = '';
        $this->name = '';
        $this->description = '';
        $this->sku = '';
        $this->condition = '';
        $this->stock = 0;
        $this->purchase_price = '';
        $this->selling_price = '';
        $this->discount = 0;
        $this->currency = 'USD';
        $this->showForm = false;
    }

    public function store()
    {
        $this->validate();

        Product::updateOrCreate(['id' => $this->productId], [
            'category_id'    => $this->category_id,
            'supplier_id'    => $this->supplier_id,
            'name'           => $this->name,
            'description'    => $this->description,
            'sku'            => $this->sku,
            'condition'      => $this->condition,
            'stock'          => $this->stock,
            'purchase_price' => $this->purchase_price,
            'selling_price'  => $this->selling_price,
            'discount'       => $this->discount,
            'currency'       => $this->currency,
        ]);

        session()->flash('message', 'Product ' . ($this->productId ? 'updated' : 'created') . ' successfully!');
        $this->resetInputFields();
        $this->showForm = false; // hide form after save
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId      = $product->id;
        $this->category_id    = $product->category_id;
        $this->supplier_id    = $product->supplier_id;
        $this->name           = $product->name;
        $this->description    = $product->description;
        $this->sku            = $product->sku;
        $this->condition      = $product->condition;
        $this->stock          = $product->stock;
        $this->purchase_price = $product->purchase_price;
        $this->selling_price  = $product->selling_price;
        $this->discount       = $product->discount;
        $this->currency       = $product->currency;
        $this->showForm = true; // show form when editing
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('message', 'Product deleted successfully!');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->showForm = true; // show form on create
    }
}
