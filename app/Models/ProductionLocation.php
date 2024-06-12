<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionLocation extends Model
{
    use HasFactory;


    protected $fillable = [
        'description',
        'full_address'
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


}
