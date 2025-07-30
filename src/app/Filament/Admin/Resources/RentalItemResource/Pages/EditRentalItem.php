<?php

namespace App\Filament\Admin\Resources\RentalItemResource\Pages;

use App\Filament\Admin\Resources\RentalItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentalItem extends EditRecord
{
    protected static string $resource = RentalItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
