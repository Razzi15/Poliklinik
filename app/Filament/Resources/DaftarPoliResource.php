<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPoliResource\Pages;
use App\Filament\Resources\DaftarPoliResource\RelationManagers;
use App\Models\DaftarPoli;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\MemeriksaPasien;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\Poli;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarPoliResource extends Resource
{
    protected static ?string $model = DaftarPoli::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Memeriksa Pasien';

    protected static ?string $label = 'Periksa Pasien';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        //$jadwal=JadwalPeriksa::pluck('hari', 'id')->toArray();
        //$pasien=Pasien::pluck('no_rm', 'id')->toArray();
        //$poli=Poli::pluck('nama_poli','id')->toArray();
        return $form
           ->schema([

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
                // Select::make('id_pasien')
                //     ->label('Pilih ID Pasien')
                //     ->options($pasien)
                //     ->required(),
                // Select::make('id_poli')
                //     ->label('Poli')
                //     ->options($poli)
                //     ->required(),
                // Select::make('id_jadwal')
                //     ->label('Pilih Jadwal')
                //     ->options($jadwal)
                //     ->required(),
                // Textarea::make('keluhan'),
                // Textinput::make('no_antrian'),
           ]);
    }

    public static function table(Table $table): Table
    {
      //$dokter=Dokter::pluck('nama', 'id')->toArray();
        return $table
            ->columns([
                TextColumn::make('pasien.nama')->label("Nama Pasien"),
                TextColumn::make('keluhan'),
                TextColumn::make('no_antrian')->label("Nomer Antrian"),
                TextColumn::make('jadwal.dokter.nama'),
                //save()
                // TextColumn::make('pasien.no_rm')
                // ->label('No Rekam Medik'),
                // TextColumn::make('jadwal.dokter.nama')
                // ->label('Dokter'),
                // TextColumn::make('jadwal.hari')
                // ->label('Hari'),
                // TextColumn::make('jadwal.jam_mulai')
                // ->label('Mulai'),
                // TextColumn::make('jadwal.jam_selesai')
                // ->label('Selesai'),
                // TextColumn::make('keluhan')
                // ->label('Keluhan'),
                // TextColumn::make('no_antrian')
                // ->label('No Antrian'),
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
                            'biaya_periksa' => 150000
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
           // 'create' => Pages\CreateDaftarPoli::route('/create'),
            'edit' => Pages\EditDaftarPoli::route('/{record}/edit'),
        ];
    }
}
