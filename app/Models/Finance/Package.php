<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Hotel\Dining;
use App\Models\Hotel\Experience;
use App\Models\Hotel\Facility;
use App\Models\Hotel;

class Package extends Model
{
    use HasFactory,
        SoftDeletes;

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sort_order' => 0,
        'status' => 1,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'hotel_id',

        'title',
        'description',

        'price_fixed',
        'price_per_person',
        'price_perday',

        'occupancy',

        // experiences - belongs to many experiences
        // dinings - belongs to many relationship
        // facilities - belongs to many relationship

        'nationality', // local, forign

        'sort_order',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function experiences()
    {
        return $this->belongsToMany(Experience::class);
    }

    public function dinings()
    {
        return $this->belongsToMany(Dining::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
