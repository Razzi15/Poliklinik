<?php

namespace App\Filament\Resources\MemeriksaPasienResource\Pages;

use App\Filament\Resources\MemeriksaPasienResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemeriksaPasien extends EditRecord
{
    protected static string $resource = MemeriksaPasienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
