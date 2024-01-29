<?php

namespace App\Filament\Resources\OurClientReviewResource\Pages;

use App\Filament\Resources\OurClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOurClientReview extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;
    protected static string $resource = OurClientReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
