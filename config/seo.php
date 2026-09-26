<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Search Engine Indexing
    |--------------------------------------------------------------------------
    |
    | Controls the robots meta tag rendered on every page. Disabled by default
    | so local and staging environments are never indexed; production must
    | explicitly set SEO_INDEXING_ENABLED=true.
    |
    */

    'indexing_enabled' => (bool) env('SEO_INDEXING_ENABLED', false),

];
