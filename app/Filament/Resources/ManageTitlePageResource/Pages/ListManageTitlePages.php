<?php

namespace App\Filament\Resources\ManageTitlePageResource\Pages;

use App\Filament\Resources\ManageTitlePageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManageTitlePages extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ManageTitlePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
