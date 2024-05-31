<?php

namespace App\Filament\Resources\FieldResource\Pages;


use App\Filament\Resources\FieldResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Pages\Widgets\co2cleaned\ImpactLocation;
use App\Filament\Resources\FieldResource\Widgets\FieldMap;

class ListFields extends ListRecords
{
    protected static string $resource = FieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            FieldMap::class,
        ];
    }
}
