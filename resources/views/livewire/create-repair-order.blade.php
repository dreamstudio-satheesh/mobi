<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Create Repair Order</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit="saveOrder">
                        <div class="mb-3">
                            <label for="customer" class="form-label">Customer</label>
                            <select wire:model.live="customer_id" class="form-control">
                                <option value="">Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->mobile }}</option>
                                @endforeach
                            </select>
                            @error('customer_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Device Brand</label>
                            <input type="text" wire:model.live="device_brand" class="form-control" placeholder="e.g. Apple, Samsung">
                            @error('device_brand') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Device Model</label>
                            <input type="text" wire:model.live="device_model" class="form-control" placeholder="e.g. iPhone 13, Galaxy S21">
                            @error('device_model') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Serial Number (Optional)</label>
                            <input type="text" wire:model.live="serial_number" class="form-control">
                            @error('serial_number') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Issue Description</label>
                            <textarea wire:model.live="issue_description" class="form-control" rows="3"></textarea>
                            @error('issue_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estimated Cost (₹)</label>
                            <input type="number" wire:model.live="estimated_cost" class="form-control">
                            @error('estimated_cost') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Expected Completion Date</label>
                            <input type="date" wire:model.live="expected_completion_date" class="form-control">
                            @error('expected_completion_date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select wire:model.live="priority" class="form-control">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                            @error('priority') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('admin/repairs') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Repair Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
