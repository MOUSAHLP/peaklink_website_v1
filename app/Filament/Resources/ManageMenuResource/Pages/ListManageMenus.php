<?php

namespace App\Filament\Resources\ManageMenuResource\Pages;

use App\Filament\Resources\ManageMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManageMenus extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ManageMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
