<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'phone_number',
        'email',
        'website'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(HotelImage::class);
    }

    public function featuredImage()
    {
        return $this->images()->where('is_featured', true)->first();
    }
    
}
