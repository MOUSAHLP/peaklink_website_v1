<?php

namespace App\Filament\Resources\CallSectionResource\Pages;

use App\Filament\Resources\CallSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCallSection extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CallSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
