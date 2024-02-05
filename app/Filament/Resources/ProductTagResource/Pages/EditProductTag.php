<?php

namespace App\Filament\Resources\ProductTagResource\Pages;

use App\Filament\Resources\ProductTagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductTag extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = ProductTagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
     
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
