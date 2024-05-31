<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FieldResource\Pages;
use App\Filament\Resources\FieldResource\RelationManagers;
use App\Models\Field;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// RACHID ADDED IMPORTS
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use App\Filament\Resources\FieldResource\Widgets\FieldMap;

class FieldResource extends Resource
{
    protected static ?string $model = Field::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Field Data')
                    ->schema([
                        TextInput::make('size')
                            ->required(),
                        TextInput::make('full_address'),
                    ])->columnSpan(4),
                // SECTION LAT&LNG
                Section::make('Coordinates')
                    ->schema([
                        Forms\Components\TextInput::make('latitude')
                            //CHANGES IN THE FIELDS OF LAT AND LNG UPDATE THE POSITION OF MAKER
                            //event on change
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $set('location', [
                                    'lat' => floatVal($state),
                                    'lng' => floatVal($get('longitude')),
                                ]);
                            })
                            ->lazy(), // important to use lazy, to avoid updates as you type
                        // SECTION LAT&LNG
                        Forms\Components\TextInput::make('longitude')
                            //event on change
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $set('location', [
                                    'lat' => floatval($get('latitude')),
                                    'lng' => floatVal($state),
                                ]);
                            })
                            ->lazy(), // important to use lazy, to avoid updates as you type
                    ])->columnSpan(4),
                Section::make('Address')
                    ->schema([
                        TextInput::make('country')
                            ->required(),
                        TextInput::make('city'),
                        TextInput::make('state'),
                        TextInput::make('street'),
                        TextInput::make('zip'),
                    ])->columnSpan(1),
                // TextInput::make('company'),
                Section::make('Map')
                    ->schema([
                        //MAKE THE MAKER UPDATE THE FIELDS OF LAT AND LNG
                        Map::make('location')
                            ->defaultLocation([50.8754, 4.30155]) // default for new forms
                            ->reactive()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $set('latitude', $state['lat']);
                                $set('longitude', $state['lng']);
                            })

                            ->reverseGeocode([
                                'country' => '%C',
                                'city'   => '%L',
                                'zip'    => '%z',
                                'state'  => '%A1',
                                'street' => '%n %S',
                            ])
                            ->mapControls([
                                'mapTypeControl'    => true,
                                'scaleControl'      => true,
                                'streetViewControl' => true,
                                'rotateControl'     => true,
                                'fullscreenControl' => true,
                                'searchBoxControl'  => false, // creates geocomplete field inside map
                                'zoomControl'       => true,
                            ])
                            ->reverseGeocodeUsing(function (callable $set, array $results) {
                                // get whatever you need from $results, and $set your field(s) lat and lng
                                $set('lat', $results['results'][1]['geometry']['location']['lat']);
                                $set('lng', $results['results'][1]['geometry']['location']['lng']);
                            })
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

                    ])->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('size')
                    ->sortable(),
                TextColumn::make('full_address')
                    ->label('Full Address')
                    ->toggleable(),
                // Tables\Columns\TextColumn::make('company'),
                TextColumn::make('country')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('city')
                    ->searchable(),
                TextColumn::make('state')
                    ->searchable(),
                TextColumn::make('street'),
                TextColumn::make('zip')
                    ->searchable()
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
            'index' => Pages\ListFields::route('/'),
            'create' => Pages\CreateField::route('/create'),
            'edit' => Pages\EditField::route('/{record}/edit'),
        ];
    }

    //REGISTER WIDGETS
    public static function getWidgets(): array
    {
        return [
            FieldMap::class,

        ];
    }
}
