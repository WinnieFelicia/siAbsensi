<?php

namespace App\Filament\Resources\TPegawaiResource\Pages;

use App\Filament\Resources\TPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTPegawai extends EditRecord
{
    protected static string $resource = TPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
