<?php

namespace App\Filament\Admin\Resources\ConsoleGameResource\Pages;

use App\Filament\Admin\Resources\ConsoleGameResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsoleGames extends ListRecords
{
    protected static string $resource = ConsoleGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
