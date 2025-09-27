<?php

namespace App\Filament\Client\Resources\Recettes\Schemas;

use App\Models\Ingredient;
use Filament\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\RichEditorTool;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextInputColumn;
use Illuminate\Support\Facades\Auth;

class RecetteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                ->schema([
                  
                //
                TextInput::make('title')
                ->label('Titre du recette')
                ->required()
                ->columns(1),

                Hidden::make('slug')
                ->default(fn()=> rand(100 , 1999)),
                RichEditor::make('description')
                ->label('description'),

                Hidden::make('user_id')
                ->default(fn()=> Auth::user()->id),
                RichEditor::make('steps')
                ->label('Etape')
                ->required(),

                Repeater::make('ingredient')
                ->relationship()
                ->schema([
                    Select::make('name')
                    ->label('ingredient')
                    ->options(Ingredient::get()->pluck('name','id'))
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('name')
                        ->label('Nouvel ingredient')
                        ->unique(Ingredient::class,'name') 
                    ])->createOptionUsing(function ($data) {
                     Ingredient::create([
                            'name'=>$data['name']
                        ]);
                        return $data['name'];
                    })
                    ->required(),
                ])->required(),

                Repeater::make('tag')
                ->relationship()
                ->schema([
                    TextInput::make('name')
                ->label('type de recette'),
                Hidden::make('slug')
                ->default(fn()=> rand(100 , 1999)),
                ])
                ->required()
                  
                ])->columns(1)
            ]);
    }
}
