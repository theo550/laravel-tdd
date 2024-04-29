<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        return Event::all();
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->date = $request->date;
        $event->address = $request->address;
        $event->city = $request->city;

        $event->save();

        return response()->json($event);
    }
}
