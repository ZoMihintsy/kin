<?php

namespace App\Filament\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\ExpandableDetails;
use Illuminate\Support\Facades\Auth;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
           ->columns([
                TextColumn::make('name')
                ->label('Nom')
                ->sortable(),
                TextColumn::make('email')
                ->label('email')
                ->sortable()
           ])
            ->Actions([
                EditAction::make()->visible(fn ($record) => $record->id != Auth::user()->id ),
                DeleteAction::make()->visible(fn ($record) => $record->id != Auth::user()->id ),
                ViewAction::make(),
            ]);
    }
}
