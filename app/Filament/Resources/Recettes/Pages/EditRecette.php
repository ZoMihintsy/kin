<?php

namespace App\Filament\Resources\Recettes\Pages;

use App\Filament\Resources\Recettes\RecetteResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRecette extends EditRecord
{
    protected static string $resource = RecetteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
