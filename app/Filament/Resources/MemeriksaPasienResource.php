<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemeriksaPasienResource\Pages;
use App\Filament\Resources\MemeriksaPasienResource\RelationManagers;
use App\Models\MemeriksaPasien;
use App\Models\Pasien;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemeriksaPasienResource extends Resource
{
    // protected static ?string $model = MemeriksaPasien::class;

    // protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    // protected static ?string $navigationLabel = 'Memeriksa Pasien';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('pasien.nama'),
                // TextColumn::make('keluhan'),
                // TextColumn::make('no_antrian'),
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
            'index' => Pages\ListMemeriksaPasiens::route('/'),
            'create' => Pages\CreateMemeriksaPasien::route('/create'),
            'edit' => Pages\EditMemeriksaPasien::route('/{record}/edit'),
        ];
    }
}
