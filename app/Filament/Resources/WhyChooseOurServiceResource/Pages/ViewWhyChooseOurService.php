<?php

namespace App\Filament\Resources\WhyChooseOurServiceResource\Pages;

use App\Filament\Resources\WhyChooseOurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWhyChooseOurService extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = WhyChooseOurServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
