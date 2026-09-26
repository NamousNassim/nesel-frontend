<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /**
     * Built in PHP rather than Blade: a "<?xml" declaration inside a template
     * breaks on servers where short_open_tag is enabled.
     */
    public function sitemap(): Response
    {
        $urls = array_map(
            fn (string $routeName): string => '    <url>'."\n".'        <loc>'.e(Seo::route($routeName)).'</loc>'."\n".'    </url>',
            Seo::INDEXABLE_ROUTES,
        );

        $xml = implode("\n", [
            '<?xml version="1.0" encoding="UTF-8"?>',
            '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
            ...$urls,
            '</urlset>',
        ])."\n";

        return response($xml)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Allow: /',
            '',
            'Sitemap: '.Seo::route('sitemap'),
        ];

        return response(implode("\n", $lines)."\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
