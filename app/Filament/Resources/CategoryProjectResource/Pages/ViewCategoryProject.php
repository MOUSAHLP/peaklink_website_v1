<?php

namespace App\Filament\Resources\CategoryProjectResource\Pages;

use App\Filament\Resources\CategoryProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryProject extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = CategoryProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
