<?php

namespace App\Filament\Resources\PricingResource\Pages;

use App\Filament\Resources\PricingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePricing extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = PricingResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
