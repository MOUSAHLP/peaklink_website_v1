<?php

namespace App\Filament\Resources\TeamDetailResource\Pages;

use App\Filament\Resources\TeamDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeamDetail extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = TeamDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
