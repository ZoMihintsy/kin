<?php

namespace App\Filament\Resources\Recettes;

use App\Filament\Resources\Recettes\Pages\CreateRecette;
use App\Filament\Resources\Recettes\Pages\EditRecette;
use App\Filament\Resources\Recettes\Pages\ListRecettes;
use App\Filament\Resources\Recettes\Pages\ViewRecette;
use App\Filament\Resources\Recettes\Schemas\RecetteForm;
use App\Filament\Resources\Recettes\Schemas\RecetteInfolist;
use App\Filament\Resources\Recettes\Tables\RecettesTable;
use App\Models\Recipe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class RecetteResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationLabel = "Recettes";

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cake;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return RecetteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RecetteInfolist::configure($schema);
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
            'view' => ViewRecette::route('/{record}'),
            'edit' => EditRecette::route('/{record}/edit'),
        ];
    }
    public static function canAccess() : bool 
    {
        $user = Auth::user();
        return  $user->type == 'admin';
    }
}
