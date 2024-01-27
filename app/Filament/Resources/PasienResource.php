<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasienResource\Pages;
use App\Filament\Resources\PasienResource\RelationManagers;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Pasien;
use App\Models\Periksa;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasienResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Pasien';
    protected static ?string $label = 'Patient';
    protected static bool $create = false;
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('nama')->label('Nama')->required(),
            Forms\Components\TextInput::make('alamat')->label('Alamat')->required(),
            Forms\Components\TextInput::make('no_ktp')->label('Nomor KTP')->required(),
            Forms\Components\TextInput::make('no_hp')->label('Nomor HP')->required(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label("Nama"),
                Tables\Columns\TextColumn::make('alamat')->label("Alamat"),
                Tables\Columns\TextColumn::make('no_ktp')->label("No KTP"),
                Tables\Columns\TextColumn::make('no_hp')->label("Telepon"),
                Tables\Columns\TextColumn::make('no_rm')->label("Nomer Rekam Medis"),
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
                Tables\Actions\DeleteBulkAction::make(),
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
