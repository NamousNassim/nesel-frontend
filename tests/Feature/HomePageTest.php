<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_renders_the_domiciliation_offer(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Votre entreprise mérite une')
            ->assertSee('adresse qui compte.')
            ->assertSee('Marrakech')
            ->assertSee('Casablanca')
            ->assertSee('Demander à être rappelé');
    }
}
