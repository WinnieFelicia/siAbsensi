<?php

namespace App\Filament\Resources\TAbsensiResource\Pages;

use App\Filament\Resources\TAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTAbsensis extends ListRecords
{
    protected static string $resource = TAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
