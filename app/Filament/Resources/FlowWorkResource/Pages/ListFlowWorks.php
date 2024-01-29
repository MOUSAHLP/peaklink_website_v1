<?php

namespace App\Filament\Resources\FlowWorkResource\Pages;

use App\Filament\Resources\FlowWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFlowWorks extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = FlowWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
