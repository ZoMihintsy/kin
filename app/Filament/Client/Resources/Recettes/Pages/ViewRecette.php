<?php

namespace App\Filament\Client\Resources\Recettes\Pages;

use App\Filament\Client\Resources\Recettes\RecetteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRecette extends ViewRecord
{
    protected static string $resource = RecetteResource::class;
    protected function getViewData(): array
    {
        return [];
    }
}
