<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $attributes = [
        'sort_order' => 0,
        'status' => 1
    ];

    protected $fillable = [
        'sort_order',
        'status'
    ];

    protected $hidden = [];

    protected $casts = [];
}
