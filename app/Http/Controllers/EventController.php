<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function show(int $id)
    {
        return response()->json(Event::findOrfail($id));
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->date = $request->date;
        $event->address = $request->address;
        $event->types_id = $request->types_id;

        $event->cities()->attach($request->cities_id);

        $event->save();

        return response()->json($event);
    }

    public function delete(Request $request)
    {
        $event = Event::find($request->id);

        $event->delete();

        return response()->json(Event::all());
    }

    public function update(Request $request)
    {
        $event = Event::find($request->id);

        $event->name = $request->name;
        $event->save();

        return response()->json($event);
    }

    public function getEventByCity (int $id)
    {
        $events = Event::with('cities')
            ->where('cities', '=', $id)
            ->get();
        return response()->json($events);
    }
}
