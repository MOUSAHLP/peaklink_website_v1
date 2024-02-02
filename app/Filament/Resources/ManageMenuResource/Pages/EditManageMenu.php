<?php

namespace App\Filament\Resources\ManageMenuResource\Pages;

use App\Filament\Resources\ManageMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManageMenu extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = ManageMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
