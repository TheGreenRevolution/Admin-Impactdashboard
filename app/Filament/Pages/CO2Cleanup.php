<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Pages\Widgets\co2cleaned\StatsImpactflow;
use App\Filament\Pages\Widgets\co2cleaned\DonutImpactHow;
use App\Filament\Pages\Widgets\co2cleaned\ImpactLocation;

class CO2Cleanup extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';
    protected static string $view = 'filament.pages.co2-cleanup';
    protected int | string | array $columnSpan = [
        'default' => 'full',
    ];

    protected function getHeaderWidgets(): array // Use getWidgets if they're not header widgets
    {
        return [
            StatsImpactflow::class,
            ImpactLocation::class,
            DonutImpactHow::class,
        ];
    }
}
