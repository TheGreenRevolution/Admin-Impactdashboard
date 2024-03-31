<?php

namespace App\Filament\Pages\Widgets\impactflow;

use Cheesegrits\FilamentGoogleMaps\Widgets\MapWidget;

class PositiveImpact extends MapWidget
{
    protected static ?string $heading = 'Positive CO2 Impact';

    protected static ?int $sort = 7;

    protected static ?string $pollingInterval = null;

    protected static ?bool $clustering = true;

    protected static ?bool $fitToBounds = true;

    protected static ?string $type = "satellite";

    protected static ?int $zoom = 1;

    protected int | string | array $columnSpan = 7;
    protected static ?string $minHeight = '69vh';

    protected function getData(): array
    {
        /**
         * You can use whatever query you want here, as long as it produces a set of records with your
         * lat and lng fields in them.
         */
        $locations = [
            (object)[
                'id' => 1,
                'long' =>  -0.6085,
                'lat' => 9.4885,
                'created_at' => "2024-03-23 12:00:00",
                'updated_at' => "2024-03-23 12:00:00",
                // ... other attributes as needed
            ],
            (object)[
                'id' => 2,
                'long' =>  4.3517,
                'lat' => 50.8503,
                'created_at' => "2024-03-23 12:00:00",
                'updated_at' => "2024-03-23 12:00:00",
            ],
            // ... add more location objects as needed
        ];

        $data = [];

        foreach ($locations as $location) {
            /**
             * Each element in the returned data must be an array
             * containing a 'location' array of 'lat' and 'lng',
             * and a 'label' string (optional but recommended by Google
             * for accessibility.
             *
             * You should also include an 'id' attribute for internal use by this plugin
             */
            $data[] = [
                'location'  => [
                    'lat' => $location->lat ? round(floatval($location->lat), static::$precision) : 0,
                    'lng' => $location->long ? round(floatval($location->long), static::$precision) : 0,
                ],

                'label'     => $location->lat . ',' . $location->long,

                'id' => $location->id,


            ];
        }

        return $data;
    }
}
