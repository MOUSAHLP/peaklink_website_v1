<?php

namespace App\Filament\Resources\ManageTitlePageResource\Pages;

use App\Filament\Resources\ManageTitlePageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewManageTitlePage extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = ManageTitlePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
