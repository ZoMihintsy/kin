<?php

namespace App\Filament\Client\Resources\Repices\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RepiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Grid::make()
                ->schema([
                TextEntry::make('title')
                ->label('Nom du recette'),
                TextEntry::make('description')
                ->html()
                ->label('Description du recette'),
                ImageEntry::make('steps')->label('image du recette'),
                TextEntry::make('ingredient.name')
                ->label('Les ingredients a utiliser')
                ->html(),
                TextEntry::make('tag.name')
                ->label('Type de repas')
                ->html(),
                Grid::make()->schema([
                  TextEntry::make('step.name')
                ->label('Etape'),     
                ImageEntry::make('step.image')
                ->label('image de l\'etape')  
                ])->columns(1),
                TextEntry::make('hours')
                ->label('Temps du preparation en minute'),
                TextEntry::make('difficult')
                ->label('Difficulter')
                ->extraAttributes(['class'=>'text-center'])
                ])->columns(3)
                    ->columnSpan('full')

            ])->extraAttributes(['class'=>'text-center']);
    }
}
