<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        SitemapGenerator::create('https://www.haulmate.co/')
        ->hasCrawled(function (Url $url) {
            if ($url->segment(1) == 'storage') return;
            if (strpos($url->url, 'blog/wp-content/uploads/')) return;
     
            return $url;
        })->writeToFile(public_path('sitemap.xml'));
    }
}
