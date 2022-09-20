<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\Hotel\Accommodation;
use App\Models\Hotel\Experience;
use App\Models\Hotel\Dining;
use App\Models\Hotel\Facility;
use App\Models\Finance\Package;

class Hotel extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia,
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
        'category_id',
        'name',
        'url',
        'description',
        'health_and_safety',
        'address',
        'phone',
        'email',
        'website',
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

    /**
     * Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function dining()
    {
        return $this->hasMany(Dining::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    /**
     * Register media collection
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
