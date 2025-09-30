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
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class RepiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 
                Grid::make()
                ->schema([
                //
                TextInput::make('title')
                ->label('Titre du recette')
                ->required()
                ->columns(1),

                FileUpload::make('steps')
                ->label('Image du recette')
                ->required(),
                
                Hidden::make('slug')
                ->default(fn()=> Auth::user()->name.'_'.rand(1 , 1999999).'_'.Auth::user()->id),
                RichEditor::make('description')
                ->label('description'),

                Hidden::make('user_id')
                ->default(fn()=> Auth::user()->id),
                
                Repeater::make('step')
                ->relationship()
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->label('Etape'),
                    FileUpload::make('image')
                    ->label('Image pour cette etape')
                ])
                ->label('Etape')
                ->required(),

               
                    Select::make('ingredient')
                    ->label('ingredient')
                    ->relationship(name: 'ingredient', titleAttribute: 'name')
                    ->options(Ingredient::get()->pluck('name','id'))
                    ->preload()
                    ->multiple()
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

                    Select::make('tag')
                    ->label('Type de recette')
                    ->relationship(name: 'tag', titleAttribute: 'name')
                    ->options(Tag::get()->pluck('name','id'))
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
                        return $data['name'];
                    })
                    ->required()
                ])->columns(1)
                
            ]);
    }
}
