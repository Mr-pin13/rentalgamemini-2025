<?php

namespace App\Filament\Admin\Resources\ConsoleResource\Pages;

use App\Filament\Admin\Resources\ConsoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsoles extends ListRecords
{
    protected static string $resource = ConsoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
