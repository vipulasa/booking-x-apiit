<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $attributes = [
        'status' => 1
    ];

    protected $fillable = [
        'status'
    ];

    protected $hidden = [];

    protected $casts = [];
}
