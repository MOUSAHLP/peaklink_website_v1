<?php

namespace App\Filament\Resources\SilderPageResource\Pages;

use App\Filament\Resources\SilderPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSilderPage extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = SilderPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
