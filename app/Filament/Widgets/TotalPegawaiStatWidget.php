<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class TotalPegawaiStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPegawai = DB::table('t_pegawais')->count();
        return [
            Card::make('Total Pegawai', $totalPegawai)
            ->description('Jumlah total pegawai saat ini')
            ->descriptionIcon('heroicon-s-academic-cap')
            ->color('success'),
        ];
    }
}
