<?php

namespace App\Http\Controllers;

use App\Models\PastEvent;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $pastEvents = PastEvent::latest()->get();

        return view('welcome', [
            'pastEvents' => $pastEvents
        ]);
    }

    public function show(PastEvent $pastEvent): View
    {
        return view('events.show', [
            'event' => $pastEvent
        ]);
    }
}
