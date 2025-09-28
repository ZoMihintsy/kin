<?php

namespace App\Filament\Resources\Ingredients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Ingredient;

class IngredientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                ->label('Ingredient')
                ->unique(Ingredient::class , 'name')
            ]);
    }
}
