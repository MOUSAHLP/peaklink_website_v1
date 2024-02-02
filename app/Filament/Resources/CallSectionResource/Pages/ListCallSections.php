<?php

namespace App\Filament\Resources\CallSectionResource\Pages;

use App\Filament\Resources\CallSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCallSections extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CallSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
