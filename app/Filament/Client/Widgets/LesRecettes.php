<?php

namespace App\Filament\Client\Widgets;

use App\Models\Recipe;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class LesRecettes extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $recipe = Recipe::where('user_id',Auth::user()->id)->count();
        
        return [
            //
            Stat::make('Nombre de recette', Recipe::count())
            ->description('Les recette en gros'),
            Stat::make('Mes recettes',$recipe)
            ->description('Mes recettes depuis le 1er jour')
        ];
    }
}
