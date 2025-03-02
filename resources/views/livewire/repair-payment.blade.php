<div>
    <div class="card">
        <div class="card-header">
            <h5>Payment & Warranty - Order #{{ $repairOrder->repair_id }}</h5>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form wire:submit.prevent="processPayment">
                <div class="mb-3">
                    <label class="form-label">Payment Status</label>
                    <select wire:model="payment_status" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>

                <div class="mb-3" wire:ignore.self>
                    <label class="form-label">Payment Method</label>
                    <select wire:model="payment_method" class="form-select">
                        <option value="">Select Payment Method</option>
                        <option value="cash">Cash</option>
                        <option value="upi">UPI</option>
                        <option value="card">Card</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount Paid (₹)</label>
                    <input type="number" wire:model="amount_paid" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Warranty Period</label>
                    <select wire:model="warranty_expiry" class="form-select">
                        @foreach ($warranty_options as $label => $value)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Confirm Payment</button>
            </form>
        </div>
    </div>
</div>
