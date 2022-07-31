<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endofday;
use App\Models\Order;

class EndOfDayController extends Controller
{
    public function index()
    {
        // $terminations = Endofday::orderBy('created_at', 'ASC')->get();
        // $termination = Endofday::find(2);
        // $total = Order::whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->sum('price');
        // $totalCash = Order::where('payment_method', 'CASH')->whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->sum('price');
        // $totalCredit = Order::where('payment_method', 'CARD')->whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->sum('price');
        // $sports = Order::whereBetween('created_at', [$termination->datetime_from, $termination->datetime_to])->with('sport')->get()->groupBy('sport.title')->map->sum('price');
        
        return view('backoffice.endofday.index');
    }
}
