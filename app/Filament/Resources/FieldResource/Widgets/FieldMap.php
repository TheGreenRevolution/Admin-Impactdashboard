<?php

namespace App\Filament\Resources\FieldResource\Widgets;

use Cheesegrits\FilamentGoogleMaps\Widgets\MapWidget;

class FieldMap extends MapWidget
{
    protected static ?string $heading = 'Map';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

    protected static ?bool $clustering = true;

    protected static ?bool $fitToBounds = true;

    protected static ?int $zoom = 12;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        /**
         * You can use whatever query you want here, as long as it produces a set of records with your
         * lat and lng fields in them.
         */
        $locations = \App\Models\Field::all();

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

                'id' => $location->getKey(),

                /**
             * Optionally you can provide custom icons for the map markers,
             * either as scalable SVG's, or PNG, which doesn't support scaling.
             * If you don't provide icons, the map will use the standard Google marker pin.
             */
            ];
        }

        return $data;
    }
}
