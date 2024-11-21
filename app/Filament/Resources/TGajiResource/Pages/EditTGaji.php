<?php

namespace App\Filament\Resources\TGajiResource\Pages;

use App\Filament\Resources\TGajiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTGaji extends EditRecord
{
    protected static string $resource = TGajiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
