<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'room_id',
    'check_in',
    'check_out',
    'total_price',
    'status',
    'special_requests'
  ];

  protected $casts = [
    'check_in' => 'date',
    'check_out' => 'date',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function room()
  {
    return $this->belongsTo(Room::class)->with(['hotel', 'roomType', 'amenities']);
    // Changed from 'type' to 'roomType' to match the relationship name
  }

  public function review()
  {
    return $this->hasOne(Review::class);
  }
}
