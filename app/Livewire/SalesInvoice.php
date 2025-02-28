<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesInvoice extends Component
{
    public $sale;
    public $template;

    public function mount($saleId, $template = 'invoice-1')
    {
        $this->sale = Sale::with(['customer', 'salesItems.product'])->findOrFail($saleId);
        $this->template = $template; // Default to invoice-1
    }

    public function render()
    {
        return view("invoices.{$this->template}", ['sale' => $this->sale]);
    }

    public function downloadPDF($saleId, $template = 'invoice-1')
    {
        $this->sale = Sale::with(['customer', 'salesItems.product'])->findOrFail($saleId);
        $this->template = $template; // Default to invoice-1
        $pdf = Pdf::loadView("invoices.{$this->template}", ['sale' => $this->sale])->setPaper('a4');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, "Invoice-{$this->sale->invoice_number}.pdf");
    }
}
