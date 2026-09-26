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
            'street_address' => 'Imm Mjadli, 74 Bd Moulay Rachid',
            'postal_code' => '40002',
            'telephone' => null,

            /** Full office address, displayed on the page and used as the Google Maps query. */
            'map_query' => 'Imm Mjadli, 74 Bd Moulay Rachid, Marrakech 40002, Maroc',

            /** Real Google Place ID, when known. Takes precedence over map_query. */
            'google_place_id' => null,

            /** Replace with a real photo of Marrakech, e.g. "images/marrakech.jpg" (1680×945). */
            'image' => 'nesel-hero.png',
        ],

        'casablanca' => [
            'name' => 'Nesel Casablanca',
            'locality' => 'Casablanca',
            'route' => 'domiciliation.casablanca',
            'street_address' => '12 Rue Saria Ben Zounaim, Etg 3, Apt 4, Palmier',
            'postal_code' => null,
            'telephone' => null,

            /** Full office address, displayed on the page and used as the Google Maps query. */
            'map_query' => '12 Rue Saria Ben Zounaim, Etg 3, Apt 4, Palmier, Casablanca, Maroc',

            /** Real Google Place ID, when known. Takes precedence over map_query. */
            'google_place_id' => null,

            /** Replace with a real photo of Casablanca, e.g. "images/casablanca.jpg" (1680×945). */
            'image' => 'nesel-hero.png',
        ],

    ],

];
