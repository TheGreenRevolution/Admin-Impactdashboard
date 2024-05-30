<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('company', function (Builder $query) {
            if (auth()->check()) {
                $query->where('company_id', auth()->user()->company_id);
                $query->whereBelongsTo(auth()->user()->company);
            }
        });
    }
}
