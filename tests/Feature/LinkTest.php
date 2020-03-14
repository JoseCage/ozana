<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tymon\JWTAuth\Facades\JWTAuth;

class LinkTest extends TestCase
{

    /**
     * Get User sharing links.
     *
     * @return void
     */
    public function testGetUserSharingLinks()
    {

        $response = $this->withHeaders(
            [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->token,
             ]
        )
            ->get('/api/me/links');

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
