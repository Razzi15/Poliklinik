<?php

namespace App\Filament\Resources\DetailPeriksaResource\Pages;

use App\Filament\Resources\DetailPeriksaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailPeriksas extends ListRecords
{
    protected static string $resource = DetailPeriksaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
