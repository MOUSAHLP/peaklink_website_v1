<?php

namespace App\Filament\Resources\JoinUsFormResource\Pages;

use App\Filament\Resources\JoinUsFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJoinUsForm extends EditRecord
{
    protected static string $resource = JoinUsFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
