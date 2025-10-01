<?php

namespace App\Filament\Client\Resources\Repices\Pages;

use App\Filament\Client\Resources\Repices\RepiceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewRepice extends ViewRecord
{
    protected static string $resource = RepiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()->visible(fn($record) => $record->id == Auth::user()->id),
        ];
    }
}
