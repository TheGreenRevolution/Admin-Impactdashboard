<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductionLocationResource\Pages;
use App\Filament\Resources\ProductionLocationResource\RelationManagers;
use App\Models\ProductionLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

//GOOGLE MAP IMPORTS
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

class ProductionLocationResource extends Resource
{
    protected static ?string $model = ProductionLocation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Section-1')
                ->schema([
                    TextInput::make('description'),
                TextInput::make('full_address'),
                ]),
                Section::make('Map')
                    ->schema([
                        //MAKE THE MAKER UPDATE THE FIELDS OF LAT AND LNG
                        Map::make('location')
                            ->defaultLocation([50.8754, 4.30155]) // default for new forms
                            ->reactive()
                            ->mapControls([
                                'mapTypeControl'    => true,
                                'scaleControl'      => true,
                                'streetViewControl' => true,
                                'rotateControl'     => true,
                                'fullscreenControl' => true,
                                'searchBoxControl'  => false, // creates geocomplete field inside map
                                'zoomControl'       => true,
                            ])
                            ->height(fn () => '400px')
                            // map height (width is controlled by Filament options)
                            ->defaultZoom(12) // default zoom level when opening form
                            ->autocomplete('full_address') // field on form to use as Places geocompletion field
                            ->autocompleteReverse(true) // reverse geocode marker location to autocomplete field
                            ->draggable() // allow dragging to move marker
                            ->clickable(false) // allow clicking to move marker
                            ->geolocate('User My Location') // adds a button to request device location and set map marker accordingly
                            ->geolocateLabel('Get Location') // overrides the default label for geolocate button
                            ->geolocateOnLoad(true, false), // geolocate on load, second arg 'always' (default false, only for new form))

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(20)
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('full_address')
                    ->label('Full Address')
                    ->toggleable(),
                TextColumn::make('lat')
                ->label('Latitude')
                ->toggleable(),
                TextColumn::make('lng')
                ->label('Longitude')
                ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductionLocations::route('/'),
            'create' => Pages\CreateProductionLocation::route('/create'),
            'edit' => Pages\EditProductionLocation::route('/{record}/edit'),
        ];
    }
}
