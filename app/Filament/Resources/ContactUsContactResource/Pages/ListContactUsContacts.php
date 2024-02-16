<?php

namespace App\Filament\Resources\ContactUsContactResource\Pages;

use App\Filament\Resources\ContactUsContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactUsContacts extends ListRecords
{
    protected static string $resource = ContactUsContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
