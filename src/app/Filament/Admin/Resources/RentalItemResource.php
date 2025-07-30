<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RentalItemResource\Pages;
use App\Filament\Admin\Resources\RentalItemResource\RelationManagers;
use App\Models\RentalItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalItemResource extends Resource
{
    protected static ?string $model = RentalItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('rental_id')
                    ->relationship('rental', 'id')
                    ->required(),
                Forms\Components\Select::make('console_id')
                    ->relationship('console', 'name')
                    ->default(null),
                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'title')
                    ->default(null),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('hours')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('price_per_hour')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0.00),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rental.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('console.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hours')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_per_hour')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRentalItems::route('/'),
            'create' => Pages\CreateRentalItem::route('/create'),
            'edit' => Pages\EditRentalItem::route('/{record}/edit'),
        ];
    }
}
