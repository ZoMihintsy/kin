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
                ->default(fn ($desc) => strlen($desc) > 30 ? substr($desc, 0 , 31).'...' : $desc )
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()->visible(fn($record) => $record->id == Auth::user()->id),
            ]);
    }
}
