<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->get('limit');

        if ($limit) {
            return response()->json(Phone::limit($limit)->get());
        }

        return response()->json(Phone::get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'lyrics' => 'required|string',
            'artist' => 'required|string',
            'image_url' => 'required|url',
        ]);

        $phone = Phone::create($request->all());

        return response()->json($phone);
    }

    public function show(Phone $phone)
    {
        return response()->json($phone);
    }

    public function update(Request $request, phone $phone)
    {
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
        ]);

        $phone->update($request->all());

        return response()->json($phone);
    }

    public function destroy(phone $phone)
    {
        $phone->delete();

        return response()->json(['message' => 'Phone deleted']);
    }

}
