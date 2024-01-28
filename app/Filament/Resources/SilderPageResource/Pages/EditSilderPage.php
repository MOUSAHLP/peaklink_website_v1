<?php

namespace App\Filament\Resources\SilderPageResource\Pages;

use App\Filament\Resources\SilderPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSilderPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = SilderPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
