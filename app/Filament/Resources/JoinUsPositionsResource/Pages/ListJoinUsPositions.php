<?php

namespace App\Filament\Resources\JoinUsPositionsResource\Pages;

use App\Filament\Resources\JoinUsPositionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJoinUsPositions extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = JoinUsPositionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
