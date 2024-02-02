<?php

namespace App\Filament\Resources\ManageTitlePageResource\Pages;

use App\Filament\Resources\ManageTitlePageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateManageTitlePage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = ManageTitlePageResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
