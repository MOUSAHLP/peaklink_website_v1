<?php

namespace App\Filament\Resources\JoinUsPositionsResource\Pages;

use App\Filament\Resources\JoinUsPositionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJoinUsPositions extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = JoinUsPositionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
