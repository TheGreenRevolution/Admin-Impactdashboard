<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_period',
        'end_period',
        'weight',
        'crop',
        'created_at'
    ];

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
