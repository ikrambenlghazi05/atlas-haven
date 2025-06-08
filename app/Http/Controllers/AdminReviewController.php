<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of all reviews.
     */
    public function index()
    {
        $reviews = Review::with([
                'user',
                'room.hotel',
                'reservation'
            ])
            ->latest()
            ->paginate(10);

        return view('content.reviews.index', compact('reviews'));
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('content.reviews.index')
            ->with('success', 'Review deleted successfully');
    }
}
