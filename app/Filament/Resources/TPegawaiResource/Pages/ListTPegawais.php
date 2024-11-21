<?php

namespace App\Filament\Resources\TPegawaiResource\Pages;

use App\Filament\Resources\TPegawaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\tPegawai;

class ListTPegawais extends ListRecords
{
    protected static string $resource = TPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // Tombol New
            Actions\Action::make('cetak_laporan')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Pengguna')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
            ];
    }
    public static function cetakLaporan()
    {
 // Ambil data pengguna
       // $data = tPegawai::all();
        $data = \DB::select('select * from vDataPegawai');
 // Load view untuk cetak PDF
        $pdf = \PDF::loadView('Laporan.cetak', ['data' => $data]);
 // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'Laporan-Pegawai.pdf');
    }
}
