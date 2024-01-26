<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPoliResource\Pages;
use App\Filament\Resources\DaftarPoliResource\RelationManagers;
use App\Models\DaftarPoli;
use App\Models\Obat;
use App\Models\Periksa;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DaftarPoliResource extends Resource
{
    protected static ?string $model = DaftarPoli::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Memeriksa Pasien';
    protected static ?string $label = 'Checkup Patient';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pasien.nama')->label('Nama Pasien'),
                TextInput::make('keluhan')->label('Keluhan'),
                TextInput::make('jadwalPeriksa.dokter.nama')->label('Nama Dokter'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pasien.nama')->label("Nama Pasien"),
                TextColumn::make('keluhan'),
                TextColumn::make('no_antrian')->label("Nomer Antrian"),
                TextColumn::make('jadwalPeriksa.dokter.nama'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("Edit Pasien")
                ->hidden(function (DaftarPoli $record) {
                    return !Periksa::where('id_daftar_poli', $record->id)->exists();
                }),
                Tables\Actions\Action::make("Periksa")->label("Periksa")
                    ->action(function (DaftarPoli $record, array $data) {
                        $catatan = request('catatan');
                        $periksa = new Periksa([
                            'id_daftar_poli' => $record->id,
                            'tgl_periksa' => now(),
                            'catatan' => $data['catatan'],
                            'biaya_periksa' => 155000
                        ]);
                        $periksa->save();
                    })
                    ->form(function (DaftarPoli $record) {
                        return [
                            TextInput::make("id")
                                ->default(fn(DaftarPoli $record) => $record->id)
                                ->hidden(),
                            TextInput::make("pasien.nama")
                                ->default(fn(DaftarPoli $record) => "{$record->pasien->nama}")
                                ->readonly(),
                            DatePicker::make("tgl_periksa")->label("Tanggal Periksa")->default(now()),
                            Textarea::make("catatan")->label("Catatan"),
                            Select::make('obat')
                                ->label('Obat')
                                ->options(Obat::query()->pluck('nama_obat', 'id'))
                                ->required()
                                ->multiple(),
                        ];
                    })
                    ->hidden(function (DaftarPoli $record) {
                        return Periksa::where('id_daftar_poli', $record->id)->exists();
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
            'index' => Pages\ListDaftarPolis::route('/'),
            'edit' => Pages\EditDaftarPoli::route('/{record}/edit'),
        ];
    }
}
