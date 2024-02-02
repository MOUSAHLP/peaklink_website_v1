<?php

namespace App\Filament\Resources\PricingResource\Pages;

use App\Filament\Resources\PricingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPricing extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = PricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
