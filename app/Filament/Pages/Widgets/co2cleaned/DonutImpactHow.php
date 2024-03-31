<?php

namespace App\Filament\Pages\Widgets\co2cleaned;

use Filament\Widgets\ChartWidget;

class DonutImpactHow extends ChartWidget
{
    protected static ?string $heading = 'How?';
    protected int | string | array $columnSpan = 4;
    protected static ?int $sort = 3;
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'How?',
                    'data' => [158, 330, 222, 291],
                    'backgroundColor' => ['#FF5757', '#FFBD59', '#5271FF', '#8C52FF'],
                    'borderColor' => '#9BD0F5',
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => ['Hemp', 'Trees', 'Mycelium', 'Grassfiber']
        ];
    }

    protected static ?array $options = [
        'plugins' => [
            'doughnutLabel' => [
                'labels' => [
                    'render' => 'percentage',
                    'fontColor' => '#ffffff',
                    'fontSize' => 16
                ]
            ]
        ],
        'scales' => [
            'x' => [
                'display' => false
            ],
            'y' => [
                'display' => false
            ]
        ]
    ];

    protected function getType(): string
    {
        return 'doughnut';
    }
}
