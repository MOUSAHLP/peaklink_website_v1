<?php

namespace App\Filament\Resources\ProductTagResource\Pages;

use App\Filament\Resources\ProductTagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductTags extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = ProductTagResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("اضافة وسم جديد"),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
