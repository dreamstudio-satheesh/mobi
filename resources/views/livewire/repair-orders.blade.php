<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Repair Orders</h5>
            <input type="text" wire:model="search" class="form-control w-25" placeholder="Search Repair ID or Customer">
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Repair ID</th>
                        <th>Customer</th>
                        <th>Device</th>
                        <th>Status</th>
                        <th>Technician</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->repair_id }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->device_brand }} - {{ $order->device_model }}</td>
                            <td>
                                <select wire:change="updateStatus({{ $order->id }}, $event.target.value)"
                                    class="form-select">
                                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="In Progress" {{ $order->status == 'In Progress' ? 'selected' : '' }}>
                                        In Progress</option>
                                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                        Delivered</option>
                                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                </select>
                            </td>

                            @if (Auth::user()->hasRole('repair_technician'))
                                <td> <a href="{{ route('repairs.progress', $order->id) }}"
                                        class="btn btn-sm btn-warning">Update Progress</a>

                                </td>
                            @else
                                <td>{{ $order->technician ? $order->technician->first_name : 'Not Assigned' }}</td>
                            @endif
                            <td>
                                <button wire:click="assignTechnician({{ $order->id }})"
                                    class="btn btn-sm btn-primary">Assign Technician</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $orders->links() }}
        </div>
    </div>

    <!-- Assign Technician Modal -->
    <div class="modal fade" id="assignTechnicianModal" tabindex="-1" aria-labelledby="assignTechnicianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Technician</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="technician" class="form-label">Select Technician</label>
                    <select wire:model="selectedTechnician" class="form-control">
                        <option value="">Select Technician</option>
                        @foreach ($technicians as $technician)
                            <option value="{{ $technician->id }}">{{ $technician->first_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" wire:click="saveTechnicianAssignment" class="btn btn-primary">Assign
                        Technician</button>
                </div>
            </div>
        </div>
    </div>
</div>



@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('assignTechnicianModal', () => {
                var myModal = new bootstrap.Modal(document.getElementById('assignTechnicianModal'));
                myModal.show();
            });
        });
    </script>
@endsection
