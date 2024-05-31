<?php

namespace App\Filament\Resources\FieldResource\Pages;

use App\Filament\Resources\FieldResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Cheesegrits\FilamentGoogleMaps\Concerns\InteractsWithMaps;

class CreateField extends CreateRecord
{
    use InteractsWithMaps;
    protected static string $resource = FieldResource::class;
}
