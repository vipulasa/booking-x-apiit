<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use  Illuminate\Database\Eloquent\Builder;
use App\Models\Finance\Booking;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'nic',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'settings',
        'avatar',
        'role', // 'admin', 'user', 'manager'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'nic',
        'settings',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'settings' => 'array',
        'nic' => 'encrypted',
        'address' => 'encrypted',
        'phone' => 'encrypted',
    ];

    /**
     * Check the user has the role
     *
     * @var array<string, string>
     */
    public function scopeHasRole(Builder $builder, string $role)
    {
        return $this->role === $role;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
