<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Display a listing of all reservations.
     */
    public function index()
    {
        $reservations = Reservation::with([
                'user',
                'room.hotel',
                'room.roomType',
                'room.amenities'
            ])
            ->latest()
            ->paginate(10);

        return view('content.reservations.index', compact('reservations'));
    }

    /**
     * Display the specified reservation details.
     */
    public function show(Reservation $reservation)
    {
        $reservation->load([
            'user',
            'room.hotel',
            'room.roomType',
            'room.amenities',
            'room.images',
            'room.reviews' => function($query) use ($reservation) {
                $query->where('user_id', $reservation->user_id);
            }
        ]);

        return view('content.reservations.show', compact('reservation'));
    }
}
