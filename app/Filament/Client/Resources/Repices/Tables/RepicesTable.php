<?php

namespace App\Filament\Client\Resources\Repices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class RepicesTable
{
    
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')
                ->label('Nom du recette')->sortable(),
                TextColumn::make('description')
                ->html()
                ->default(fn ($desc) => strlen($desc) > 8 ? (strlen($desc) <= 10 ? substr($desc, 0 , 10).'...' : $desc->description) :"vide"),
                TextColumn::make('hours')
                ->searchable()
                ->label('Heure du preparation')
                ->sortable(),
                TextColumn::make('difficult')
                ->label('Difficulter')
                ->searchable()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->visible(fn($record) => $record->user_id == Auth::user()->id),
                DeleteAction::make()->visible(fn($record) => $record->user_id == Auth::user()->id),
            ]);
    }
}
