<?php

namespace App\Filament\Resources\CategoryProjectResource\Pages;

use App\Filament\Resources\CategoryProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoryProject extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = CategoryProjectResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
