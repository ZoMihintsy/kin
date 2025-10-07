<?php

namespace App\Filament\Client\Resources\Repices\Schemas;

use App\Models\Ingredient;
use App\Models\Tag;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Range;
use Filament\Forms\Components\TimePicker;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class RepiceForm
{
    protected int | string | array $columnSpan = 'full';

    
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 
                Grid::make()
                ->schema([
                //
                TextInput::make('title')
                ->label('Nom du recette')
                
                ->required()
                ->columns(1),

                FileUpload::make('steps')
                ->label('Image du recette')
                ->required(),

                Hidden::make('slug')
                ->default(fn()=> Auth::user()->name.'_'.rand(1 , 1999999).'_'.Auth::user()->id),
         

                Hidden::make('user_id')
                ->default(fn()=> Auth::user()->id),
               
                    Select::make('ingredient')
                    ->label('ingredient')
                    ->relationship(name: 'ingredient', titleAttribute: 'name')
                    ->options(Ingredient::orderBy('name','asc')->get()->pluck('name','id'))
                    ->preload()
                    ->multiple()
                    ->searchable()
                    ->reactive()
                    ->live()
                    ->createOptionForm([
                        TextInput::make('name')
                        ->label('Nouvel ingredient')
                        ->unique(Ingredient::class,'name') 
                    ])->createOptionUsing(function ($data) {
                     Ingredient::create([
                            'name'=>$data['name']
                        ]);
                    })
                    ->afterStateUpdated( function ($state , callable $set){
                        if($state){
                            $set('name', $state);
                        }
                    })
                    ->required(),

                    Select::make('tag')
                    ->label('Type de recette')
                    ->relationship(name: 'tag', titleAttribute: 'name')
                    ->options(Tag::orderBy('name','asc')->get()->pluck('name','id'))
                    ->preload()
                    ->multiple()
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('name')
                        ->label('Type de repas')
                        ->unique(Tag::class,'name'),
                        Hidden::make('slug')
                        ->default(fn()=> Auth::user()->name.'_'.rand(1 , 1999999).'_'.Auth::user()->id),
                    ])->createOptionUsing(function ($data) {
                     Tag::create([
                            'name'=>$data['name'],
                            'slug'=>$data['slug']
                        ]);
                    })
                    ->required(),
                    TextInput::make('hours')
                    ->label('Temps du preparation')
                    ->placeholder('minute')
                    ->type('number')
                    ->helperText('Format (En minute)'),
                    Select::make('difficult')
                    ->label('Difficulter')
                    ->options([
                        'facile'=>'Facile',
                        'moyenne'=>'Moyenne',
                        'difficile'=>'Difficile',
                    ])->preload()
                    ->required(),
                                    
                Repeater::make('step')
                ->label('Les etaps a suivre')
                ->relationship()
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->label('Etape'),
                    FileUpload::make('image')
                    ->label('Image pour cette etape (optionnel)')
                ])
                ->createItemButtonlabel('Plus d\'etape')
                ->required(),

                RichEditor::make('description')
                ->label('Description')
                ->placeholder('Donnez plus de detail pour la recette afin que votre recette soit populaire , donnez plus de detail sur l\'ingredient pour la quantiter par exemple.')
                ->required()
                ])->columns(1)
                    ->columnSpan('full')
                
            ]);
    }
}
