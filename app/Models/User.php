<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
  use HasFactory, Notifiable, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password',
    'address',
    'phone_number',
    'profile_picture',
    'role',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  /**
   * Get the user's full name.
   *
   * @return string
   */
  public function getFullNameAttribute(): string
  {
    return "{$this->first_name} {$this->last_name}";
  }

  /**
   * Check if the user is an admin.
   *
   * @return bool
   */
  public function isAdmin(): bool
  {
    return $this->role === 'ADMIN';
  }

  // Role constants for easy reference
  public const ROLE_USER = 'USER';
  public const ROLE_ADMIN = 'ADMIN';


  public function reservations()
  {
    return $this->hasMany(Reservation::class);
  }

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

}
