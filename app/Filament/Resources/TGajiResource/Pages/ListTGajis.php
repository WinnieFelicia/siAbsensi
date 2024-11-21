<?php

namespace App\Filament\Resources\TGajiResource\Pages;

use App\Filament\Resources\TGajiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTGajis extends ListRecords
{
    protected static string $resource = TGajiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
