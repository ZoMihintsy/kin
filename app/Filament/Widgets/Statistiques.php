<?php

namespace App\Filament\Widgets;

use App\Models\Recipe;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Statistiques extends ChartWidget
{
    protected ?string $heading = 'Recettes postées par mois';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

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
        $date = ['Jan','Feb','Mar', 'Apr' , 'May', 'Jun', 'Jul','Aug','Sept','Oct','Nov','Dec'];
        $user = Recipe::get();
       
            //   dd($takes . ' '. $date[$takes-1]);
            $year = date('Y');
        $monthlyData = Recipe::query()
        ->selectRaw(
         'MONTH(created_at) as month , YEAR(created_at) as year , COUNT(*) as count'
        )
        ->groupBy('month', 'year')
        ->orderBy('month','asc')
        ->get();
$data = array_fill(0 , 12 , 0);
$label = [];
foreach (range(1,12) as $value) {
    # code...
    $label[] = Carbon::create()->month($value)->monthName;
}
foreach ($monthlyData as $key) {
    # code...
    $data[$key->month - 1] = $key->count;
}
         
        // $recipeCounts = $data->pluck('recette_count')->toArray();
// $barColors = array_slice(self::COLORS, 0, count($recipeCounts));
        
        // dd($data->pluck('recette_count'));
        // dd($data->pluck('recette_count')->toArray());
        return [
            //
            'datasets'=>[
                [
                'label' => 'Nombre de recettes',
                'data' => $data,
                // 'backgrundColor'=>$barColors
                ]
                
            ],
            'labels'=>$label,
        ];
    }
    public function canAccess() : bool 
    {
        $user = Auth::user();
        return  $user->type == 'admin';
    }

}
