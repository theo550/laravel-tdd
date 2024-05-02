<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function show ()
    {
        return response()->json(Type::all());
    }

    public function store (Request $request)
    {
        $type = new Type();
        $type->name = $request->name;

        $type->save();

        return response()->json($type);
    }

    public function delete (Request $request)
    {
        $type = Type::findOrFail($request->id);
        $type->delete();

        return response()->json(Type::all());
    }

    public function update (Request $request)
    {
        $type = Type::findOrFail($request->id);
        $type->name = $request->name;

        return response()->json($type);
    }
}
