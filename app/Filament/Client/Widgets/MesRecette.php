<?php

namespace App\Filament\Client\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class MesRecette extends ChartWidget
{
    protected ?string $heading = 'Recettes publier';

    protected function getData(): array
    {
        $recipe = User::query()->withCount('recette')->limit(10)->get();
        return [
            //
            
               "datasets"=>[ [
                'label'=>'Les recettes',
                'data'=>$recipe->pluck('recette_count')->toArray(),
               
               ]
                
             
               ],
               'labels'=>$recipe->pluck('name')->toArray()
            
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
