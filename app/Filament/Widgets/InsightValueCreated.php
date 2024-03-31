<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;

class InsightValueCreated extends ChartWidget
{
    protected static ?string $heading = 'Value Created';
    protected int | string | array $columnSpan = 4;
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Value created',
                    'data' => [158, 330, 222, 291],
                    'backgroundColor' => ['#FF5757', '#FFBD59', '#5271FF', '#8C52FF'],
                    'borderColor' => '#9BD0F5',
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => ['CO2 clean-up', 'Materials sold', 'Energy consumption saved', 'Valuecreation in projects']
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
