<?php

namespace App\Filament\Resources\JoinUsPositionsResource\Pages;

use App\Filament\Resources\JoinUsPositionsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJoinUsPositions extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = JoinUsPositionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
