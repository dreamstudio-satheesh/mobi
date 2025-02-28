<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;

class SalesInvoice extends Component
{
    public $sale;

    public function mount($saleId)
    {
        $this->sale = Sale::with(['customer', 'salesItems.product'])->findOrFail($saleId);
    }

    public function render()
    {
        return view('livewire.sales-invoice');
    }

    public function printInvoice()
    {
        return response()->streamDownload(function () {
            echo view('livewire.sales-invoice', ['sale' => $this->sale])->render();
        }, "Invoice-{$this->sale->invoice_number}.pdf");
    }
}
