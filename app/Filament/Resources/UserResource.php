<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Dokter;
use App\Models\User;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'User';
    protected static ?string $label = 'User Management';
    public static function form(Form $form): Form
    {
        $dokterOptions = Dokter::pluck('nama', 'id')->toArray();

        return $form
            ->columns(2) // Set the number of columns
            ->schema([
                Group::make([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->required(),
                    TextInput::make('password')->required(),
                    Toggle::make('is_admin')->label('Admin'),
                ]),
                Group::make([
                    Select::make('id_dokter') // Assuming 'dokter_id' is the foreign key
                    ->label('Dokter')
                    ->options($dokterOptions),
                    Toggle::make('is_dokter')->label('Dokter'),
                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama'),
                TextColumn::make('email')->label('Email'),
                ToggleColumn::make('is_admin')->label('Status Admin'),
                ToggleColumn::make('is_dokter')->label('Status Dokter'),
                TextColumn::make('dokter.poli.nama_poli')->label('Poli'),
            ])
            ->filters([
            ])
            ->actions([

                Tables\Actions\Action::make('Detail Dokter')
                ->form(function (User $record) {
                    return [
                        TextInput::make("dokter.nama")
                            ->default(fn(User $record) => $record->dokter->nama)
                            ->readOnly(),
                        TextInput::make("dokter.alamat")->label('Alamat')
                            ->default(fn(User $record) => $record->dokter->alamat)
                            ->readOnly(),
                        TextInput::make("dokter.no_hp")->label('Telepon')
                            ->default(fn(User $record) => $record->dokter->no_hp)
                            ->readOnly(),
                        TextInput::make("dokter.poli.nama_poli")->label('Poli')
                            ->default(fn(User $record) => $record->dokter->poli->nama_poli)
                            ->readOnly()
                    ];
                })
                ->modalCloseButton()
                ->visible(function (User $record) {
                    return $record->is_dokter;
                }),
                Tables\Actions\EditAction::make()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
