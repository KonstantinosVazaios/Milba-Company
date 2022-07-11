<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class WatersportController extends Controller
{
    public function show(Sport $watersport)
    {
        return view('backoffice.watersports.show', compact('watersport'));
    }

    public function create()
    {
        return view('backoffice.watersports.create');
    }

    public function store()
    {
        
    }
}
