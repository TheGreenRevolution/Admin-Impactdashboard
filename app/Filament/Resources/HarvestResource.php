<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HarvestResource\Pages;
use App\Filament\Resources\HarvestResource\RelationManagers;
use App\Models\Harvest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HarvestResource extends Resource
{
    protected static ?string $model = Harvest::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Our Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('start_period')
                    ->label('Start period')
                    ->required(),
                DatePicker::make('end_period')
                    ->label('End period')
                    ->required(),
                Select::make('crop')
                    ->label('Crop')
                    ->relationship('crop', 'name')
                    ->required(),
                TextInput::make('weight')
                    ->label('Weight')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('start_period')
                    ->searchable()
                    ->sortable()
                    ->label('Start Period'),
                Tables\Columns\TextColumn::make('end_period')
                    ->searchable()
                    ->sortable()
                    ->label('End Period'),
                Tables\Columns\TextColumn::make('crop.name')
                    ->searchable()
                    ->sortable()
                    ->label('Crop'),
                Tables\Columns\TextColumn::make('weight')
                    ->sortable()
                    ->label('Weight'),
                Tables\Columns\TextColumn::make('company.name')->label('Company'),
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
            'index' => Pages\ListHarvests::route('/'),
            'create' => Pages\CreateHarvest::route('/create'),
            'edit' => Pages\EditHarvest::route('/{record}/edit'),
        ];
    }
}
