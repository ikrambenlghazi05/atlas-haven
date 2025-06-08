<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
  public function index()
  {
    $roomTypes = RoomType::latest()->paginate(10); // or whatever number per page you want
    return view('content.room-types.list', compact('roomTypes'));
  }

  public function create()
  {
    return view('content.room-types.add');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255|unique:room_types',
      'description' => 'nullable|string',
    ]);

    RoomType::create($request->all());

    return redirect()->route('room-types.list')->with('success', 'Room type created successfully!');
  }

  public function edit(RoomType $roomType)
  {
    return view('content.room-types.edit', compact('roomType'));
  }

  public function update(Request $request, RoomType $roomType)
  {
    $request->validate([
      'name' => 'required|string|max:255|unique:room_types,name,' . $roomType->id,
      'description' => 'nullable|string',
    ]);

    $roomType->update($request->all());

    return redirect()->route('room-types.list')->with('success', 'Room type updated successfully!');
  }

  public function destroy(RoomType $roomType)
  {
    $roomType->delete();
    return redirect()->route('room-types.list')->with('success', 'Room type deleted successfully!');
  }
}
