<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSetting extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(), 
        ];
    }
}
