<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TJabatanResource\Pages;
use App\Filament\Resources\TJabatanResource\RelationManagers;
use App\Models\TJabatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TJabatanResource extends Resource
{
    protected static ?string $model = TJabatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kodeJabatan')
                ->label('Kode Jabatan')
                ->required()
                ->maxLength(4),
                Forms\Components\TextInput::make('namaJabatan')
                ->label('Nama Jabatan')
                ->required()
                ->maxLength(15),
                Forms\Components\TextInput::make('gajiPokok')
                ->label('Gaji Pokok')
                ->required()
                ->numeric()
                ->maxLength(11),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kodeJabatan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('namaJabatan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('gajiPokok')->sortable()->searchable(),
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
            'index' => Pages\ListTJabatans::route('/'),
            'create' => Pages\CreateTJabatan::route('/create'),
            'edit' => Pages\EditTJabatan::route('/{record}/edit'),
        ];
    }
}
