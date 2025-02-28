<div>

    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <!-- Company Header -->
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
                    <div>
                        <h3 class="fw-bold text-primary">INVOICE</h3>
                        <p class="mb-0"><strong>Invoice No:</strong> #{{ $sale->invoice_number }}</p>
                        <p class="mb-0"><strong>Date:</strong> {{ $sale->created_at->format('d M, Y') }}</p>
                    </div>
                    <div class="text-end">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Company Logo" width="150">
                        <p class="mb-0 fw-bold">DreamCoderZ</p>
                        <p class="mb-0">2/104 Ganapany Maanagar,</p>
                        <p class="mb-0">Paapampatti, Coimbatore - 641016</p>
                        <p class="mb-0">Email: admin@dreamcoderz.com</p>
                        <p class="mb-0">Phone: 6379108040, 9600673035</p>
                        <p class="mb-0"><strong>GSTIN:</strong> 33AAAAA1234A1Z5</p> <!-- Dummy GST Number -->
                    </div>
                </div>

                <!-- Billing Information -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold">Billed To:</h5>
                        <p class="mb-0">{{ $sale->customer ? $sale->customer->name : 'Guest' }}</p>
                        <p class="mb-0">{{ $sale->customer ? $sale->customer->mobile : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5 class="fw-bold">Payment Details:</h5>
                        <p class="mb-0"><strong>Method:</strong> {{ ucfirst($sale->payment_method) }}</p>
                        <p class="mb-0"><strong>Status:</strong>
                            <span class="badge bg-{{ $sale->payment_status == 'paid' ? 'success' : 'warning' }}">
                                {{ ucfirst($sale->payment_status) }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>Description</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->salesItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td class="text-center">₹{{ number_format($item->price, 2) }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">₹{{ number_format($item->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Invoice Summary -->
                <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                    
                    <div>
                        <div class="d-print-none">
                            <button class="btn btn-primary me-2" onclick="window.print();">Print</button>
                        <a href="{{ route('admin.sales.invoice.download', ['saleId' => $sale->id, 'template' => 'invoice-1']) }}"
                            class="btn btn-success">Download PDF</a>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <p class="mb-0"><strong>Subtotal:</strong> ₹{{ number_format($sale->subtotal, 2) }}</p>
                        <p class="mb-0"><strong>Discount (10%):</strong>
                            -₹{{ number_format($sale->subtotal * 0.1, 2) }}</p>
                        <p class="mb-0"><strong>GST (18%):</strong>
                            ₹{{ number_format(($sale->subtotal - $sale->subtotal * 0.1) * 0.18, 2) }}</p>
                        <h5 class="fw-bold">Grand Total:
                            ₹{{ number_format(($sale->subtotal - $sale->subtotal * 0.1) * 1.18, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@section('breadcrumb')
    <div class="col-auto header-right-wrapper page-title">
        <div>
            <h2>Invoice</h2>
            <nav>
                <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item f-w-500">E-commerce</li>
                    <li class="breadcrumb-item f-w-500 active">Invoice-2</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
