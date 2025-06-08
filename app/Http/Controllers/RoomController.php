<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\Amenity;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
  public function index()
  {
    $rooms = Room::with(['hotel', 'type', 'amenities', 'images'])->latest()->paginate(10); // 10 items per page
    return view('content.rooms.list', compact('rooms'));
  }

  public function create()
  {
    $hotels = Hotel::all();
    $roomTypes = RoomType::all();
    $amenities = Amenity::all();
    return view('content.rooms.add', compact('hotels', 'roomTypes', 'amenities'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'hotel_id' => 'required|exists:hotels,id',
      'room_type_id' => 'required|exists:room_types,id',
      'room_number' => 'required|string|unique:rooms',
      'price_per_night' => 'required|numeric|min:0',
      'capacity' => 'required|integer|min:1',
      'size' => 'required|integer|min:1',
      'availability' => 'boolean',
      'description' => 'nullable|string',
      'amenities' => 'nullable|array',
      'amenities.*' => 'exists:amenities,id',
      'images' => 'required|array',
      'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    $room = Room::create($request->except('amenities', 'images'));

    if ($request->has('amenities')) {
      $room->amenities()->sync($request->amenities);
    }

    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $key => $image) {
        $path = $image->store('room-images', 'public');
        RoomImage::create([
          'room_id' => $room->id,
          'image_path' => $path,
          'is_featured' => $key === 0 // First image is featured
        ]);
      }
    }

    return redirect()->route('rooms.list')->with('success', 'Room created successfully!');
  }

  public function edit(Room $room)
  {
    $hotels = Hotel::all();
    $roomTypes = RoomType::all();
    $amenities = Amenity::all();
    $selectedAmenities = $room->amenities->pluck('id')->toArray();
    return view('content.rooms.edit', compact('room', 'hotels', 'roomTypes', 'amenities', 'selectedAmenities'));
  }

  public function update(Request $request, Room $room)
  {
    $request->validate([
      'hotel_id' => 'required|exists:hotels,id',
      'room_type_id' => 'required|exists:room_types,id',
      'room_number' => 'required|string|unique:rooms,room_number,' . $room->id,
      'price_per_night' => 'required|numeric|min:0',
      'capacity' => 'required|integer|min:1',
      'size' => 'required|integer|min:1',
      'availability' => 'boolean',
      'description' => 'nullable|string',
      'amenities' => 'nullable|array',
      'amenities.*' => 'exists:amenities,id',
      'images' => 'nullable|array',
      'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    // Handle featured image update
    if ($request->has('featured_image')) {
      $imageId = $request->input('featured_image');
      RoomImage::where('room_id', $room->id)
        ->update(['is_featured' => false]);

      RoomImage::where('id', $imageId)
        ->update(['is_featured' => true]);

      return back()->with('success', 'Featured image updated!');
    }

    // Handle image deletion
    if ($request->has('delete_image')) {
      $image = RoomImage::findOrFail($request->input('delete_image'));
      Storage::delete('public/' . $image->image_path);
      $image->delete();

      return back()->with('success', 'Image deleted!');
    }

    $room->update($request->except('amenities', 'images', 'featured_image', 'delete_image'));

    if ($request->has('amenities')) {
      $room->amenities()->sync($request->amenities);
    }

    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $image) {
        $path = $image->store('room-images', 'public');
        RoomImage::create([
          'room_id' => $room->id,
          'image_path' => $path,
          'is_featured' => false
        ]);
      }
    }

    return redirect()->route('rooms.list')->with('success', 'Room updated successfully!');
  }

  public function destroy(Room $room)
  {
    // Delete images from storage
    foreach ($room->images as $image) {
      Storage::delete('public/' . $image->image_path);
    }

    $room->delete();
    return redirect()->route('rooms.list')->with('success', 'Room deleted successfully!');
  }

  public function setFeaturedImage(RoomImage $image)
  {
    // Reset all featured images for this room
    RoomImage::where('room_id', $image->room_id)
      ->update(['is_featured' => false]);

    // Set this image as featured
    $image->update(['is_featured' => true]);

    return back()->with('success', 'Featured image updated!');
  }

  public function deleteImage(RoomImage $image)
  {
    Storage::delete('public/' . $image->image_path);
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
}
