<?php

namespace App\Filament\Resources\TeamDetailResource\Pages;

use App\Filament\Resources\TeamDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamDetail extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = TeamDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
     
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
