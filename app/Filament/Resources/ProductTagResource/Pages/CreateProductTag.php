<?php

namespace App\Filament\Resources\ProductTagResource\Pages;

use App\Filament\Resources\ProductTagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductTag extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ProductTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
     
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
