<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('backoffice.orders.index');
    }

    public function create()
    {
        return view('backoffice.orders.create');
    }
}
