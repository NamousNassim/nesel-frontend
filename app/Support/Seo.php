<?php

namespace App\Support;

class Seo
{
    /**
     * Named routes listed in the XML sitemap.
     *
     * @var list<string>
     */
    public const INDEXABLE_ROUTES = [
        'home',
        'domiciliation.marrakech',
        'domiciliation.casablanca',
    ];

    /**
     * Build an absolute URL on the configured application URL (APP_URL),
     * regardless of the host the current request came from.
     */
    public static function url(string $path = '/'): string
    {
        return rtrim((string) config('app.url'), '/').'/'.ltrim($path, '/');
    }

    /**
     * Build the absolute, APP_URL-based URL of a named route.
     */
    public static function route(string $name): string
    {
        return self::url(route($name, absolute: false));
    }

    /**
     * Self-referencing canonical URL of the current page, without query string.
     */
    public static function canonical(): string
    {
        return self::url(request()->path());
    }
}
