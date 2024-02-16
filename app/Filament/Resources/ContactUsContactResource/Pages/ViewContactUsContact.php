<?php

namespace App\Filament\Resources\ContactUsContactResource\Pages;

use App\Filament\Resources\ContactUsContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContactUsContact extends ViewRecord
{
    protected static string $resource = ContactUsContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
