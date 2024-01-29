<?php

namespace App\Filament\Resources\FlowWorkResource\Pages;

use App\Filament\Resources\FlowWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFlowWork extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = FlowWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
