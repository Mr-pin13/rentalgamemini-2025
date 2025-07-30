<?php

namespace App\Filament\Admin\Resources\ConsoleGameResource\Pages;

use App\Filament\Admin\Resources\ConsoleGameResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsoleGame extends EditRecord
{
    protected static string $resource = ConsoleGameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
