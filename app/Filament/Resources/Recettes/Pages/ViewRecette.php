<?php

namespace App\Filament\Resources\Recettes\Pages;

use App\Filament\Resources\Recettes\RecetteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRecette extends ViewRecord
{
    protected static string $resource = RecetteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
