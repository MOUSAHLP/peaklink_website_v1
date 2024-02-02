<?php

namespace App\Filament\Resources\WhyChooseOurServiceResource\Pages;

use App\Filament\Resources\WhyChooseOurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyChooseOurService extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = WhyChooseOurServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
