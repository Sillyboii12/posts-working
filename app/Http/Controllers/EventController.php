<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function show()
    {
        $event = new Event("Dance", "2025-3-5", 40);
        return view("events.event")->with($event->showInfo());

    }
    public function index()
    {
        $events = [
            new Event("Dance", "2025-3-5", 40),
            new Event("Cylcing", "2024-3-8", 20),
            new Event("Festival", "2026-8-8", 400),
        ];
        return view("events.index", ['events' => $events]);
    }
}
