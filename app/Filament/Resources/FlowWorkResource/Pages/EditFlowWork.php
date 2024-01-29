<?php

namespace App\Filament\Resources\FlowWorkResource\Pages;

use App\Filament\Resources\FlowWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFlowWork extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = FlowWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
