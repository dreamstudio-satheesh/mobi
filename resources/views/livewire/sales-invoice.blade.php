<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header text-center">
            <h3>Invoice</h3>
            <strong>{{ config('app.name') }}</strong><br>
            <small>Invoice No: {{ $sale->invoice_number }}</small><br>
            <small>Date: {{ $sale->created_at->format('d-m-Y') }}</small>
        </div>
        <div class="card-body">
            <h5>Customer Details</h5>
            <p><strong>Name:</strong> {{ $sale->customer ? $sale->customer->name : 'Guest' }}</p>
            <p><strong>Mobile:</strong> {{ $sale->customer ? $sale->customer->mobile : 'N/A' }}</p>

            <h5>Order Summary</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale->salesItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹{{ number_format($item->price, 2) }}</td>
                            <td>₹{{ number_format($item->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5>Payment Details</h5>
            <p><strong>Subtotal:</strong> ₹{{ number_format($sale->subtotal, 2) }}</p>
            <p><strong>Discount:</strong> ₹{{ number_format($sale->discount, 2) }}</p>
            <p><strong>Total:</strong> ₹{{ number_format($sale->total, 2) }}</p>
            <p><strong>Payment Status:</strong> <span class="badge bg-{{ $sale->payment_status == 'paid' ? 'success' : 'warning' }}">{{ ucfirst($sale->payment_status) }}</span></p>
            <p><strong>Payment Method:</strong> {{ ucfirst($sale->payment_method) }}</p>

            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" onclick="window.history.back()">Back</button>
                <button class="btn btn-primary" onclick="printInvoice()">Print Invoice</button>
            </div>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>
