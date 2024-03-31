<?php

namespace App\Filament\Pages\Widgets\impactflow;

use Filament\Widgets\Widget;

class ProjectWidget extends Widget
{
    protected static ?string $heading = 'Project: Belgium';
    protected static string $view = 'filament.widgets.project-widget';
    protected int | string | array $columnSpan = 5;
    public function cssUrl(): string
    {
        $manifest = json_decode(file_get_contents(__DIR__ . '/../../dist/mix-manifest.json'), true);

        return url($manifest['/cheesegrits/filament-google-maps/filament-google-maps-widget.css']);
    }
}
