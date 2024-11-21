<?php

namespace App\Filament\Resources\TAbsensiResource\Pages;

use App\Filament\Resources\TAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTAbsensi extends EditRecord
{
    protected static string $resource = TAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
