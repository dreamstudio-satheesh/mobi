<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <!-- Header Section with Search & Add Customer Button -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search customers..."
                            class="form-control w-50">
                        <button wire:click="createShowModal" class="btn btn-primary">Add Customer</button>
                    </div>

                    <!-- Customers Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th wire:click="sortBy('name')" style="cursor: pointer;">Name</th>
                                <th wire:click="sortBy('email')" style="cursor: pointer;">Email</th>
                                <th wire:click="sortBy('mobile')" style="cursor: pointer;">Mobile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>
                                        <button wire:click="edit({{ $customer->id }})"
                                            class="btn btn-warning btn-sm">Edit</button>
                                        <button wire:click="delete({{ $customer->id }})" class="btn btn-danger btn-sm"
                                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $customers->links() }}
                    </div>

                    <!-- Bootstrap Modal for Create/Edit -->
                    @if ($modalFormVisible)
                        <div class="modal fade show d-block" tabindex="-1" role="dialog"
                            style="background: rgba(0,0,0,0.5);">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $customerId ? 'Edit Customer' : 'Add Customer' }}
                                        </h5>
                                        <button type="button" class="btn-close"
                                            wire:click="$set('modalFormVisible', false)"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="{{ $customerId ? 'update' : 'create' }}">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" wire:model="name" class="form-control">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" wire:model="email" class="form-control">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">mobile</label>
                                                <input type="text" wire:model="mobile" class="form-control">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" wire:click="$set('modalFormVisible', false)"
                                                    class="btn btn-secondary">Cancel</button>
                                                <button type="submit"
                                                    class="btn btn-primary">{{ $customerId ? 'Update' : 'Save' }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Session Message -->
                    @if (session()->has('message'))
                        <div class="alert alert-success mt-4">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>


@section('breadcrumb')
    <div class="col-auto header-right-wrapper page-title">
        <div>
            <h2>Customer Management</h2>
            <nav>
                <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                    <li class="breadcrumb-item f-w-500">{{ config('app.name') }}</li>
                    <li class="breadcrumb-item f-w-500 active">Customer Management</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
