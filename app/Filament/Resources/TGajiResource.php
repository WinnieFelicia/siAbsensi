<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TGajiResource\Pages;
use App\Filament\Resources\TGajiResource\RelationManagers;
use App\Models\tGaji;
use App\Models\tPegawai;
use App\Models\tJabatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TGajiResource extends Resource
{
    protected static ?string $model = TGaji::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('periodeGaji')
                ->options([
                    'Bulanan' => 'Bulanan',
                    'Mingguan' => 'Mingguan',
                    'Harian' => 'Harian',
                ])
                ->searchable()
                ->native(false),
                Forms\Components\TextInput::make('incentive')
                ->label('incentive')
                ->required(),
                Forms\Components\Select::make('gajiPokok')
                ->label('Gaji Pokok')
                ->options(tJabatan::all()->pluck('gajiPokok','id'))
                ->required(),
                Forms\Components\TextInput::make('persenBPJS')
                ->label('Persen BPJS')
                ->required(),
                Forms\Components\TextInput::make('rupiahBPJS')
                ->label('Rupiah BPJS')
                ->required(),
                Forms\Components\TextInput::make('hariAlpha')
                ->label('Hari Alpha')
                ->maxLength(10)
                ->required(),
                Forms\Components\TextInput::make('rupiahPerharialpha')
                ->label('Rupiah Perharialpha')
                ->required(),
                Forms\Components\TextInput::make('totalRupiahalpha')
                ->label('Total Rupiahalpha')
                ->required(),
                Forms\Components\TextInput::make('totalGaji')
                ->label('Total Gaji')
                ->required(),
                Forms\Components\DatePicker::make('tglHitung')
                ->label('Tgl Hitung')
                ->required(),
                Forms\Components\Select::make('pegawai')
                ->label('Id Pegawai')
                ->options(tPegawai::all()->pluck('kodePegawai','id'))
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('periodeGaji')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('incentive')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('gajiPokok')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('persenBPJS')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rupiahBPJS')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('hariAlpha')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rupiahPerharialpha')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('totalRupiahalpha')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('totalGaji')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tglHitung')->sortable()->searchable(),
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
            'index' => Pages\ListTGajis::route('/'),
            'create' => Pages\CreateTGaji::route('/create'),
            'edit' => Pages\EditTGaji::route('/{record}/edit'),
        ];
    }
}
