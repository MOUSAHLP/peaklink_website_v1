<?php

namespace App\Filament\Resources\ManageTitlePageResource\Pages;

use App\Filament\Resources\ManageTitlePageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManageTitlePage extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ManageTitlePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
