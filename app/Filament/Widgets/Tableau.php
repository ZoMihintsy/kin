<?php

namespace App\Filament\Widgets;

// use App\Filament\Resources\Recettes\Pages\EditRecette;
use App\Models\Recipe as ModelsRecipe;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use recipe;

class Tableau extends TableWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => ModelsRecipe::query())
            ->columns([
                //
                TextColumn::make('title')
                ->label('Nom de la recette')
                ->sortable(),
                TextColumn::make('user.name')
                ->label('Auteur')
                ->searchable(),
                TextColumn::make('created_at')
                ->label('Date')
                ->date('d M Y'),
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->Actions([
                //
                EditAction::make()
                ->label('Modifier')
                ->form([
                    TextInput::make('title')
                    ->label('Nom du recette')
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
