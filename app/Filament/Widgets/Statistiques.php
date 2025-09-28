<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class Statistiques extends ChartWidget
{
    protected ?string $heading = 'Statistiques du recettes';

    protected const COLORS = [
        'rgba(255, 99, 132, 0.7)',  // Rouge
        'rgba(54, 162, 235, 0.7)',  // Bleu
        'rgba(255, 206, 86, 0.7)',  // Jaune
        'rgba(75, 192, 192, 0.7)',  // Vert-bleu
        'rgba(153, 102, 255, 0.7)', // Violet
        'rgba(255, 159, 64, 0.7)',  // Orange
        'rgba(199, 199, 199, 0.7)', // Gris
        'rgba(83, 109, 254, 0.7)',  // Indigo
        'rgba(255, 0, 0, 0.7)',     // Rouge pur
        'rgba(0, 255, 0, 0.7)',     // Vert pur
    ];
    protected function getType(): string
    {
        return 'bar';
    }
    protected function getData(): array
    {
        $data = User::query()
        ->withCount('recette')
        ->orderBy('recette_count')
        ->limit(10)
        ->get()->where('type','client');
        $recipeCounts = $data->pluck('recette_count')->toArray();
$barColors = array_slice(self::COLORS, 0, count($recipeCounts));
        
        // dd($data->pluck('recette_count'));
        // dd($data->pluck('recette_count')->toArray());
        return [
            //
            'datasets'=>[
                [
                'label' => 'Nombre de recettes',
                'data' => $data->pluck('recette_count')->toArray(),
                'backgrundColor'=>$barColors
                ]
                
            ],
            'labels'=>$data->pluck('name')->toArray(),
        ];
    }

}
