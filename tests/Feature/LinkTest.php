<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LinkTest extends TestCase
{
    /**
     * Get User sharing links.
     *
     * @return void
     */
    public function testGetUserSharingLinks()
    {
        $response = $this->get('/api/me/links');

        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                     "current_page",
                     "data",
                     "from",
                     "last_page",
                     "last_page_url",
                     "next_page_url",
                     "path",
                     "per_page",
                     "prev_page_url",
                     "to",
                     "total"
                     ]
            );
    }
}
