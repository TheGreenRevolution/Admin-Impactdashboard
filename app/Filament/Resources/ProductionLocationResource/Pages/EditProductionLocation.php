<?php

namespace App\Filament\Resources\ProductionLocationResource\Pages;

use App\Filament\Resources\ProductionLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductionLocation extends EditRecord
{
    protected static string $resource = ProductionLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
