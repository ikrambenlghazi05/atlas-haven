<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
  public function create(Request $request)
  {
    $request->validate([
      'room_id' => 'required|exists:rooms,id',
      'check_in' => 'required|date',
      'check_out' => 'required|date',
    ]);

    $room = Room::with('roomType')->find($request->room_id);
    $checkIn = Carbon::parse($request->check_in);
    $checkOut = Carbon::parse($request->check_out);
    $nights = $checkIn->diffInDays($checkOut);

    return view('bookings.create', [
      'room' => $room,
      'check_in' => $checkIn->format('Y-m-d'),
      'check_out' => $checkOut->format('Y-m-d'),
      'nights' => $nights,
      'total_price' => $room->price_per_night * $nights
    ]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'room_id' => 'required|exists:rooms,id',
      'check_in' => 'required|date|after_or_equal:today',
      'check_out' => 'required|date|after:check_in',
      'name' => 'required|string|max:255',
      'email' => 'required|email',
      'phone' => 'required',
      'special_requests' => 'nullable|string'
    ]);

    $reservation = Reservation::create([
      'room_id' => $validated['room_id'],
      'user_id' => auth()->id() ?? null,
      'check_in' => $validated['check_in'],
      'check_out' => $validated['check_out'],
      'total_price' => Room::find($validated['room_id'])->price_per_night *
        Carbon::parse($validated['check_in'])->diffInDays($validated['check_out']),
      'status' => 'confirmed',
      'guest_name' => $validated['name'],
      'guest_email' => $validated['email'],
      'guest_phone' => $validated['phone'],
      'special_requests' => $validated['special_requests']
    ]);

    // Redirect to confirmation page with the reservation ID
    return redirect()->route('bookings.confirmation', ['reservation' => $reservation->id]);
  }

  public function confirmation(Reservation $reservation)
  {
    // Eager load relationships to avoid N+1 queries
    $reservation->load(['room.roomType']);

    return view('bookings.confirmation', compact('reservation'));
  }
}
