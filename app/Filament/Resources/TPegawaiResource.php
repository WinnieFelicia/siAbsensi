<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TPegawaiResource\Pages;
use App\Filament\Resources\TPegawaiResource\RelationManagers;
use App\Models\tPegawai;
use App\Models\tJabatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\tPegawaiImport;


class TPegawaiResource extends Resource
{
    protected static ?string $model = TPegawai::class;
    protected static ?string $navigationLabel = 'Daftar Pegawai';
    protected static ?string $navigationGroup = 'Data Pegawai';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kodePegawai')
                ->label('Kode Pegawai')
                ->required()
                ->maxLength(4),
                Forms\Components\TextInput::make('namaPegawai')
                ->label('Nama Pegawai')
                ->required()
                ->maxLength(30),
                Forms\Components\TextInput::make('alamatPegawai')
                ->label('Alamat Pegawai')
                ->required(),
                Forms\Components\Select::make('jenisKelamin')
                ->options([
                    'Wanita' => 'Wanita',
                    'Pria' => 'Pria',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\TextInput::make('tempatLahir')
                ->label('Tempat Lahir')
                ->required()
                ->maxLength(30),
                Forms\Components\DatePicker::make('tanggalLahir')
                ->label('Tanggal Lahir')
                ->required(),
                Forms\Components\Select::make('agama')
                ->options([
                    'Islam' => 'Islam',
                    'Kristen' => 'Kristen',
                    'Khatolik' => 'Khatolik',
                    'Hindu' => 'Hindu',
                    'Buddha' => 'Buddha',
                    'Konghucu' => 'Konghucu',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\Select::make('jabatan')
                ->label('Jabatan')
                ->options(tJabatan::all()->pluck('namaJabatan', 'id'))
                ->searchable(),
                Forms\Components\TextInput::make('noHP')
                ->label('No HP')
                ->required()
                ->tel()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kodePegawai')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namaPegawai')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('alamatPegawai')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jenisKelamin')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tempatLahir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggalLahir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('agama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('noHP')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                Action::make('importExcel')
                ->label('Import Excel')
                ->action(function (array $data) {
                // Pastikan $data['file'] adalah jalur yang valid distorage
                $filePath = storage_path('app/public/' . $data['file']);
               
                // Import file menggunakan jalur absolut
               Excel::import(new tPegawaiImport, $filePath);
                // Tampilkan notifikasi sukses
               Notification::make()
                ->title('Data berhasil diimpor!')
                ->success()
                ->send();
                })
               ->form([
                FileUpload::make('file')
                    ->label('Pilih File Excel')
                    ->disk('public') // Pastikan disimpan di disk 'public'
                    ->directory('imports')
                    ->acceptedFileTypes(['application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'])
                    ->required(),
                ])
                ->modalHeading('Import Data Pegawai')
                ->modalButton('Import')
                ->color('success'),
            ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTPegawais::route('/'),
            'create' => Pages\CreateTPegawai::route('/create'),
            'edit' => Pages\EditTPegawai::route('/{record}/edit'),
        ];
    }
}
