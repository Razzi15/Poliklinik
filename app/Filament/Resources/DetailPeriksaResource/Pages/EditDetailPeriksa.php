<?php

namespace App\Filament\Resources\DetailPeriksaResource\Pages;

use App\Filament\Resources\DetailPeriksaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailPeriksa extends EditRecord
{
    protected static string $resource = DetailPeriksaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
