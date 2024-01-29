<?php

namespace App\Filament\Resources\OurClientReviewResource\Pages;

use App\Filament\Resources\OurClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurClientReviews extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = OurClientReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
