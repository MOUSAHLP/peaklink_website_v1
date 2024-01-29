<?php

namespace App\Filament\Resources\OurClientReviewResource\Pages;

use App\Filament\Resources\OurClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurClientReview extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = OurClientReviewResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
