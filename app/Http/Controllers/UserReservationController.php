<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $reservations = Auth::user()->reservations()
      ->with(['room', 'room.hotel', 'room.roomType', 'room.amenities'])
      ->latest()
      ->get();

    return view('account.content.reservations.index', compact('reservations'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Reservation $reservation)
  {
    if ($reservation->user_id !== Auth::id()) {
      abort(403);
    }

    $reservation->load([
      'room.hotel',
      'room.roomType',
      'room.amenities',
      'room.images',
      'room.reviews' => function ($query) {
        $query->where('user_id', Auth::id());
      }
    ]);

    return view('account.content.reservations.show', compact('reservation'));
  }

  /**
   * Store a review for the reservation's room
   */
  public function storeReview(Request $request, Reservation $reservation)
  {
    // Authorization check
    if ($reservation->user_id !== Auth::id()) {
      abort(403);
    }

    // Validation
    $validated = $request->validate([
      'rating' => 'required|integer|min:1|max:5',
      'comment' => 'required|string|max:1000',
    ]);

    // Check if user already reviewed this room
    $existingReview = Review::where('user_id', Auth::id())
      ->where('room_id', $reservation->room_id)
      ->exists();

    if ($existingReview) {
      return back()->with('error', 'You have already reviewed this room.');
    }

    // Create the review
    Review::create([
      'user_id' => Auth::id(),
      'room_id' => $reservation->room_id,
      'reservation_id' => $reservation->id,
      'rating' => $validated['rating'],
      'comment' => $validated['comment'],
    ]);

    return back()->with('success', 'Thank you for your review!');
  }
}
