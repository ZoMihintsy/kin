<?php

namespace App\Filament\Resources\Recettes\Schemas;

use Filament\Infolists\Components\ImageEntry;
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
                ImageEntry::make('steps')
                ->label('Image du recette')
                ->columns(1),
                TextEntry::make('ingredient.name')
                ->label('Ingredient'),
                TextEntry::make('tag.name')
                ->label('Type de recette'),
                TextEntry::make('step.name')
                ->label('Etapes'),
                ImageEntry::make('step.image')
                ->label('Image des etapes'),
                TextEntry::make('hours')
                ->label('Temps du preparation'),
                TextEntry::make('difficult')
                ->label('Difficulter')
            ]);
    }
}
