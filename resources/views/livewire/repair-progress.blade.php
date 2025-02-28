<div>
    <div class="card">
        <div class="card-header">
            <h5>Repair Progress - Order #{{ $repairOrder->repair_id }}</h5>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <h6>Current Status: <span class="badge bg-primary">{{ $repairOrder->status }}</span></h6>

            <form wire:submit.prevent="updateProgress">
                <div class="mb-3">
                    <label class="form-label">Update Status</label>
                    <select wire:model="status" class="form-select">
                        @foreach ($repair_steps as $step)
                            <option value="{{ $step }}">{{ $step }}</option>
                        @endforeach
                    </select>
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Progress Notes</label>
                    <textarea wire:model="progress_notes" class="form-control" rows="3" placeholder="Add repair update..."></textarea>
                    @error('progress_notes') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-success">Update Progress</button>
            </form>

            <hr>

            <h6>Progress Timeline:</h6>
            <div class="bg-light p-3 rounded">
                @if ($repairOrder->progress_notes)
                    <pre>{{ $repairOrder->progress_notes }}</pre>
                @else
                    <p>No updates yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
