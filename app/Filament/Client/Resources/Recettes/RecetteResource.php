<?php

namespace App\Filament\Client\Resources\Recettes;

use App\Filament\Client\Pages\ViewResource;
use App\Filament\Client\Resources\Recettes\Pages\CreateRecette;
use App\Filament\Client\Resources\Recettes\Pages\EditRecette;
use App\Filament\Client\Resources\Recettes\Pages\ListRecettes;
use App\Filament\Client\Resources\Recettes\Pages\ViewRecette;
use App\Filament\Client\Resources\Recettes\Schemas\RecetteForm;
use App\Filament\Client\Resources\Recettes\Tables\RecettesTable;
// use App\Models\Recette;
use App\Models\Recipe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RecetteResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cake;
    protected ?string $heading = 'Recettes';

    // protected static ?string $recordTitleAttribute = '';

    public static function getGloballySearchableAttributes(): array
    {         
        return ['title', 'description','user.name','tag.name'];
    }
    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->title;
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'utilisateur'=>$record->user->name ?? 'Inconnu',
            'Description' =>strip_tags($record->description),
            'type' => $record->tag->first()?->name
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return RecetteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecettesTable::configure($table);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecettes::route('/'),
            'create' => CreateRecette::route('/create'),
            'edit' => EditRecette::route('/{record}/edit'),
            'view'=>ViewRecette::route('/{record}')
        ];
    }
}
