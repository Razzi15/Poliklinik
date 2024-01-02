<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPoliResource\Pages;
use App\Filament\Resources\DaftarPoliResource\RelationManagers;
use App\Models\DaftarPoli;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Models\Poli;
use Filament\Forms;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Daftar Poli';

    public static function form(Form $form): Form
    {
        $jadwal=JadwalPeriksa::pluck('hari', 'id')->toArray();
        $pasien=Pasien::pluck('no_rm', 'id')->toArray();
        $poli=Poli::pluck('nama_poli','id')->toArray();
        return $form
           ->schema([
                Select::make('id_pasien')
                    ->label('Pilih ID Pasien')
                    ->options($pasien)
                    ->required(),
                Select::make('id_poli')
                    ->label('Poli')
                    ->options($poli)
                    ->required(),
                Select::make('id_jadwal')
                    ->label('Pilih Jadwal')
                    ->options($jadwal)
                    ->required(),
                Textarea::make('keluhan'),
                Textinput::make('no_antrian'),
           ]);
    }

    public static function table(Table $table): Table
    {
      //$dokter=Dokter::pluck('nama', 'id')->toArray();
        return $table
            ->columns([
                TextColumn::make('pasien.no_rm')
                ->label('No Rekam Medik'),
                TextColumn::make('jadwal.dokter.nama')
                ->label('Dokter'),
                TextColumn::make('jadwal.hari')
                ->label('Hari'),
                TextColumn::make('jadwal.jam_mulai')
                ->label('Mulai'),
                TextColumn::make('jadwal.jam_selesai')
                ->label('Selesai'),
                TextColumn::make('keluhan')
                ->label('Keluhan'),
                TextColumn::make('no_antrian')
                ->label('No Antrian'),
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
            'index' => Pages\ListDaftarPolis::route('/'),
            'create' => Pages\CreateDaftarPoli::route('/create'),
            'edit' => Pages\EditDaftarPoli::route('/{record}/edit'),
        ];
    }
}
