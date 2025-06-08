<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Analytics extends Controller
{
  public function index()
  {
    // Get counts for all major entities
    $hotelCount = Hotel::count();
    $roomCount = Room::count();
    $userCount = User::count();
    $reservationCount = Reservation::count();
    $reviewCount = Review::count();

    // Get recent reservations
    $recentReservations = Reservation::with(['user', 'room.hotel'])
      ->orderBy('created_at', 'desc')
      ->take(5)
      ->get();

    // Get revenue data
    $currentMonthRevenue = Reservation::whereMonth('created_at', Carbon::now()->month)
      ->whereYear('created_at', Carbon::now()->year)
      ->sum('total_price');

    $lastMonthRevenue = Reservation::whereMonth('created_at', Carbon::now()->subMonth()->month)
      ->whereYear('created_at', Carbon::now()->subMonth()->year)
      ->sum('total_price');

    $revenueChange = $lastMonthRevenue > 0 ?
      (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100 : 100;

    // Get occupancy rate
    $totalRooms = Room::count();
    $occupiedRooms = Reservation::where('check_in', '<=', Carbon::today())
      ->where('check_out', '>=', Carbon::today())
      ->count();
    $occupancyRate = $totalRooms > 0 ? ($occupiedRooms / $totalRooms) * 100 : 0;

    // Get recent reviews
    $recentReviews = Review::with(['user', 'room.hotel'])
      ->orderBy('created_at', 'desc')
      ->take(3)
      ->get();

    // Get revenue by room type
    $revenueByRoomType = RoomType::with(['rooms.reservations'])
      ->get()
      ->map(function ($roomType) {
        $revenue = $roomType->rooms->sum(function ($room) {
          return $room->reservations->sum('total_price');
        });
        return [
          'name' => $roomType->name,
          'revenue' => $revenue
        ];
      });

    // Get monthly revenue for the year
    $monthlyRevenue = [];
    for ($i = 1; $i <= 12; $i++) {
      $monthlyRevenue[] = Reservation::whereMonth('created_at', $i)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('total_price');
    }

    return view('content.dashboard.dashboards-analytics', compact(
      'hotelCount',
      'roomCount',
      'userCount',
      'reservationCount',
      'reviewCount',
      'recentReservations',
      'currentMonthRevenue',
      'revenueChange',
      'occupancyRate',
      'recentReviews',
      'revenueByRoomType',
      'monthlyRevenue'
    ));
  }
}
