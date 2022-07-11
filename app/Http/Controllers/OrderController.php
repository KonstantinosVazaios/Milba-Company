<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->with('sport:id,title')->get();
        return view('backoffice.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('backoffice.orders.create');
    }
}
