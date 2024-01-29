<?php

namespace App\Filament\Resources\FlowWorkResource\Pages;

use App\Filament\Resources\FlowWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFlowWork extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = FlowWorkResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
