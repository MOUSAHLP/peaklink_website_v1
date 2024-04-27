<?php

namespace App\Filament\Resources\ProductFormResource\Pages;

use App\Filament\Resources\ProductFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductForm extends EditRecord
{
    protected static string $resource = ProductFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
