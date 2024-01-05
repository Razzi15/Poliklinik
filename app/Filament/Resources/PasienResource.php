<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\PasienResource\RelationManagers;
use App\Models\DaftarPoli;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Riwayat Pasien';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('alamat'),
                TextInput::make('no_ktp'),
                TextInput::make('no_hp'),
                //TextInput::make('no_rm'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('alamat'),
                TextColumn::make('no_ktp'),
                TextColumn::make('no_hp'),
                TextColumn::make('no_rm'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make("Riwayat Periksa")->label("Riwayat Periksa")
                    ->form(function (Pasien $record) {
                        $daftarPoli = DaftarPoli::where('id_pasien', $record->id)->first();
                        $keluhan = $daftarPoli ? $daftarPoli->keluhan : null;
                        return [
                            TextInput::make("Pasien")->label("Nama Pasien")
                                ->default(fn(Pasien $record) => "{$record->nama}")
                                ->readonly(),
                                TextInput::make("keluhan")->label("Keluhan")
                                ->default($keluhan)
                                ->readonly(),
                        ];
                    })
                    ->hidden(function (Pasien $record) {
                        return !DaftarPoli::where('id_pasien', $record->id)->exists();
                    }),
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
            'index' => Pages\ListPasiens::route('/'),
            'create' => Pages\CreatePasien::route('/create'),
            'edit' => Pages\EditPasien::route('/{record}/edit'),
        ];
    }
}
