<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class FinishedMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'endmaterial_id',
        '%_raw_material_used',
        'kg_per_m3',
        'picture',
        'description_of_end_of_life_scenario',
        'co2_emissions'
    ];

    public function endmaterial()
    {
        return $this->belongsTo(MaterialType::class);
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
