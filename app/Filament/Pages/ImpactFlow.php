<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Widgets\impactflow\DonutImpactHow;
use Filament\Pages\Page;
use App\Filament\Pages\Widgets\impactflow\HarvestLocations;
use App\Filament\Pages\Widgets\impactflow\PositiveImpact;
use App\Filament\Pages\Widgets\impactflow\ProcessingLocations;
use App\Filament\Pages\Widgets\impactflow\ProjectWidget;
use App\Filament\Pages\Widgets\impactflow\StatsImpactflow;
use App\Filament\Pages\Widgets\impactflow\UsageLocations;

class ImpactFlow extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static string $view = 'filament.pages.impact-flow';
    protected int | string | array $columnSpan = 12;


    protected function getHeaderWidgets(): array // Use getWidgets if they're not header widgets
    {
        return [
            HarvestLocations::class,
            ProcessingLocations::class,
            UsageLocations::class,
            PositiveImpact::class,
            ProjectWidget::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int | array
    {
        return 12;
    }
}
