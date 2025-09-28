<?php

namespace App\Filament\Resources\Recettes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RecetteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextEntry::make('Email')
                ->label('Email')
            ]);
    }
}
