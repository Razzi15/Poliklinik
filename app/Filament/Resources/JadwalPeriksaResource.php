<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPeriksaResource\Pages;
use App\Filament\Resources\JadwalPeriksaResource\RelationManagers;
use App\Models\Dokter;
use App\Models\Jadwal_Periksa;
use App\Models\JadwalPeriksa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Enum;
use PHPUnit\Event\Code\Test;

class JadwalPeriksaResource extends Resource
{
    protected static ?string $model = JadwalPeriksa::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Jadwal Periksa';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        $dokter=Dokter::pluck('nama','id')->toArray();
        return $form
            ->schema([
                Select::make('id_dokter')
                    ->label('Dokter')
                    ->options($dokter)
                    ->required(),
                Select::make('hari')
                    ->label('Hari')
                    ->options(['Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu'])
                    ->required(),
                TimePicker::make('jam_mulai')->label('Jam Mulai')->required(),
                TimePicker::make('jam_selesai')->label('Jam Selesai')->required(),
                Select::make('status')
                    ->label('Status Dokter')
                    ->options(['Y' => 'Aktif', 'T' => 'Tidak Akitf'])
                    ->required(),
            ]);
    }

    public static function getIdDokter(): int
    {
        $data = auth()->user();
        return $data->id_dokter;
    }

    public static function table(Table $table): Table
    {
        if (auth()->check()) {
        return $table
        ->query(fn () => JadwalPeriksa::where('id_dokter', self::getIdDokter()))
            ->columns([
                TextColumn::make('dokter.nama'),
                TextColumn::make('hari'),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
                TextColumn::make('status'),
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
            'index' => Pages\ListJadwalPeriksas::route('/'),
            'create' => Pages\CreateJadwalPeriksa::route('/create'),
            'edit' => Pages\EditJadwalPeriksa::route('/{record}/edit'),
        ];
    }
}
