<?php

namespace App\Filament\Client\Resources\Recettes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor\RichEditorTool;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\View\Components\TextComponent;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Laravel\Prompts\Themes\Default\TextareaPromptRenderer;
use League\CommonMark\Renderer\Inline\TextRenderer;
use Stringable;
use Symfony\Component\Mime\HtmlToTextConverter\DefaultHtmlToTextConverter;

class RecettesTable
{

    public static function configure(Table $table): Table
    {
        return $table
        // ->default(fn ()=> where(filament()->auth()->user()->id,'!=',FacadesAuth::user()->id))
            ->columns([
                //
                TextColumn::make('title')
                ->label('Titre')
                ->sortable(),
                TextColumn::make('description')
                ->label('Description')
                ->html()
                ->formatStateUsing(fn($state) => strlen($state) > 30 ? substr($state,0, 31).'...' : $state),
                TextColumn::make('steps')
                ->label('Etapes')
                ->html()
                ->limit(100)
                ->extraCellAttributes(
                    [
                        'class'=>'proses'
                    ]
                ),

            ])
            ->actions([
                EditAction::make()
                ->visible(fn ($record)=> $record->user_id == Auth::user()->id),
                DeleteBulkAction::make(),


            ]);
            // ->toolbarActions([

            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ]);
    }
}
