<?php

namespace App\Filament\Resources\clients\Pages;

use App\Filament\Resources\clients\clientResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ToAdmin extends ViewRecord
{
    protected static string $resource = clientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::route('/Client'),
        ];
    }
}
