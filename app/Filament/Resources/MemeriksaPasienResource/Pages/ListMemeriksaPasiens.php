<?php

namespace App\Filament\Resources\MemeriksaPasienResource\Pages;

use App\Filament\Resources\MemeriksaPasienResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemeriksaPasiens extends ListRecords
{
    protected static string $resource = MemeriksaPasienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
