<?php

namespace App\Filament\Widgets;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Utilisateur extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Nombre d\'utilisateurs',User::count())
            ->description('Les utilisateurs sur le site ')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
             Stat::make('Nombre de recettes',Recipe::count())
            ->description('Les recettes ajouter sur le site ')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
             Stat::make('Nombre d\'ingredients',Ingredient::count())
            ->description('Les ingredients ajouter sur le site ')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
