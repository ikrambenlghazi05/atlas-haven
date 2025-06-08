<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'room_number',
        'price_per_night',
        'capacity',
        'size',
        'availability',
        'description'
    ];

    // Relationship with Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Relationship with RoomType (fixed the naming)
    public function type()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }


    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    // Relationship with Reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Relationship with Amenities (many-to-many)
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenity');
    }

    // Relationship with RoomImages
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    // Accessor for featured image
    public function getFeaturedImageAttribute()
    {
        return $this->images->where('is_featured', true)->first() ?? $this->images->first();
    }

    // Relationship with Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Calculate average rating
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    // Check if room is available
    public function getIsAvailableAttribute()
    {
        return $this->availability;
    }
}
