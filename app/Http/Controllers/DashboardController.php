<?php

namespace App\Http\Controllers;

use App\Models\PastEvent;

class DashboardController extends Controller
{
    public function index()
    {
        $pastEvents = PastEvent::latest()->paginate(10);
        return view('dashboard', compact('pastEvents'));
    }
}
