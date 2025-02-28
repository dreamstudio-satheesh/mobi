<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between mb-3">
                <h4>Create Sales Order</h4>
                <a href="{{ route('admin.sales.list') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Customer</label>
                    <select class="form-control" wire:model="customer_id">
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->mobile }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Payment Method</label>
                    <select class="form-control" wire:model="payment_method">
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="upi">UPI</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Products</label>
                    <input type="text" class="form-control mb-3" placeholder="Search products by name or SKU" wire:model="search">
                </div>
            </div>

            

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-2 mb-3">
                        <div class="card">
                            <div class="p-1 text-center">
                                <h6>{{ $product->name }}</h6>
                                <p>₹{{ number_format($product->selling_price, 2) }}</p>
                                <button class="btn btn-primary btn-sm" wire:click="addProduct({{ $product->id }})">Add</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>

            <h5>Cart</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>₹{{ number_format($item['price'], 2) }}</td>
                            <td>
                                <input type="number" class="form-control" style="max-width:160px" min="1" wire:model="cart.{{ $item['id'] }}.quantity" wire:change="updateQuantity({{ $item['id'] }}, $event.target.value)">
                            </td>
                            <td>₹{{ number_format($item['subtotal'], 2) }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" wire:click="removeProduct({{ $item['id'] }})">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5>Summary</h5>
            <p>Subtotal: ₹{{ number_format($subtotal, 2) }}</p>
            <p>Discount: ₹{{ number_format($discount, 2) }}</p>
            <p>Total: ₹{{ number_format($total, 2) }}</p>

            <button class="btn btn-success" wire:click="saveSale">Complete Sale</button>
        </div>
    </div>
</div>
