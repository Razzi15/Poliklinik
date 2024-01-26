<?php

namespace App\Filament\Resources;
use App\Filament\Resources\DokterResource\Pages;
use App\Models\Dokter;
use App\Models\Poli;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
class DokterResource extends Resource
{
    protected static ?string $model = Dokter::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    //protected static ?string $navigationIcon = 'bi-person-vcard';
    protected static ?string $navigationLabel = 'Dokter';
    protected static ?string $label = 'Doctor';
    public static function form(Form $form): Form
    {
        $polis = Poli::pluck('nama_poli', 'id')->toArray();

        return $form
            ->schema([
                TextInput::make('nama')->label('Nama')->required(),
                TextInput::make('alamat')->label('Alamat')->required(),
                TextInput::make('no_hp')->label('Nomor HP')->required(),
                Select::make('id_poli')
                    ->label('Poli')
                    ->options($polis)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('alamat'),
                TextColumn::make('no_hp'),
                TextColumn::make('poli.nama_poli'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDokters::route('/'),
            'create' => Pages\CreateDokter::route('/create'),
            'edit' => Pages\EditDokter::route('/{record}/edit'),
        ];
    }
}
