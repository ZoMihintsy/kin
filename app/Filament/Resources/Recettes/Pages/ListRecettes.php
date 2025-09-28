<?php

namespace App\Filament\Resources\Recettes\Pages;

use App\Filament\Resources\Recettes\RecetteResource;
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
