<?php

namespace App\Filament\Pages\Widgets\co2cleaned;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsImpactflow extends BaseWidget
{
    protected int | string | array $columnSpan = 12;
    protected function getStats(): array
    {
        return [
            Stat::make('CO2 cleaned', '164k Ton')
                ->description('+15% this month')
                ->icon('heroicon-m-scale')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #E2FFED;',
                ]),
            Stat::make('Active countries', '6')
                ->description('+1 this month')
                ->icon('heroicon-m-globe-europe-africa')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #FBFFE0;',
                ]),
            Stat::make('Companies contributing', '48')
                ->description('+5 this month')
                ->icon('heroicon-m-user-group')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #EEF6FF;',
                ]),
            Stat::make('Households impacted', '176')
                ->description('3% this month')
                ->icon('heroicon-m-home')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #FFEFEF;',
                ]),
        ];
    }
}
