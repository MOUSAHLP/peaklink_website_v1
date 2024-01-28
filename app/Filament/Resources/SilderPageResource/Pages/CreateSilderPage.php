<?php

namespace App\Filament\Resources\SilderPageResource\Pages;

use App\Filament\Resources\SilderPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSilderPage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = SilderPageResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
