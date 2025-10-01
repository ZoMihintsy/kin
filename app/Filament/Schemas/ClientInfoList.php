<?php

namespace App\Filament\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfoList
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextEntry::make('email')
                ->label('Email'),
                TextEntry::make('type')
                ->label('Role')
            ]);
    }
}
