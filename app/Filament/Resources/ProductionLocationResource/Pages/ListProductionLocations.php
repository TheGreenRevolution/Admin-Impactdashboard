<?php

namespace App\Filament\Resources\ProductionLocationResource\Pages;

use App\Filament\Resources\ProductionLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductionLocations extends ListRecords
{
    protected static string $resource = ProductionLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
