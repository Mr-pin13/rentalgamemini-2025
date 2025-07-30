<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ConsoleGameResource\Pages;
use App\Filament\Admin\Resources\ConsoleGameResource\RelationManagers;
use App\Models\ConsoleGame;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConsoleGameResource extends Resource
{
    protected static ?string $model = ConsoleGame::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('console_id')
                    ->relationship('console', 'name')
                    ->required(),
                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'title')
                    ->required(),
                Forms\Components\Toggle::make('installed')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('console.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('installed')
                    ->boolean(),
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
            'index' => Pages\ListConsoleGames::route('/'),
            'create' => Pages\CreateConsoleGame::route('/create'),
            'edit' => Pages\EditConsoleGame::route('/{record}/edit'),
        ];
    }
}
