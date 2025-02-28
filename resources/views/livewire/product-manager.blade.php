<div>
    <div class="row">
        @if(!$showForm)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8 d-flex">
                                    <h5 class="mt-2">Products</h5>
                                    <input wire:model.debounce.300ms="search" type="text" style="max-width: 200px" class="form-control ms-2"
                                        placeholder="Search Products...">
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <button wire:click="create" class="btn btn-primary">Create Product</button>
                            </div>
                        </div>
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
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                                        <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <button wire:click="edit({{ $product->id }})"
                                                class="btn btn-primary btn-sm">Edit</button>
                                            <button wire:click="delete({{ $product->id }})"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Products Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        @endif

    <!-- Form: Display create/edit only if active -->
    @if($showForm)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $productId ? 'Edit Product' : 'Create Product' }}</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <!-- Category -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Category</label>
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Supplier -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Supplier</label>
                                <select class="form-control" wire:model="supplier_id">
                                    <option value="">Select Supplier (Optional)</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Name -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Name</label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- Description -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Description</label>
                                <textarea class="form-control" wire:model="description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- SKU -->
                            <div class="form-group mb-2 col-md-4">
                                <label>SKU</label>
                                <input type="text" class="form-control" wire:model="sku">
                                @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Condition -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Condition</label>
                                <select class="form-control" wire:model="condition">
                                    <option value="">Select Condition</option>
                                    <option value="new">New</option>
                                    <option value="refurbished">Refurbished</option>
                                    <option value="second-hand">Second-hand</option>
                                </select>
                                @error('condition') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- Stock -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Stock</label>
                                <input type="number" class="form-control" wire:model="stock">
                                @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Purchase Price -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Purchase Price</label>
                                <input type="number" step="0.01" class="form-control" wire:model="purchase_price">
                                @error('purchase_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Selling Price -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Selling Price</label>
                                <input type="number" step="0.01" class="form-control" wire:model="selling_price">
                                @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- Discount -->
                            <div class="form-group mb-2 col-md-4">
                                <label>Discount</label>
                                <input type="number" step="0.01" class="form-control" wire:model="discount">
                                @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                        <button type="button" wire:click="resetInputFields" class="btn btn-secondary mt-2">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
</div>