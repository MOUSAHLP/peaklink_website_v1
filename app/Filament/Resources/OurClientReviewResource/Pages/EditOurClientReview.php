<?php

namespace App\Filament\Resources\OurClientReviewResource\Pages;

use App\Filament\Resources\OurClientReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurClientReview extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = OurClientReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
