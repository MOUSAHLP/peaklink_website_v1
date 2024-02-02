<?php

namespace App\Filament\Resources\CallSectionResource\Pages;

use App\Filament\Resources\CallSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCallSection extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = CallSectionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
