<?php

namespace App\Filament\Widgets;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Filament\Actions\ViewAction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class Utilisateur extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            //
            // Stat::make('Nombre d\'utilisateurs',User::count())
            // ->description('Les utilisateurs sur le site ')
            // ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->color('success'),
             Stat::make('Recettes Totales',Recipe::count())
            ->description('Les recettes ajouter sur le site ')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->icon('heroicon-o-bell')
            ->color('success')
            ->url('/admin-kim/recettes'),

             Stat::make('Recettes perso',Recipe::where('user_id',Auth::user()->id)->count())
            ->description('Les ingredients ajouter sur le site ')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->icon('heroicon-o-cake')
            ->color('success')
            ->url('/admin-kim/recettes/views'),
        ];
    }
    public static function canAccess() : bool 
    {
        $user = Auth::user();
        return  $user->type == 'admin';
    }
}
