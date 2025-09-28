<?php

namespace App\Filament\Resources\Ingredients\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class IngredientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Section::make([
                   TextEntry::make('recipe.title')
                   ->label('Recettes')
                   ->icon('heroicon-s-plus')
                ])
                ->label('Les recettes avec cet ingredient')  
                ->icon('heroicon-o-list-bullet')
                ->columns(1)
               
            ]);
    }
}
