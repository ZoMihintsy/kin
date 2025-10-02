<?php

namespace App\Filament\Resources\Recettes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RecettesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title')
                ->label('Nom du recette'),
                TextColumn::make('description')
                ->label('Description')
                ->html()
                ->default(fn ($record) => strlen($record) > 30 ? substr($record, 0 , 30).'...': $record),
                TextColumn::make('hours')
                ->label('Temps du preparation')
                ->searchable()
                ->sortable(),
                TextColumn::make('difficult')
                ->searchable()
                ->label('difficulter')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}