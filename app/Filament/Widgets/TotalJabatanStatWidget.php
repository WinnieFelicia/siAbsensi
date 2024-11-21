<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class TotalJabatanStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalJabatan = DB::table('t_jabatans')->count();
        return [
            Card::make('Total Jabatan', $totalJabatan)
            ->description('Jumlah total jabatan saat ini')
            ->descriptionIcon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}
