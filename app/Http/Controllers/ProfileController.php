<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  public function edit()
  {
    return view('content.profile.profile', [
      'user' => auth()->user()
    ]);
  }

  public function update(Request $request)
  {
    $user = auth()->user();

    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'phone_number' => 'required|string|max:20',
      'address' => 'nullable|string',
    ]);

    $user->update($request->only(['first_name', 'last_name', 'phone_number', 'address']));

    return back()->with('success', 'Profile updated successfully!');
  }

  public function updatePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required|current_password',
      'password' => 'required|string|min:8|confirmed',
    ]);

    auth()->user()->update([
      'password' => Hash::make($request->password)
    ]);

    return back()->with('success', 'Password changed successfully!');
  }

  public function updateProfilePicture(Request $request)
  {
    $request->validate([
      'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    try {
      // Delete old picture if exists
      if ($user->profile_picture) {
        // Remove '/storage/' prefix if it exists
        $oldImagePath = str_replace('/storage/', '', $user->profile_picture);
        Storage::disk('public')->delete($oldImagePath);
      }

      // Store new picture with relative path
      $path = $request->file('profile_picture')->store('profile-pictures', 'public');

      // Store just the relative path in database
      $relativePath = '/storage/' . $path;

      $user->update([
        'profile_picture' => $relativePath
      ]);

      return response()->json([
        'success' => true,
        'image_url' => asset($relativePath) // Return full URL for frontend
      ]);

    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to update profile picture: ' . $e->getMessage()
      ], 500);
    }
  }
}
