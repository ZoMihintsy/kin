<?php

namespace App\Filament\Client\Resources\Recettes\Pages;

use App\Filament\Client\Resources\Recettes\RecetteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRecettes extends ListRecords
{
    protected static string $resource = RecetteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
