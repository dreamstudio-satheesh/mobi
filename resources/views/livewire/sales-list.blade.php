<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between mb-3">
                <h4>Sales Transactions</h4>
                <a href="{{ url('/admin/sales/create') }}" class="btn btn-primary">Create Sale</a>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Search by customer name, mobile, or invoice"
                        wire:model.debounce.500ms="search">
                </div>
                <div class="col-md-2">
                    <select class="form-control" wire:model="filterStatus">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" wire:model="dateFrom">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" wire:model="dateTo">
                </div>
            </div>
        </div>

        <div class="card-body">


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Payment Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sales as $index => $sale)
                        <tr>
                            <td>{{ $sales->firstItem() + $index }}</td>
                            <td>{{ $sale->invoice_number }}</td>
                            <td>{{ $sale->customer ? $sale->customer->name : 'Guest' }}</td>
                            <td>₹{{ number_format($sale->total, 2) }}</td>
                            <td>
                                <span
                                    class="badge 
                                {{ $sale->payment_status == 'paid' ? 'bg-success' : ($sale->payment_status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                    {{ ucfirst($sale->payment_status) }}
                                </span>
                            </td>
                            <td>{{ $sale->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('admin.sales.invoice', $sale->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.sales.invoice.download', ['saleId' => $sale->id, 'template' => 'invoice-1']) }}" target="_blank" class="btn btn-sm btn-primary">Print</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No sales found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $sales->links() }}
            </div>

        </div>
    </div>
</div>
