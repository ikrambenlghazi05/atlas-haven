<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class UserReviewController extends Controller
{
  /**
   * Display all user reviews
   */
  public function index()
  {
    $reviews = Auth::user()->reviews()
      ->with([
        'room' => function ($query) {
          $query->with('hotel');
        },
        'reservation'
      ])
      ->latest()
      ->paginate(10);

    return view('account.content.reviews.index', compact('reviews'));
  }

  /**
   * Show the form for editing a review
   */
  public function edit(Review $review)
  {
    // Ensure the review belongs to the authenticated user
    if ($review->user_id !== Auth::id()) {
      abort(403);
    }

    $review->load(['room', 'room.hotel']);

    return view('account.content.reviews.edit', compact('review'));
  }

  /**
   * Update the specified review
   */
  public function update(Request $request, Review $review)
  {
    // Authorization check
    if ($review->user_id !== Auth::id()) {
      abort(403);
    }

    $validated = $request->validate([
      'rating' => 'required|integer|min:1|max:5',
      'comment' => 'required|string|max:1000',
    ]);

    $review->update($validated);

    return redirect()->route('account.reviews.index')
      ->with('success', 'Review updated successfully!');
  }

  /**
   * Remove the specified review
   */
  public function destroy(Review $review)
  {
    // Authorization check
    if ($review->user_id !== Auth::id()) {
      abort(403);
    }

    $review->delete();

    return redirect()->route('account.reviews.index')
      ->with('success', 'Review deleted successfully!');
  }
}
