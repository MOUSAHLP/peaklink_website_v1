<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Jobs\GenerateSiteMap;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class ListSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Action::make("sitemap")
                ->label("تحديث ال sitemap")
                ->action(function () {
                    // ini_set('max_execution_time', 300);
                    // GenerateSiteMap::dispatchAfterResponse();
                    // return 1;
                }),

        ];
    }
}
