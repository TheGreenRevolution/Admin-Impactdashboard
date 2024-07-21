<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionLocation extends Model
{
    use HasFactory;


    protected $fillable = [
        'description',
        'full_address',
        'location'
    ];

    //BELOW RELATIONSHIPS NEED TO BE VERIFIED BEFORE ADDING THIER IDS TO THE TABLE
    //1) CROPS
    // public function crops()
    // {
    //     return $this->hasMany(Crop::class);
    // }

    //2) ENDPRODUCTS
    // public function endProducts()
    // {
    //     return $this->hasMany(CHECK WHICH MODEL) 
    // }

    //GOOGLE MAP MODEL PROPERTIES AND METHODS
    /**
     * The following code was generated for use with Filament Google Maps
     *
     * php artisan fgm:model-code ProductionLocation --lat=lat --lng=lng --location=location --terse
     */

    protected $appends = [
        'location',
    ];

    public function getLocationAttribute(): array
    {
        return [
            "lat" => (float)$this->lat,
            "lng" => (float)$this->lng,
        ];
    }

    public function setLocationAttribute(?array $location): void
    {
        if (is_array($location))
        {
            $this->attributes['lat'] = $location['lat'];
            $this->attributes['lng'] = $location['lng'];
            unset($this->attributes['location']);
        }
    }

    public static function getLatLngAttributes(): array
    {
        return [
            'lat' => 'lat',
            'lng' => 'lng',
        ];
    }

    public static function getComputedLocation(): string
    {
        return 'location';
    }


}
