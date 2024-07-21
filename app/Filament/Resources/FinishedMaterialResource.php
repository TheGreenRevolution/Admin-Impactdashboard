<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FinishedMaterialResource\Pages;
use App\Filament\Resources\FinishedMaterialResource\RelationManagers;
use App\Models\FinishedMaterial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\NumberInput;

class FinishedMaterialResource extends Resource
{
    protected static ?string $model = FinishedMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Our Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Material name')
                    ->required(),
                Select::make('endmaterial_id')
                    ->label('Material type')
                    ->relationship('endmaterial', 'name')
                    ->required(),
                TextInput::make('%_raw_material_used')
                    ->label('Percentage of Raw Material Used')
                    ->numeric()
                    ->required(),
                TextInput::make('kg_per_m3')
                    ->label('KG per M³')
                    ->numeric()
                    ->required(),
                FileUpload::make('picture')
                    ->label('Picture of the Material')
                    ->image(),
                Textarea::make('description_of_end_of_life_scenario')
                    ->label('Description of End of Life Scenario')
                    ->required(),
                TextInput::make('co2_emissions')
                    ->label('CO2 Emissions by End of Life')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('endmaterial.name')
                    ->label('Material Type'),
                Tables\Columns\TextColumn::make('%_raw_material_used')
                    ->label('% Raw Material Used'),
                Tables\Columns\TextColumn::make('kg_per_m3')
                    ->label('KG per M³'),
                Tables\Columns\ImageColumn::make('picture')
                    ->label('Picture'),
                Tables\Columns\TextColumn::make('description_of_end_of_life_scenario')
                    ->label('End of Life Scenario'),
                Tables\Columns\TextColumn::make('co2_emissions')
                    ->label('CO2 Emissions'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFinishedMaterials::route('/'),
            'create' => Pages\CreateFinishedMaterial::route('/create'),
            'edit' => Pages\EditFinishedMaterial::route('/{record}/edit'),
        ];
    }
}
