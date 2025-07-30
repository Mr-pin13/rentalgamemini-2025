<?php

namespace App\Filament\Admin\Resources\ConsoleResource\Pages;

use App\Filament\Admin\Resources\ConsoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsole extends EditRecord
{
    protected static string $resource = ConsoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
