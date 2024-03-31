<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 12;
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('CO2 cleaned', '164k Ton')
                ->description('+15% this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #E2FFED;',
                ]),
            Stat::make('CO2 avoided', '873k ton')
                ->description('+15% this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #FBFFE0;',
                ]),
            Stat::make('Projects realized', '567')
                ->description('+7% this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #EEF6FF;',
                ]),
            Stat::make('Waste upcycled', '12 Ton')
                ->description('5% this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'stat-background',
                    'style' => 'background-color: #FFEFEF;',
                ]),
        ];
    }
}
