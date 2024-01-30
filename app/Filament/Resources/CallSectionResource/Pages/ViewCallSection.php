<?php

namespace App\Filament\Resources\CallSectionResource\Pages;

use App\Filament\Resources\CallSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCallSection extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = CallSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
