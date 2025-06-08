<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
  public function index()
  {
    // In your controller

    $hotels = Hotel::with('images')->paginate(10); 

    return view('content.hotels.list', compact('hotels'));
  }

  public function create()
  {
    return view('content.hotels.add');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'rating' => 'nullable|numeric|min:0|max:5',
      'address' => 'required|string',
      'city' => 'required|string',
      'country' => 'required|string',
      'phone_number' => 'required|string',
      'images' => 'required|array',
      'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    $hotel = Hotel::create($request->except('images'));

    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $key => $image) {
        $path = $image->store('hotel-images', 'public');
        HotelImage::create([
          'hotel_id' => $hotel->id,
          'image_path' => $path,
          'is_featured' => $key === 0 // First image is featured
        ]);
      }
    }

    return redirect()->route('hotels.list')->with('success', 'Hotel created successfully!');
  }

  public function edit(Hotel $hotel)
  {
    return view('content.hotels.edit', compact('hotel'));
  }

  public function update(Request $request, Hotel $hotel)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'rating' => 'nullable|numeric|min:0|max:5',
      'address' => 'required|string',
      'city' => 'required|string',
      'state' => 'nullable|string',
      'country' => 'required|string',
      'zip_code' => 'nullable|string',
      'phone_number' => 'required|string',
      'email' => 'nullable|email',
      'website' => 'nullable|url',
      'images' => 'nullable|array',
      'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    // Handle featured image update
    if ($request->has('featured_image')) {
      $imageId = $request->input('featured_image');
      HotelImage::where('hotel_id', $hotel->id)
        ->update(['is_featured' => false]);

      HotelImage::where('id', $imageId)
        ->update(['is_featured' => true]);

      return back()->with('success', 'Featured image updated!');
    }

    // Handle image deletion
    if ($request->has('delete_image')) {
      $image = HotelImage::findOrFail($request->input('delete_image'));
      Storage::delete('public/' . $image->image_path);
      $image->delete();

      return back()->with('success', 'Image deleted!');
    }

    // Regular update
    $hotel->update($request->except('images', 'featured_image', 'delete_image'));

    // Handle new image uploads
    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $image) {
        $path = $image->store('hotel-images', 'public');
        HotelImage::create([
          'hotel_id' => $hotel->id,
          'image_path' => $path,
          'is_featured' => false
        ]);
      }
    }

    return redirect()->route('hotels.list')->with('success', 'Hotel updated successfully!');
  }

  public function destroy(Hotel $hotel)
  {
    // Delete images from storage
    foreach ($hotel->images as $image) {
      Storage::delete('public/' . $image->image_path);
    }

    $hotel->delete();
    return redirect()->route('hotels.list')->with('success', 'Hotel deleted successfully!');
  }

  public function setFeaturedImage(HotelImage $image)
  {
    // Reset all featured images for this hotel
    HotelImage::where('hotel_id', $image->hotel_id)
      ->update(['is_featured' => false]);

    // Set this image as featured
    $image->update(['is_featured' => true]);

    return back()->with('success', 'Featured image updated!');
  }

  public function deleteImage(HotelImage $image)
  {
    Storage::delete('public/' . $image->image_path);
    $image->delete();
    return back()->with('success', 'Image deleted!');
  }
}
