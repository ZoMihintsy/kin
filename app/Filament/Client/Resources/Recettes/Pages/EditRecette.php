<?php

namespace App\Filament\Client\Resources\Recettes\Pages;

use App\Filament\Client\Resources\Recettes\RecetteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecette extends EditRecord
{
    protected static string $resource = RecetteResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         DeleteAction::make(),
    //     ];
    // }
}
