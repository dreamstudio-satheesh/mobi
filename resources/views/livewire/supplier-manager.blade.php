
<div>
    <div class="row">
        <!-- Suppliers List -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Suppliers</h5>
                    <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search Suppliers...">
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                                <tr>
                                    <td>{{ ($suppliers->currentPage() - 1) * $suppliers->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>
                                        <button wire:click="edit({{ $supplier->id }})" class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="delete({{ $supplier->id }})" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Suppliers Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>

        <!-- Create/Update Supplier Form -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $supplierId ? 'Edit Supplier' : 'Create Supplier' }}</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label>Phone</label>
                            <input type="text" class="form-control" wire:model="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label>Address</label>
                            <input type="text" class="form-control" wire:model="address">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label>Notes</label>
                            <textarea class="form-control" wire:model="notes"></textarea>
                            @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" wire:click="resetInputFields" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   