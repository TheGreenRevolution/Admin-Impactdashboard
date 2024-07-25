<?php

namespace App\Filament\Resources\FinishedMaterialResource\Pages;

use App\Filament\Resources\FinishedMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFinishedMaterial extends EditRecord
{
    protected static string $resource = FinishedMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
