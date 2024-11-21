<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TAbsensiResource\Pages;
use App\Filament\Resources\TAbsensiResource\RelationManagers;
use App\Models\tAbsensi;
use App\Models\tPegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TAbsensiResource extends Resource
{
    protected static ?string $model = TAbsensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('statusAbsensi')
                ->options([
                    'Hadir' => 'Hadir',
                    'Absen' => 'Absen',
                    'Izin' => 'Izin',
                    'Telat' => 'Telat',
                    'Sakit' => 'Sakit',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\DatePicker::make('tglAbsensi')
                ->label('tglAbsensi')
                ->required(),
                Forms\Components\TextInput::make('keterangan')
                ->label('Keterangan'),
                Forms\Components\Select::make('pegawai')
                ->label('ID Pegawai')
                ->options(tPegawai::all()->pluck('kodePegawai', 'id'))
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('statusAbsensi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tglAbsensi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('keterangan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pegawai')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTAbsensis::route('/'),
            'create' => Pages\CreateTAbsensi::route('/create'),
            'edit' => Pages\EditTAbsensi::route('/{record}/edit'),
        ];
    }
}
