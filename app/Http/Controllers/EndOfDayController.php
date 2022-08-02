<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endofday;
use App\Models\Order;

class EndOfDayController extends Controller
{
    public function index()
    {   
        return view('backoffice.endofday.index');
    }
}
