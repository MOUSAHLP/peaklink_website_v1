<?php

namespace App\Filament\Resources\TeamDetailResource\Pages;

use App\Filament\Resources\TeamDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamDetails extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = TeamDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("اضافة"),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
