<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SeoPagesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('app.url', 'https://nesel.test');
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function publicPages(): array
    {
        return [
            'home' => ['/', 'Domiciliation d’entreprise au Maroc | Marrakech &amp; Casablanca | Nesel'],
            'marrakech' => ['/domiciliation-marrakech', 'Domiciliation d’entreprise à Marrakech | Nesel'],
            'casablanca' => ['/domiciliation-casablanca', 'Domiciliation d’entreprise à Casablanca | Nesel'],
        ];
    }

    #[DataProvider('publicPages')]
    public function test_public_page_renders_its_seo_metadata(string $path, string $title): void
    {
        $canonicalUrl = 'https://nesel.test'.$path;

        $this->get($path)
            ->assertOk()
            ->assertSee("<title>{$title}</title>", false)
            ->assertSee('<link rel="canonical" href="'.$canonicalUrl.'">', false)
            ->assertSee('<meta property="og:url" content="'.$canonicalUrl.'">', false)
            ->assertSee('<meta name="twitter:card" content="summary_large_image">', false)
            ->assertSee('"@type":"Organization"', false);
    }

    #[DataProvider('publicPages')]
    public function test_public_page_has_exactly_one_h1(string $path): void
    {
        $this->assertSame(1, substr_count($this->get($path)->getContent(), '<h1'));
    }

    #[DataProvider('publicPages')]
    public function test_public_page_is_indexable_when_indexing_is_enabled(string $path): void
    {
        config()->set('seo.indexing_enabled', true);

        $this->get($path)
            ->assertSee('<meta name="robots" content="index, follow">', false)
            ->assertDontSee('noindex', false);
    }

    #[DataProvider('publicPages')]
    public function test_public_page_is_not_indexable_when_indexing_is_disabled(string $path): void
    {
        config()->set('seo.indexing_enabled', false);

        $this->get($path)
            ->assertSee('<meta name="robots" content="noindex, nofollow">', false)
            ->assertDontSee('content="index, follow"', false);
    }

    public function test_homepage_h1_describes_the_service_above_the_marketing_tagline(): void
    {
        $this->get(route('home'))
            ->assertSeeInOrder([
                '<h1',
                'Domiciliation d’entreprise à Marrakech et Casablanca',
                '</h1>',
                'Votre entreprise mérite une',
                'adresse qui compte.',
            ], false);
    }

    public function test_canonical_url_ignores_request_host_and_query_string(): void
    {
        $this->get('http://localhost/?ville=Marrakech')
            ->assertSee('<link rel="canonical" href="https://nesel.test/">', false);
    }

    public function test_marrakech_page_renders_its_h1_and_links_to_casablanca(): void
    {
        $this->get(route('domiciliation.marrakech'))
            ->assertOk()
            ->assertSeeInOrder(['<h1', 'Domiciliation d’entreprise à', 'Marrakech', '</h1>'], false)
            ->assertSee(route('domiciliation.casablanca'), false)
            ->assertSee('"@type":"BreadcrumbList"', false)
            ->assertSee('"@type":"FAQPage"', false);
    }

    public function test_casablanca_page_renders_its_h1_and_links_to_marrakech(): void
    {
        $this->get(route('domiciliation.casablanca'))
            ->assertOk()
            ->assertSeeInOrder(['<h1', 'Domiciliation d’entreprise à', 'Casablanca', '</h1>'], false)
            ->assertSee(route('domiciliation.marrakech'), false);
    }

    public function test_local_business_data_is_only_rendered_once_an_address_is_configured(): void
    {
        config()->set('business.locations.marrakech.street_address', null);

        $this->get(route('domiciliation.marrakech'))
            ->assertDontSee('"@type":"LocalBusiness"', false);

        config()->set('business.locations.marrakech.street_address', '1 rue Exemple');

        $this->get(route('domiciliation.marrakech'))
            ->assertSee('"@type":"LocalBusiness"', false)
            ->assertSee('"addressCountry":"MA"', false);
    }

    public function test_homepage_city_cards_link_to_city_pages(): void
    {
        $this->get(route('home'))
            ->assertSee(route('domiciliation.marrakech'), false)
            ->assertSee(route('domiciliation.casablanca'), false);
    }

    public function test_city_query_preselects_the_contact_form_city(): void
    {
        $this->get(route('home', ['ville' => 'Casablanca']))
            ->assertSee('<option value="Casablanca" selected>', false);
    }

    public function test_sitemap_lists_indexable_pages_as_xml(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSeeInOrder([
                '<loc>https://nesel.test/</loc>',
                '<loc>https://nesel.test/domiciliation-marrakech</loc>',
                '<loc>https://nesel.test/domiciliation-casablanca</loc>',
            ], false);

        $this->assertNotFalse(simplexml_load_string($response->getContent()));
    }

    public function test_robots_txt_allows_crawling_and_references_the_sitemap(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Allow: /')
            ->assertSee('Sitemap: https://nesel.test/sitemap.xml');
    }
}
