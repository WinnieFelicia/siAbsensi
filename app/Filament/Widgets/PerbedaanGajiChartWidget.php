<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\tJabatan;


class PerbedaanGajiChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Perbedaan Gaji';

    protected function getData(): array
    {
        $jabatan = tJabatan::query()->limit(4)->get();
        $namajabatan=[];
        foreach ($jabatan as $row) {
            $namajabatan[]= $row->namaJabatan;
            $gaji[]= $row->gajiPokok;
        }
        return [
            'datasets' => [
                [
                    'label' => 'Gaji Rata-rata',
                    'data' => [150, 200, 300, 400],
                    'backgroundColor' => ['#f87171', '#fbbf24', '#34d399', '#60a5fa'],
                ],
            ],
            'labels' => ['January', 'February', 'March', 'April'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
