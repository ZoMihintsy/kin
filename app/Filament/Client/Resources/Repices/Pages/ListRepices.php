<?php

namespace App\Filament\Client\Resources\Repices\Pages;

use App\Filament\Client\Resources\Repices\RepiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRepices extends ListRecords
{
    protected static string $resource = RepiceResource::class;

    public function getTitle() : string 
    {
        return "Les recettes";
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Creer une nouvelle recette'),
        ];
    }
}
