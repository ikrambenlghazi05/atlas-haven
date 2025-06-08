<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
  public function index()
  {
    $roomTypes = RoomType::all();
    return view('home.index', compact('roomTypes'));
    
  }



  public function about()
  {
    return view('home.pages.about');
  }


  public function rooms()
  {
    return view('home.pages.rooms');
  }

  public function services()
  {
    return view('home.pages.services');
  }

  public function hotels()
  {
    return view('home.pages.hotels');
  }


  /**
   * Redirect users based on their role
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function redirectBasedOnRole()
  {
    if (Auth::check()) {
      $user = Auth::user();

      if ($user->role === 'ADMIN') {
        return redirect('/admin');
      } else {
        // Default to USER role
        return redirect('/account');
      }
    }

    // If not logged in, redirect to login
    return redirect('/auth/login');
  }


  public function showAvailability(Request $request)
  {
    $request->validate([
      'check_in' => 'required|date|after_or_equal:today',
      'check_out' => 'required|date|after:check_in',
      'room_type_id' => 'required|exists:room_types,id',
    ]);

    $checkIn = Carbon::parse($request->check_in);
    $checkOut = Carbon::parse($request->check_out);
    $roomTypeId = $request->room_type_id;

    $availableRooms = Room::where('room_type_id', $roomTypeId)
      ->whereDoesntHave('reservations', function ($query) use ($checkIn, $checkOut) {
        $query->where(function ($q) use ($checkIn, $checkOut) {
          $q->whereBetween('check_in', [$checkIn, $checkOut])
            ->orWhereBetween('check_out', [$checkIn, $checkOut])
            ->orWhere(function ($q) use ($checkIn, $checkOut) {
              $q->where('check_in', '<', $checkIn)
                ->where('check_out', '>', $checkOut);
            });
        })
          ->whereIn('status', ['confirmed', 'pending']);
      })
      ->with(['roomType', 'hotel', 'amenities']) // Changed from 'type' to 'roomType'
      ->get();

    $nights = $checkIn->diffInDays($checkOut);

    return view('rooms.availability', [
      'rooms' => $availableRooms,
      'check_in' => $checkIn->format('Y-m-d'),
      'check_out' => $checkOut->format('Y-m-d'),
      'nights' => $nights,
      'roomType' => RoomType::find($roomTypeId)
    ]);
  }

}
