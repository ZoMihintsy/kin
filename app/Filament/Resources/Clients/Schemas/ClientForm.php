<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                ->label('Nom'),
                TextInput::make('email')
                ->label('email')
                ->disabled(),
                Select::make('type')
                ->label('Role')
                ->options([
                    ''=>'Role',
                    'client'=>'Client',
                    'admin'=>'Administrateur'
                ])
                ->selectablePlaceholder( fn ($default) => $default)
                ->required()
            ]);
    }
}