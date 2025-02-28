<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class SalesList extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = '';
    public $dateFrom, $dateTo;
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $sales = Sale::with('customer')
            ->when($this->search, function ($query) {
                $query->whereHas('customer', function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                      ->orWhere('mobile', 'like', "%{$this->search}%");
                })->orWhere('invoice_number', 'like', "%{$this->search}%");
            })
            ->when($this->filterStatus, function ($query) {
                $query->where('payment_status', $this->filterStatus);
            })
            ->when($this->dateFrom && $this->dateTo, function ($query) {
                $query->whereBetween('created_at', [$this->dateFrom, $this->dateTo]);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.sales-list', compact('sales'));
    }
}
