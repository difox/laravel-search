<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * Test GET Products.
     *
     * @return void
     */
    public function testProductsGet()
    {
        $response = $this->get('/search', ['query' => 'Nutella']);

        $response
            ->assertStatus(200)
            ->assertSee('Nutella');
    }
}
