<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Generate SiteMap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SitemapGenerator::create(env("APP_URL"))
            ->hasCrawled(function (Url $url) {
                if ($url->segment(1) === 'admin') {
                    return;
                }
                return $url;
            })
            ->writeToFile(public_path('sitemap.xml'));
    }
}
