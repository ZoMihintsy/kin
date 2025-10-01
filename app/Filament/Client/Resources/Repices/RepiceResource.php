<?php

namespace App\Filament\Client\Resources\Repices;

use App\Filament\Client\Resources\Recettes\Schemas\RecetteForm;
use App\Filament\Client\Resources\Recettes\Tables\RecettesTable;
use App\Filament\Client\Resources\Repices\Pages\CreateRepice;
use App\Filament\Client\Resources\Repices\Pages\EditRepice;
use App\Filament\Client\Resources\Repices\Pages\ListRepices;
use App\Filament\Client\Resources\Repices\Pages\ViewRepice;
use App\Filament\Client\Resources\Repices\Schemas\RepiceForm;
use App\Filament\Client\Resources\Repices\Schemas\RepiceInfolist;
use App\Filament\Client\Resources\Repices\Tables\RepicesTable;
use App\Filament\Resources\Recettes\Schemas\RecetteForm as SchemasRecetteForm;
use App\Filament\Resources\Recettes\Tables\RecettesTable as TablesRecettesTable;
use App\Models\Recipe;
use App\Models\Repice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class RepiceResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';
  
    public static function getGloballySearchableAttributes(): array
    {         
        return ['title', 'description','user.name','tag.name', 'hours', 'difficult'];
    }
    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->title;
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Publier par : '=>$record->user->name ?? 'Inconnu',
            'Description' =>strip_tags($record->description),
            'type' => $record->tag->first()?->name,
            'durer' => $record->hours,
            'Difficulter' => $record->difficult
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return RepiceForm::configure($schema);
    }
    public static function infolist(Schema $schema): Schema
    {
        return RepiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RepicesTable::configure($table);
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
            'index' => ListRepices::route('/'),
            'create' => CreateRepice::route('/create'),
            'view' => ViewRepice::route('/{record}'),
            'edit' => EditRepice::route('/{record}/edit'),
        ];
    }
}
