<?php

namespace App\Filament\Resources\ContactUsContactResource\Pages;

use App\Filament\Resources\ContactUsContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactUsContact extends EditRecord
{
    protected static string $resource = ContactUsContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
