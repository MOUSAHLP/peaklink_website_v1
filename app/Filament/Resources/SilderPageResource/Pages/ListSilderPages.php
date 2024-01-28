<?php

namespace App\Filament\Resources\SilderPageResource\Pages;

use App\Filament\Resources\SilderPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSilderPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = SilderPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
