<?php

namespace App\Filament\Resources\WhyChooseOurServiceResource\Pages;

use App\Filament\Resources\WhyChooseOurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhyChooseOurServices extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = WhyChooseOurServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
