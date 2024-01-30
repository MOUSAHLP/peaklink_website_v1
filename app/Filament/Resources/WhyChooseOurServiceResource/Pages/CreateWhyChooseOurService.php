<?php

namespace App\Filament\Resources\WhyChooseOurServiceResource\Pages;

use App\Filament\Resources\WhyChooseOurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWhyChooseOurService extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = WhyChooseOurServiceResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
