<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ValueCreatedChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'valueCreatedChart';

    protected int | string | array $columnSpan = 4;

    protected static ?string $footer = 'Lorem Ipsum is simply dummy text .';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'Value Created';

    /**
     * Sort
     */
    protected static ?int $sort = 3;

    /**
     * Widget content height
     */
    protected static ?int $contentHeight = 240;

    /**
     * 
     * GET THE DATA TO SHOW IN THE CHART
     *
     * @return array
     */

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

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        //GET THE DATA FROM GETDATA FUNCTION
        $data = $this->getData();


        return [
            'chart' => [

                'type' => 'donut',
                'width' => 400,
                'dropShadow' => [
                    'enabled' => true,
                    'color' => '#111',
                    'top' => -1,
                    'left' => 3,
                    'blur' => 3,
                    'opacity' => 0.2,
                ],
            ],

            'series' =>  $data['datasets'][0]['data'],
            'labels' => $data['labels'],
            'color' => ' #61FF33',
            'stroke' => [
                'width' => 0,
            ],
            'plotOptions' => [
                'pie' => [
                    'donut' => [
                        'labels' => [
                            'show' => true,
                            'total' => [
                                'showAlways' => true,
                                'show' => true,
                                'label' => 'Total',
                                'style' => [
                                    'fontSize' => '24px', // Adjust the font size here
                                    'color' => '#FF7133',
                                    'fontFamily' => 'Helvetica, Arial, sans-serif',
                                    'fontWeight' => 'bold',
                                ],

                            ],
                        ],
                    ],
                ],
            ],

            'dataLabels' => [
                'dropShadow' => [
                    'blur' => 3,
                    'opacity' => 0.8,
                ],
            ],
            'states' => [
                'hover' => [
                    'filter' => 'none',
                ],
            ],
            'theme' => [
                'palette' => 'palette2',
            ],
            // 'title' => [
            //     'text' => "Value Created",
            // ],
            'responsive' => [
                [
                    'breakpoint' => 480,
                    'options' => [
                        'chart' => [
                            'width' => 300,
                        ],
                        'legend' => [
                            'position' => 'bottom',
                        ],
                    ],
                ],
            ],
        ];
    }
}
