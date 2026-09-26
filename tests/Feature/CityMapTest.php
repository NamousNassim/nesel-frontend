<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CityMapTest extends TestCase
{
    private const MARRAKECH_ADDRESS = 'Imm Mjadli, 74 Bd Moulay Rachid, Marrakech 40002, Maroc';

    private const CASABLANCA_ADDRESS = '12 Rue Saria Ben Zounaim, Etg 3, Apt 4, Palmier, Casablanca, Maroc';

    /**
     * @return array<string, array{string, string, string}>
     */
    public static function cityPages(): array
    {
        return [
            'marrakech' => ['domiciliation.marrakech', 'Où nous trouver à Marrakech', self::MARRAKECH_ADDRESS],
            'casablanca' => ['domiciliation.casablanca', 'Où nous trouver à Casablanca', self::CASABLANCA_ADDRESS],
        ];
    }

    #[DataProvider('cityPages')]
    public function test_city_page_shows_its_address_and_map_section(string $route, string $heading, string $address): void
    {
        $this->get(route($route))
            ->assertOk()
            ->assertSee($heading)
            ->assertSee("<address class=\"mt-3 border-l-4 border-nesel-red pl-5 text-lg font-bold not-italic leading-8 text-nesel-navy\">{$address}</address>", false);
    }

    #[DataProvider('cityPages')]
    public function test_map_iframe_pins_the_city_address_without_an_api_key(string $route, string $heading, string $address): void
    {
        $this->get(route($route))
            ->assertSee('<iframe', false)
            ->assertSee('src="https://maps.google.com/maps?q='.rawurlencode($address).'&amp;hl=fr&amp;z=16&amp;output=embed"', false)
            ->assertSee('loading="lazy"', false)
            ->assertDontSee('key=', false);
    }

    #[DataProvider('cityPages')]
    public function test_city_page_links_to_the_address_on_google_maps(string $route, string $heading, string $address): void
    {
        $this->get(route($route))
            ->assertSee('href="https://www.google.com/maps/search/?api=1&amp;query='.rawurlencode($address).'"', false)
            ->assertSee('target="_blank" rel="noopener noreferrer"', false)
            ->assertSee('Ouvrir dans Google Maps');
    }

    public function test_place_id_is_added_to_the_google_maps_link_when_configured(): void
    {
        config()->set('business.locations.marrakech.google_place_id', 'ChIJtest');

        $this->get(route('domiciliation.marrakech'))
            ->assertSee('&amp;query_place_id=ChIJtest"', false);
    }

    public function test_local_business_address_matches_the_displayed_marrakech_address(): void
    {
        $this->get(route('domiciliation.marrakech'))
            ->assertSee('"streetAddress":"Imm Mjadli, 74 Bd Moulay Rachid"', false)
            ->assertSee('"postalCode":"40002"', false)
            ->assertSee('"addressLocality":"Marrakech"', false);
    }
}
