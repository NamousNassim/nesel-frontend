<?php

/*
|--------------------------------------------------------------------------
| Nesel business information
|--------------------------------------------------------------------------
|
| Public, factual business details used by the page templates and the
| Schema.org structured data. Leave a value as null until the real
| information is confirmed: templates then show a visible placeholder and
| the structured data simply omits the field. Never fill these with
| approximations.
|
*/

return [

    'name' => 'Nesel',

    /** Paths relative to the public directory. */
    'logo' => 'nesel-logo.jpeg',

    'og_image' => 'nesel-hero.png',

    'telephone' => null,

    'email' => null,

    'locations' => [

        'marrakech' => [
            'name' => 'Nesel Marrakech',
            'locality' => 'Marrakech',
            'route' => 'domiciliation.marrakech',
            'street_address' => null,
            'postal_code' => null,
            'telephone' => null,

            /** Replace with a real photo of Marrakech, e.g. "images/marrakech.jpg" (1680×945). */
            'image' => 'nesel-hero.png',
        ],

        'casablanca' => [
            'name' => 'Nesel Casablanca',
            'locality' => 'Casablanca',
            'route' => 'domiciliation.casablanca',
            'street_address' => null,
            'postal_code' => null,
            'telephone' => null,

            /** Replace with a real photo of Casablanca, e.g. "images/casablanca.jpg" (1680×945). */
            'image' => 'nesel-hero.png',
        ],

    ],

];
