<div>
    <div class="row">
        <!-- Transactions List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Inventory Transactions</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ ($transactions->currentPage()-1)*$transactions->perPage()+$loop->index+1 }}</td>
                                    <td>{{ $transaction->product->name }}</td>
                                    <td>{{ ucfirst($transaction->transaction_type) }}</td>
                                    <td>{{ $transaction->quantity }}</td>
                                    <td>{{ $transaction->transaction_date }}</td>
                                    <td>{{ $transaction->notes }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No transactions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>

        <!-- New Transaction Form -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add Transaction</h5>
                </div>
                <div class="card-body">
                    <form wire:submit="store">
                        <div class="mb-2">
                            <label>Product</label>
                            <select class="form-control" wire:model.live="product_id">
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->stock }})</option>
                                @endforeach
                            </select>
                            @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Transaction Type</label>
                            <select class="form-control" wire:model.live="transaction_type">
                                <option value="stock_in">Stock In</option>
                                <option value="stock_out">Stock Out</option>
                                <option value="return">Return</option>
                                <option value="adjustment">Adjustment</option>
                            </select>
                            @error('transaction_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Quantity</label>
                            <input type="number" class="form-control" wire:model.live="quantity">
                            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Notes</label>
                            <textarea class="form-control" wire:model.live="notes"></textarea>
                            @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Save Transaction</button>
                        <button type="button" wire:click="resetInputFields" class="btn btn-secondary mt-2">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>