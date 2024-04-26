<?php

namespace App\Filament\Resources\ProductFormResource\Pages;

use App\Filament\Resources\ProductFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductForms extends ListRecords
{
    protected static string $resource = ProductFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
