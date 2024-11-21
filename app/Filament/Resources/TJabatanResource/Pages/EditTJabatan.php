<?php

namespace App\Filament\Resources\TJabatanResource\Pages;

use App\Filament\Resources\TJabatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTJabatan extends EditRecord
{
    protected static string $resource = TJabatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
