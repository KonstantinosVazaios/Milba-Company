<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sport;
use App\Models\Order;

class Statistics extends Component
{
    public $watersports;
    public $total_income;
    public $income_cash;
    public $income_credit;

    public function mount()
    {
        $this->watersports = Sport::withSum('orders', 'price')->get();
        $this->total_income = Order::sum('price');
        $this->income_cash = Order::where('payment_method', 'CASH')->sum('price');
        $this->income_credit = Order::where('payment_method', 'CARD')->sum('price');
    }

    public function render()
    {
        return view('livewire.statistics');
    }
}
