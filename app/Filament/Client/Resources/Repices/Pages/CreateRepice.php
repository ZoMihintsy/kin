<?php

namespace App\Filament\Client\Resources\Repices\Pages;

use App\Filament\Client\Resources\Repices\RepiceResource;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Actions;

class CreateRepice extends CreateRecord
{
    protected static string $resource = RepiceResource::class;
    protected function getCreatedNotificationTitle(): ?string
    {
        return "Creer une nouvel recette";
    }
    protected function getHeaderActions(): array
    {
        return [
            Action::make('aide')
            ->label('Aide')
            ->icon('heroicon-o-check')
            ->infolist([
                TextEntry::make('title')
                ->label('Pour enregistrer une nouvelle recette , c\'est facile '),
            ])->successNotificationTitle('ca vous a aider je pense')
            ->modalCancelActionLabel('Annuler')
            ->modalSubmitActionLabel('D\'accord')
        ];
    }
    public function getTitle():string
    {
        return 'Creation de recette';
    }
}
