<?php

namespace App\Filament\Resources\ManageMenuResource\Pages;

use App\Filament\Resources\ManageMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateManageMenu extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = ManageMenuResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
