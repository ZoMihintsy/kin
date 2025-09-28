<?php

namespace App\Filament\Resources\Recettes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RecetteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextEntry::make('description')
                ->label('Description')
                ->html()
                ->columns(1),
                TextEntry::make('steps')
                ->label('Etapes')
                ->html()
                ->columns(1),
                TextEntry::make('ingredient.name')
                ->label('Ingredient'),
                TextEntry::make('tag.name')
                ->label('Type de recette')
            ]);
    }
}
