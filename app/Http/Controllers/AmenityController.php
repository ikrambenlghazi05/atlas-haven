<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::latest()->paginate(10);
        return view('content.amenities.list', compact('amenities'));
    }

    public function create()
    {
        return view('content.amenities.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:amenities',
            'icon' => 'nullable|string|max:255', // Added icon validation
            'description' => 'nullable|string',
        ]);

        Amenity::create($request->all());

        return redirect()->route('amenities.list')->with('success', 'Amenity created successfully!');
    }

    public function edit(Amenity $amenity)
    {
        return view('content.amenities.edit', compact('amenity'));
    }

    public function update(Request $request, Amenity $amenity)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:amenities,name,'.$amenity->id,
            'icon' => 'nullable|string|max:255', 
            'description' => 'nullable|string',
        ]);

        $amenity->update($request->all());

        return redirect()->route('amenities.list')->with('success', 'Amenity updated successfully!');
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return redirect()->route('amenities.list')->with('success', 'Amenity deleted successfully!');
    }
}
