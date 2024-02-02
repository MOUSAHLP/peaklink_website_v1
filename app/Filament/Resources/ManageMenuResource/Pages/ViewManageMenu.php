<?php

namespace App\Filament\Resources\ManageMenuResource\Pages;

use App\Filament\Resources\ManageMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewManageMenu extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = ManageMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
