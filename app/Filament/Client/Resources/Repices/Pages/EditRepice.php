<?php

namespace App\Filament\Client\Resources\Repices\Pages;

use App\Filament\Client\Resources\Repices\RepiceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRepice extends EditRecord
{
    protected static string $resource = RepiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
