<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public static function show()
    {
        $event = new Event("Dance", "2025-3-5", 40);
        return view("events.event")->with($event->showInfo());

    }
}
