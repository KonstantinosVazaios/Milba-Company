<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sport;
use App\Models\Order;
use Carbon\Carbon;

class Statistics extends Component
{
    public $selectedDate = NULL;

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

    public function updatedSelectedDate($date)
    {
        if (!is_null($date)) {
            $carbonDate = new Carbon($date);
            $this->watersports = collect();
            $this->total_income = Order::whereDate('created_at', '=', $carbonDate)->sum('price');
            $this->income_cash = Order::whereDate('created_at', '=', $carbonDate)->where('payment_method', 'CASH')->sum('price');
            $this->income_credit = Order::whereDate('created_at', '=', $carbonDate)->where('payment_method', 'CARD')->sum('price');
        }
    }
}
