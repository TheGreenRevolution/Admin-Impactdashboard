<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CO2Impact extends ChartWidget
{
    protected static ?string $heading = 'CO2 Impact';
    protected int | string | array $columnSpan = 8;
    protected static ?string $maxHeight = '300px';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Tons of CO2',
                    'data' => [201, 443, 448, 603, 650, 680, 785, 830, 847, 930, 960, 1037],
                    'borderColor' => '#38B6FF',
                    'backgroundColor' => '#FFFAFA',
                    'maxHeight' => '300px'
                ],
            ],
            'labels' => ['Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', '2024 Jan', 'feb'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public static function getColumns(): int
    {
        return 9; // Change this number to the number of columns you want your widget to span.
    }
}
