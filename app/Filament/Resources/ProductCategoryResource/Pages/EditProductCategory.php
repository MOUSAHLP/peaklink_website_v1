<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductCategory extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = ProductCategoryResource::class;

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
